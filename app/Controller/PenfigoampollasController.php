<?php

class PenfigoampollasController extends AppController {

    public $uses = array('Penfigo', 'Area', 'Tipoampolla', 'Penfigoampolla');

    public function index() {
     $pampollas = $this->Penfigoampolla->find ('all');
     $this->set(compact('pampollas'));
    }

    public function penfigoampolla ($idPampolla = null){
        $this->layout = 'ajax';
        if (!empty($this->request->data)){
            
        }
        $areas = $this->Area->find('list', array('fields' => 'nombre'));
        $penfigo=$this->Penfigo->find('list', array('fields'=>'nombre'));
        $ampolla=  $this->Tipoampolla->find('list', array('fields'=>'nombre'));
        $this->set(compact('areas','penfigo','ampolla'));
    }
}
