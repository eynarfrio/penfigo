<?php

App::uses('AppController', 'Controller');

class SintomasController extends AppController {

  public $uses = array('Medico', 'Paciente','Sintoma','PacientesSintoma');

  public function pacientesintomas($idPaciente = null,$numero = NULL){
   $sintomas = $this->Sintoma->find('all',['recursive' => -1]);
   $this->set(compact('sintomas','idPaciente'));
  }
  
  
}
