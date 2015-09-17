<?php

App::uses('AppController', 'Controller');

class ResultadosController extends AppController {

    public $layout = 'penfigo';
    public $uses = array('Resultado', 'Examene', 'PacientesResultado', 'Penfigo');

    public function index() {
        $resultados = $this->Resultado->find('all');
        $this->set(compact('resultados'));
    }

    public function resultado($idResultado = null) {
        $this->layout = 'ajax';
        if (!empty($this->request->data)) {
            //debug($this->request->data);
            //exit;
            $this->Resultado->create();
            $this->Resultado->save($this->request->data['Resultado']);
            if (!empty($this->request->data['Resultado']['id'])) {
                $idResultado = $this->request->data['Resultado']['id'];
            } else {
                $idResultado = $this->Resultado->getLastInsertID();
            }
            $this->Session->setFlash('Se registro correctamente!!!', 'msgbueno');
            $this->redirect(['action' => 'index']);
        }

        $this->Resultado->id = $idResultado;
        $this->request->data = $this->Resultado->read();
        $penfigo = $this->Penfigo->find('list', array('fields' => 'Penfigo.nombre'));
        $examen = $this->Examene->find('list',array('fields'=>'Examene.nombre'));
        $this->set(compact('penfigo','examen'));
    }

    public function get_res_pac($idPaciente = null, $numero = null, $idExamene = null) {
        $resultado = $this->PacientesResultado->find('first', array(
            'recursive' => 0,
            'conditions' => array('PacientesResultado.paciente_id' => $idPaciente, 'PacientesResultado.numero' => $numero, 'PacientesResultado.examene_id' => $idExamene),
            'fields' => array('Resultado.*', 'PacientesResultado.*')
        ));
        return $resultado;
    }

    public function pac_examen($idPaciente = null, $numero = null, $idExamen = null, $id = null) {
        $this->layout = 'ajax';
        $resultados = $this->Resultado->find('list', array(
            'conditions' => array('Resultado.examene_id' => $idExamen),
            'fields' => array('id', 'descripcion')
        ));
        $examen = $this->Examene->findByid($idExamen, null, null, -1);
        $this->PacientesResultado->id = $id;
        $this->request->data = $this->PacientesResultado->read();
        $this->set(compact('resultados', 'idPaciente', 'numero', 'examen', 'idExamen'));
    }

    public function regis_res_pac() {
        $this->PacientesResultado->create();
        $this->PacientesResultado->save($this->request->data['PacientesResultado']);
        $this->Session->setFlash("Se registro correctamente!!", 'msgbueno');
        $this->redirect($this->referer());
    }

    public function get_res_pen($idResultado = null) {
        $resultado = $this->Resultado->find('first', array(
            'recursive' => 0,
            'conditions' => array('Resultado.id' => $idResultado),
            'fields' => array('Penfigo.nombre')
        ));
        return $resultado['Penfigo']['nombre'];
    }

    public function delete($id = null) {
        $this->Resultado->id = $id;
        if (!$this->Resultado->exists()) {
            $this->Session->setFlash('No existe.', 'msgerror');
        }
        if ($this->Resultado->delete()) {
            $this->Session->setFlash('se elimino correctamente.', 'msgbueno');
        } else {
            $this->Session->setFlash('no se pudo eliminar.', 'msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }

}
