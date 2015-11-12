<?php

App::uses('AppController', 'Controller');

class LugaresController extends AppController {

    public $layout = 'penfigo';
    public $uses = array('Lugare');

    public function index() {
        $ciudades = $this->Lugare->find('all');
        $this->set(compact('ciudades'));
    }

   public function lugar($idLugare = null) {
        $this->layout = 'ajax';
        if (!empty($this->request->data)) {
            //debug($this->request->data);
            //exit;
            $this->Lugare->create();
            $this->Lugare->save($this->request->data['Lugare']);
            if (!empty($this->request->data['Lugare']['id'])) {
                $idLugare = $this->request->data['Lugare']['id'];
            } else {
                $idLugare = $this->Lugare->getLastInsertID();
            }
            $this->Session->setFlash('Se registro correctamente!!!', 'msgbueno');
            $this->redirect(['action' => 'index']);
        }
        $this->Lugare->id = $idLugare;
        $this->request->data = $this->Lugare->read();
    }

    public function delete($id = null) {
        $this->Lugare->id = $id;
        if (!$this->Lugare->exists()) {
            $this->Session->setFlash('No existe.', 'msgerror');
        }
        if ($this->Lugare->delete()) {
            $this->Session->setFlash('se elimino correctamente.', 'msgbueno');
        } else {
            $this->Session->setFlash('no se pudo eliminar.', 'msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }

}
