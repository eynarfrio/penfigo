<?php

App::uses('AppController', 'Controller');

class ExamenesController extends AppController {

    public $layout = 'penfigo';
    public $uses = array('Examene');

    public function index() {
        $examenes = $this->Examene->find('all');
        $this->set(compact('examenes'));
    }

    public function examen($idExamen = null) {
        $this->layout = 'ajax';
        if (!empty($this->request->data)) {
            //debug($this->request->data);
            //exit;
            $this->Examene->create();
            $this->Examene->save($this->request->data['Examene']);
            if (!empty($this->request->data['Examene']['id'])) {
                $idExamen = $this->request->data['Examene']['id'];
            } else {
                $idExamen = $this->Examene->getLastInsertID();
            }
            $this->Session->setFlash('Se registro correctamente!!!', 'msgbueno');
            $this->redirect(['action' => 'index']);
        }
        $this->Examene->id = $idExamen;
        $this->request->data = $this->Examene->read();
    }

    public function get_examenes() {
        $examenes = $this->Examene->find('all');
        return $examenes;
    }

    public function delete($id = null) {
        $this->Examene->id = $id;
        if (!$this->Examene->exists()) {
            $this->Session->setFlash('No existe.', 'msgerror');
        }
        if ($this->Examene->delete()) {
            $this->Session->setFlash('se elimino correctamente.', 'msgbueno');
        } else {
            $this->Session->setFlash('no se pudo eliminar.', 'msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }

}
