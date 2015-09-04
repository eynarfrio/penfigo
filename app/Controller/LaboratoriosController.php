<?php

App::uses('AppController', 'Controller');

class LaboratoriosController extends AppController {

    public $layout = 'penfigo';
    public $uses = array('Laboratorio', 'PacientesLaboratorio');

    public function index() {
        $laboratorios = $this->Laboratorio->find('all');
        $this->set(compact('laboratorios'));
    }

    public function laboratorio($idLaboratorio = null) {
        $this->layout = 'ajax';
        if (!empty($this->request->data)) {
            //debug($this->request->data);
            //exit;
            $this->Laboratorio->create();
            $this->Laboratorio->save($this->request->data['Laboratorio']);
            if (!empty($this->request->data['Laboratorio']['id'])) {
                $idLaboratorio = $this->request->data['Laboratorio']['id'];
            } else {
                $idLaboratorio = $this->Laboratorio->getLastInsertID();
            }
            $this->Session->setFlash('Se registro correctamente!!!', 'msgbueno');
            $this->redirect(['action' => 'index']);
        }
        $this->Laboratorio->id = $idLaboratorio;
        $this->request->data = $this->Laboratorio->read();
    }

    public function get_laboratorios($idPaciente = null, $numero = null) {
        $laboratorios = $this->PacientesLaboratorio->find('all', array(
            'recursive' => 0,
            'conditions' => array('PacientesLaboratorio.paciente_id' => $idPaciente, 'PacientesLaboratorio.numero' => $numero),
            'fields' => array('Laboratorio.nombre', 'PacientesLaboratorio.*')
        ));
        return $laboratorios;
    }

    public function paclaboratorio($idPaciente = null, $numero = null) {
        $this->layout = 'ajax';
        $laboratorios = $this->PacientesLaboratorio->find('all', array(
            'recursive' => 0,
            'conditions' => array('PacientesLaboratorio.paciente_id' => $idPaciente, 'PacientesLaboratorio.numero' => $numero),
        ));
        /* debug($laboratorios);
          exit; */
        if (empty($laboratorios)) {
            $laboratorios = $this->Laboratorio->find('all');
        } else {
            foreach ($laboratorios as $key => $lab) {
                $this->request->data['PacientesLaboratorio'][$key] = $lab['PacientesLaboratorio'];
            }
        }

        $this->set(compact('laboratorios', 'idPaciente', 'numero'));
    }

    public function regis_lab_pac($idPaciente = null, $numero = null) {
        if (!empty($this->request->data['PacientesLaboratorio'])) {
            foreach ($this->request->data['PacientesLaboratorio'] as $pa) {
                $datos = $pa;
                $this->PacientesLaboratorio->create();
                $datos['numero'] = $numero;
                $this->PacientesLaboratorio->save($datos);
            }
            $this->Session->setFlash("Se registro correctamente!!", 'msgbueno');
            $this->redirect(['controller' => 'Pacientes', 'action' => 'datos', $idPaciente]);
        }
    }

    public function delete($id = null) {
        $this->Laboratorio->id = $id;
        if (!$this->Laboratorio->exists()) {
            $this->Session->setFlash('No existe.', 'msgerror');
        }
        if ($this->Laboratorio->delete()) {
            $this->Session->setFlash('se elimino correctamente.', 'msgbueno');
        } else {
            $this->Session->setFlash('no se pudo eliminar.', 'msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }

}
