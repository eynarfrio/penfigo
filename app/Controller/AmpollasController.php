<?php

App::uses('AppController', 'Controller');

class AmpollasController extends AppController {
	public $layout = 'penfigo';
	public $uses = ['Area', 'Areaampolla', 'Medico', 'Tipoampolla', 'PacientesTipoampolla', 'PacientesTipoerocione', 'Tipoerocione'];

	public function areasampollas_mu($idPaciente = null, $numero = null, $tipo) {
		$areas_mu = $this->Areaampolla->find('all', [
			'recursive' => 0,
			'conditions' => ['Areaampolla.paciente_id' => $idPaciente, 'Areaampolla.numero' => $numero, 'Areaampolla.tipo' => $tipo],
			'fields' => ['Area.*', 'Areaampolla.*'],
		]);
		//debug($areas_mu);exit;
		if (empty($areas_mu)) {
			$areas_mu = $this->Area->find('all', ['conditions' => ['tipo' => $tipo]]);
		}
		$idMedico = $this->get_id_medico();
		$this->set(compact('idPaciente', 'areas_mu', 'numero', 'idMedico', 'tipo'));
	}

	public function regis_are_amp_m($idPaciente = null, $numero = null, $tipo = null) {
		if (!empty($this->request->data['Areaampolla'])) {
			foreach ($this->request->data['Areaampolla'] as $pa) {
				$datos = $pa;
				$this->Areaampolla->create();
				$this->Areaampolla->save($datos);
			}
			$this->redirect(['action' => 'tipoampollas_mu', $idPaciente, $numero, $tipo]);
		}
	}

	public function tipoampollas_mu($idPaciente = null, $numero = null, $tipo = null) {
		$areasamp = $this->Areaampolla->find('all', [
			'recursive' => 0,
			'conditions' => ['Areaampolla.paciente_id' => $idPaciente, 'Areaampolla.numero' => $numero, 'Areaampolla.estado' => 1, 'Areaampolla.tipo' => $tipo],
			'fields' => ['Area.*', 'Areaampolla.id'],
		]);
		if (empty($areasamp)) {
			$this->redirect(['controller' => 'Pacientes', 'action' => 'datos', $idPaciente]);
		}
		/* debug($areasamp);
		exit; */
		$this->set(compact('areasamp', 'idPaciente', 'numero', 'tipo'));
	}

	public function get_medico() {
		return $this->Medico->findByuser_id($this->Session->read('Auth.User.id'));
	}

	public function get_id_medico() {
		$medico = $this->get_medico();
		return $medico['Medico']['id'];
	}

	public function get_tipoamp($id_areaampolla, $tipo) {
		$tipos = $this->PacientesTipoampolla->find('all', [
			'recursive' => 0,
			'conditions' => ['PacientesTipoampolla.areaampolla_id' => $id_areaampolla, 'Tipoampolla.tipo' => $tipo],
			'fields' => ['Tipoampolla.*', 'PacientesTipoampolla.*'],
		]);
		if (empty($tipos)) {
			$tipos = $this->Tipoampolla->find('all', [
				'recursive' => -1,
				'conditions' => ['Tipoampolla.tipo' => $tipo],
			]);
		}
		return $tipos;
	}

	public function regis_tipo_amp_m($idPaciente = NULL, $numero = null, $tipo = null) {
		if (!empty($this->request->data['PacientesTipoampolla'])) {
			foreach ($this->request->data['PacientesTipoampolla'] as $pt) {
				$this->PacientesTipoampolla->create();
				$this->PacientesTipoampolla->save($pt);
			}
		}

		$this->redirect(array('action' => 'erociones', $idPaciente, $numero, $tipo));
	}

	public function erociones($idPaciente = NULL, $numero = null, $tipo = null) {

		$sql = "SELECT ar.nombre FROM areas ar WHERE ar.id = Areaampolla.area_id";
		$this->PacientesTipoampolla->virtualFields = array(
			'area' => "($sql)",
		);
		$pasTipAmps = $this->PacientesTipoampolla->find('all', array(
			'recursive' => 0,
			'conditions' => array(
				'Tipoampolla.nombre' => 'Erosiones',
				'Areaampolla.tipo' => $tipo,
				'Areaampolla.paciente_id' => $idPaciente,
				'Areaampolla.numero' => $numero,
				'PacientesTipoampolla.estado' => 1,
			),
			'fields' => array(
				'PacientesTipoampolla.areaampolla_id', 'PacientesTipoampolla.area',
			),
		));
		$this->Session->setFlash("Se registro los datos correctamente!!", 'msgbueno');
		$this->redirect(['controller' => 'Pacientes', 'action' => 'datos', $idPaciente]);
		/*if (empty($pasTipAmps)) {
		$this->Session->setFlash("Se registro los datos correctamente!!", 'msgbueno');
		$this->redirect(['controller' => 'Pacientes', 'action' => 'datos', $idPaciente]);
		}*/
		$this->set(compact('pasTipAmps', 'idPaciente', 'numero', 'tipo'));
	}

	public function get_tipoero($id_areaampolla, $tipo) {
		$tipos = $this->PacientesTipoerocione->find('all', [
			'recursive' => 0,
			'conditions' => ['PacientesTipoerocione.areaampolla_id' => $id_areaampolla, 'Tipoerocione.id !=' => NULL],
			'fields' => ['Tipoerocione.*', 'PacientesTipoerocione.*'],
		]);
		if (empty($tipos)) {
			$tipos = $this->Tipoerocione->find('all', [
				'recursive' => -1,
				'conditions' => ['Tipoerocione.tipo' => $tipo],
			]);
		}
		/*debug($tipos);
		exit;*/
		return $tipos;
	}

	public function regis_tipo_ero($idPaciente = NULL, $numero = null, $tipo = null) {
		/*debug($this->request->data);
		exit;*/
		if (!empty($this->request->data['PacientesTipoerocione'])) {
			foreach ($this->request->data['PacientesTipoerocione'] as $pt) {
				$this->PacientesTipoerocione->create();
				$this->PacientesTipoerocione->save($pt);
			}
		}
		$this->Session->setFlash("Se registro los datos correctamente!!", 'msgbueno');
		$this->redirect(['controller' => 'Pacientes', 'action' => 'datos', $idPaciente]);
	}

	public function ajax_img_area($idArea = null) {
		$this->layout = 'ajax';
		$area = $this->Area->findByid($idArea, null, null, -1);
		$this->set(compact('area'));
	}
	public function ajax_inf_area($idArea = null) {
		$this->layout = 'ajax';
		$area = $this->Area->findByid($idArea, null, null, -1);
		$this->set(compact('area'));
	}
	public function ajax_img_tipamp($idTipAmp = null) {
		$this->layout = 'ajax';
		$tipoa = $this->Tipoampolla->findByid($idTipAmp, null, null, -1);
		$this->set(compact('tipoa'));
	}
	public function ajax_inf_tipamp($idTipAmp = null) {
		$this->layout = 'ajax';
		$tipoa = $this->Tipoampolla->findByid($idTipAmp, null, null, -1);
		$this->set(compact('tipoa'));
	}
	public function ajax_img_tipero($idTipEro = null) {
		$this->layout = 'ajax';
		$tipoe = $this->Tipoerocione->findByid($idTipEro, null, null, -1);
		/*debug($idTipEro);
		debug($tipoe);
		exit;*/
		$this->set(compact('tipoe'));
	}

}
