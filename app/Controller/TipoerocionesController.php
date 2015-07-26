<?php

class TipoerocionesController extends AppController {

    public $uses = array('Tipoerocione');

    public function index() {
        $terociones = $this->Tipoerocione->find('all');
        $this->set(compact('terociones'));
    }

    public function tipoerocion($idErocion = null) {
        if (!empty($this->request->data)) {
            // debug($this->request->data);
            //exit;
            $this->Tipoerocione->create();
            $this->Tipoerocione->save($this->request->data['Tipoerocione']);
            if (!empty($this->request->data['Tipoerocione']['id'])) {
                $idErocion = $this->request->data['Tipoerocione']['id'];
            } else {
                $idErocion = $this->Tipoerocione->getLastInsertID();
                $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash('Se registro correctamente', 'msgbueno');
            $this->redirect(array('action' => 'index'));
        }
        $this->Tipoerocione->id = $idErocion;
        $this->request->data = $this->Tipoerocione->read();
    }

    public function delete($id = null) {
        $this->Tipoerocione->id = $id;
        if (!$this->Tipoerocione->exists()) {
            $this->Session->setFlash('No existe.', 'msgerror');
        }
        if ($this->Tipoerocione->delete()) {
            $this->Session->setFlash('se elimino correctamente.', 'msgbueno');
        } else {
            $this->Session->setFlash('no se pudo eliminar.', 'msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }

}
