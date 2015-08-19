<?php

class LugaresController extends AppController {

    public $layout = 'penfigo';
    public $uses = array('Lugare');

    public function index() {
        $lugares = $this->Lugare->find('all');
        $this->set(compact('lugares'));
    }

    public function lugar($idLugar = null) {
        $this->layout = 'ajax';
        if (!empty($this->request->data)) {
            //debug($this->request->data);
            //exit;
            $this->Lugare->create();
            $this->Lugare->save($this->request->data['Lugare']);
            if (!empty($this->request->data['Lugare']['id'])) {
                $idLugar = $this->request->data['Lugare']['id'];
            } else {
                $idLugar = $this->Lugare->getLastInsertID();
                $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash('Se registro correctamente!!!', 'msgbueno');
            $this->redirect(['action' => 'index']);
        }
        $this->Lugare->id = $idLugar;
        $this->request->data = $this->Lugare->read();
        $lugares = $this->Lugare->find('list', ['fields' => ['nombre', 'nombre']]);
        $this->set(compact('lugares'));
        
    }
    
    public function delete ($id=null){
        $this->Lugare->id = $id;
        if (!$this->Lugare->exists()) {
            $this->Session->setFlash('No existe.','msgerror');
        }
        if ($this->Lugare->delete()) {
            $this->Session->setFlash('se elimino correctamente.','msgbueno');
        } else {
            $this->Session->setFlash('no se pudo eliminar.','msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }

}
