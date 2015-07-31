<?php

App::uses('AppController', 'Controller');

class MedicosController extends AppController {
  public $uses = ['Medico'];
  
  public function informacion(){
    
  }
  public function mis_pacientes(){
    
  }
  public function get_medico(){
    return $this->Medico->findByid($this->Session->read('Auth.User.id'));
  }
}
