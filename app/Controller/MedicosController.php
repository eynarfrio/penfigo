<?php

App::uses('AppController', 'Controller');

class MedicosController extends AppController {
  public $uses = array('Medico','Lugare','User');
  
  public function informacion(){
    
  }
  public function mis_pacientes(){
    
  }
  public function get_medico(){
    return $this->Medico->findByuser_id($this->Session->read('Auth.User.id'));
  }
  
  public function form_medico() {
    $this->request->data = $this->get_medico();
    $idMedico = $this->request->data['Medico']['id'];
    $lugares = $this->Lugare->find('list', array('fields' => array('nombre', 'nombre')));
    $this->set(compact('lugares','idMedico'));
	}
  
  public function registra_medico(){
    if(!empty($this->request->data['User']['password2'])){
      $this->request->data['User']['password'];
    }
    $this->request->data['User']['username'] = $this->request->data['Medico']['ci'];
    $this->User->id = $this->Session->read('Auth.User.id');
    $this->User->save($this->request->data['User']);
    $this->Medico->create();
    $this->Medico->save($this->request->data['Medico']);
    $this->Session->setFlash("Se registro correctamente!!!",'msgbueno');
    $this->redirect(array('action' => 'ver',$this->Session->read('Auth.User.id'))); 
  }
  
  public function ver($idUser = null){
    $medico = $this->Medico->findByuser_id($idUser,null,null,-1);
    /*debug($medico);
    exit;*/
    $this->set(compact('medico'));
  }
  
  public function index(){
    $medicos = $this->Medico->find('all',array(
      'recursive' => -1
    ));
    $this->set(compact('medicos'));
  }
  
  
}
