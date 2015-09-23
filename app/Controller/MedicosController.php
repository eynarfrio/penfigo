<?php

App::uses('AppController', 'Controller');

class MedicosController extends AppController {

	public $layout = 'penfigo';
	public $uses = array('Medico', 'Lugare', 'User', 'PacientesMedico', 'Paciente');

	public function informacion() {

	}

	public function mis_pacientes() {

	}

	public function get_medico() {
		return $this->Medico->findByuser_id($this->Session->read('Auth.User.id'));
	}

	public function form_medico() {
		$this->request->data = $this->get_medico();
		$idMedico = $this->request->data['Medico']['id'];
		$lugares = $this->Lugare->find('list', array('fields' => array('nombre', 'nombre')));
		$this->set(compact('lugares', 'idMedico'));
	}

	public function registra_medico() {
		if (!empty($this->request->data['User']['password2'])) {
			$this->request->data['User']['password'];
		}
		$this->request->data['User']['username'] = $this->request->data['Medico']['ci'];
		$this->User->id = $this->Session->read('Auth.User.id');
		$this->User->save($this->request->data['User']);
		$this->Medico->create();
		$this->Medico->save($this->request->data['Medico']);
		$this->Session->setFlash("Se registro correctamente!!!", 'msgbueno');
		$this->redirect(array('action' => 'ver', $this->Session->read('Auth.User.id')));
	}

	public function ver($idUser = null) {
		$medico = $this->Medico->findByuser_id($idUser, null, null, -1);
		/*debug($medico);
		exit;*/
		$this->set(compact('medico'));
	}

	public function index() {
		$medicos = $this->Medico->find('all', array(
			'recursive' => -1,
			'conditions' => array('estado' => 'Activo'),
		));
		$this->set(compact('medicos'));
	}

	public function lista() {
		$medicos = $this->Medico->find('all', array(
			'recursive' => -1,
			'order' => 'Medico.modified DESC',
		));
		$this->set(compact('medicos'));
	}

	public function medico($idMedico = null) {
		$this->Medico->id = $idMedico;
		$this->request->data = $this->Medico->read();
		$lugares = $this->Lugare->find('list', array('fields' => array('nombre', 'nombre')));
		$this->set(compact('lugares', 'idMedico'));
	}

	public function registra_medico2() {
		//debug($this->request->data);exit;
		if (!empty($this->request->data['User']['password2'])) {
			$this->request->data['User']['password'] = $this->request->data['User']['password2'];
		}
		$this->request->data['User']['username'] = $this->request->data['Medico']['ci'];
		$this->request->data['User']['role'] = $this->request->data['Medico']['tipo_medico'];

		$this->User->create();
		$this->User->save($this->request->data['User']);
		if (empty($this->request->data['User']['id'])) {
			$idUser = $this->User->getLastInsertID();
		} else {
			$idUser = $this->request->data['User']['id'];
		}

		$this->request->data['Medico']['user_id'] = $idUser;
		$this->Medico->create();
		$this->Medico->save($this->request->data['Medico']);
		$this->Session->setFlash("Se registro correctamente!!!", 'msgbueno');
		$this->redirect(array('action' => 'lista'));
	}

	public function eliminar($idMedico = null) {
		$this->Medico->delete($idMedico);
		$this->Session->setFlash('Se elimino correctamente!!', 'msgbueno');
		$this->redirect($this->referer());
	}

	public function dermatologos($idPaciente = null) {
		$paciente = $this->Paciente->findByid($idPaciente, NULL, NULL, -1);
		$medicos = $this->Medico->find('all', array(
			'recursive' => -1,
			'conditions' => array('estado' => 'Activo', 'tipo_medico' => 'Dermatologo'),
		));
		$this->set(compact('medicos', 'idPaciente', 'paciente'));
	}

	public function transferencia($idMedico = null, $idPaciente = null) {
		$datos['paciente_id'] = $idPaciente;
		$datos['medico_id'] = $idMedico;
		$this->PacientesMedico->create();
		$this->PacientesMedico->save($datos);
		$this->Session->setFlash("Se realizo la transferencia con exito!!", 'msgbueno');
		$this->redirect(array('controller' => 'Pacientes', 'action' => 'mispacientes'));
	}
}
