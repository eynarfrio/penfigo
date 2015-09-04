<?php

App::uses('AppController', 'Controller');

class PenfigosintomasController extends AppController {

  public $layout = 'penfigo';
  public $uses = array('Penfigosintoma', 'Pielsintoma', 'Penfigo');

  public function penfigosintoma($idPenfigo = null) {
    $this->layout = 'ajax';
    $lpsintomas = $this->Pielsintoma->find('list', array('fields' => 'Pielsintoma.nombre'));
    $psintomas = $this->Penfigosintoma->find('all', array(
      'recursive' => 0,
      'conditions' => array('Penfigosintoma.penfigo_id' => $idPenfigo)
    ));
    $penfigo = $this->Penfigo->findByid($idPenfigo, null, null, -1);
    $this->set(compact('psintomas', 'lpsintomas', 'penfigo', 'idPenfigo'));
  }

  public function registra($idPenfigo = null) {
    if(!empty($this->request->data['Penfigosintoma']['pielsintoma_id'])){
      $encuentra = $this->Penfigosintoma->find('first',array(
        'recursive' => -1,
        'conditions' => array('pielsintoma_id' => $this->request->data['Penfigosintoma']['pielsintoma_id'],'penfigo_id' => $idPenfigo)
      ));
      if(!empty($encuentra)){
        $this->request->data['Penfigosintoma']['id'] = $encuentra['Penfigosintoma']['id'];
      }
      $this->Penfigosintoma->create();
      $this->Penfigosintoma->save($this->request->data['Penfigosintoma']);
    }
    exit;
  }

}
