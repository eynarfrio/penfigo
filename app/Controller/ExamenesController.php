<?php

App::uses('AppController', 'Controller');

class ExamenesController extends AppController {

  public $layout = 'penfigo';
  public $uses = array('Examene');
  
  public function get_examenes(){
    $examenes = $this->Examene->find('all');
    return $examenes;
  }
}