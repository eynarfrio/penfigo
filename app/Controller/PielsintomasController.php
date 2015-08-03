<?php

class PielsintomasController extends AppController {

    public $uses = array('Pielsintoma');

    public function index() {
        $psintomas = $this->Pielsintoma->find('all');
        $this->set(compact('psintomas'));
    }

    public function pielsintoma($idPiel = null) {
        $this->layout = 'ajax';
        if (!empty($this->request->data)) {
            // debug($this->request->data);
            //exit;
            $this->Pielsintoma->create();
            $this->Pielsintoma->save($this->request->data['Pielsintoma']);
            if (!empty($this->request->data['Pielsintoma']['id'])) {
                $idPiel = $this->request->data['Pielsintoma']['id'];
            } else {
                $idPiel = $this->Pielsintoma->getLastInsertID();
                $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash('Se registro correctamente', 'msgbueno');
            $this->redirect(array('action' => 'index'));
        }
        $this->Pielsintoma->id = $idPiel;
        $this->request->data = $this->Pielsintoma->read();
        $psintomas = $this->Pielsintoma->find('list', ['fields' => ['nombre', 'nombre']]);
        $this->set(compact('psintomas'));
    }

    public function delete($id = null) {
        $this->Pielsintoma->id = $id;
        if ($this->Pielsintoma->exists()) {
            $this->Session->setFlash('NO EXISTE', 'msgerror');
        }
        if ($this->Pielsintoma->delete()) {
            $this->Session->setFlash('Se elimino correctamente', 'msgbueno');
        } else {
            $this->Session->setFlash('No se pudo eliminar', 'msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }

}
