<?php

class TipoampollasController extends AppController {

    public $uses = array('Tipoampolla');

    public function index() {
        $tampollas = $this->Tipoampolla->find('all');
        $this->set(compact('tampollas'));
    }

    public function tipoampolla($idAmpolla = null) {
        if (!empty($this->request->data)) {
            // debug($this->request->data);
            //exit;
            $this->Tipoampolla->create();
            $this->Tipoampolla->save($this->request->data['Tipoampolla']);
            if (!empty($this->request->data['Tipoampolla']['id'])) {
                $idAmpolla = $this->request->data['Tipoampolla']['id'];
            } else {
                $idAmpolla = $this->Tipoampolla->getLastInsertID();
                $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash('Se registro correctamente', 'msgbueno');
            $this->redirect(array('action' => 'index'));
        }
        $this->Tipoampolla->id = $idAmpolla;
        $this->request->data = $this->Tipoampolla->read();
    }

    public function delete($id = null) {
        $this->Tipoampolla->id = $id;
        if (!$this->Tipoampolla->exists()) {
            $this->Session->setFlash('No existe.', 'msgerror');
        }
        if ($this->Tipoampolla->delete()) {
            $this->Session->setFlash('se elimino correctamente.', 'msgbueno');
        } else {
            $this->Session->setFlash('no se pudo eliminar.', 'msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }

}
