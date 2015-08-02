<?php

class PenfigoerocionesController extends AppController {

    public $uses = array('Penfigo', 'Area', 'Tipoerocione', 'Penfigoerocione');

  public function penfigoerocion($idPenfigo = null) {
    $this->layout = 'ajax';
    $arampollas = $this->Area->find('list', array('fields' => 'Area.nombre'));
    $terocion=  $this->Tipoerocione->find('list',array('fields'=>'Tipoerocione.nombre'));
    $perocione = $this->Penfigoerocione->find('all', array(
      'recursive' => 0,
      'conditions' => array('Penfigoerocione.penfigo_id' => $idPenfigo)
    ));
    $penfigo = $this->Penfigo->findByid($idPenfigo, null, null, -1);
    $this->set(compact('perocione', 'arampollas', 'penfigo', 'idPenfigo', 'terocion'));
  }
  
    public function registra($idPenfigo = null) {
    if(!empty($this->request->data['Penfigoerocione']['area_id'])){
      $encuentra = $this->Penfigoerocione->find('first',array(
        'recursive' => -1,
        'conditions' => array('area_id' => $this->request->data['Penfigoerocione']['area_id'],'penfigo_id' => $idPenfigo)
      ));
      if(!empty($encuentra)){
        $this->request->data['Penfigoerocione']['id'] = $encuentra['Penfigoerocione']['id'];
      }
      $this->Penfigoerocione->create();
      $this->Penfigoerocione->save($this->request->data['Penfigoerocione']);
    }
    exit;
  }
}
