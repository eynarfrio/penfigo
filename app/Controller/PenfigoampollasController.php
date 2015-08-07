<?php

class PenfigoampollasController extends AppController {

    public $uses = array('Penfigo', 'Area', 'Tipoampolla', 'Penfigoampolla');

  public function penfigoampolla($idPenfigo = null) {
    $this->layout = 'ajax';
    $arampollas = $this->Area->find('list', array('fields' => 'Area.nombre'));
    $tampolla=  $this->Tipoampolla->find('list',array('fields'=>'Tipoampolla.nombre'));
    $pampolla = $this->Penfigoampolla->find('all', array(
      'recursive' => 0,
      'conditions' => array('Penfigoampolla.penfigo_id' => $idPenfigo)
    ));
    $penfigo = $this->Penfigo->findByid($idPenfigo, null, null, -1);
    $this->set(compact('pampolla', 'arampollas', 'penfigo', 'idPenfigo', 'tampolla'));
  }
  
    public function registra($idPenfigo = null) {
    if(!empty($this->request->data['Penfigoampolla']['area_id'])){
      $encuentra = $this->Penfigoampolla->find('first',array(
        'recursive' => -1,
        'conditions' => array('area_id' => $this->request->data['Penfigoampolla']['area_id'],'penfigo_id' => $idPenfigo)
      ));
      if(!empty($encuentra)){
        $this->request->data['Penfigoampolla']['id'] = $encuentra['Penfigoampolla']['id'];
      }
      $this->Penfigoampolla->create();
      $this->Penfigoampolla->save($this->request->data['Penfigoampolla']);
    }
    exit;
  }
}