<?php

App::uses('AppController', 'Controller');

class PacientesController extends AppController {

  public $uses = ['Paciente', 'PacientesMedico', 'Medico', 'Lugare'];

  public function mispacientes() {
    $pacientes = $this->PacientesMedico->find('all', [
      'recursive' => 0,
      'conditions' => ['PacientesMedico.medico_id' => $this->get_id_medico()],
      'group' => ['PacientesMedico.paciente_id'],
      'order' => ['Paciente.modified DESC']
    ]);
    /*debug($pacientes);
    exit;*/
    $this->set(compact('pacientes'));
  }

  public function paciente($idPaciente = null) {
    if(!empty($this->request->data)){
      /*debug($this->request->data);
      exit;*/
      $dato = $this->request->data;
      $this->Paciente->create();
      $this->Paciente->save($dato['Paciente']);
      if(!empty($dato['Paciente']['id'])){
        $idPaciente = $dato['Paciente']['id'];
      }else{
        $idPaciente = $this->Paciente->getLastInsertID();
        $this->genera_med_pac($idPaciente);
      }
      $this->Session->setFlash('Se registro correctamente el paciente!!!','msgbueno');
      $this->redirect(['action' => 'mispacientes']);
    }
    $this->Paciente->id = $idPaciente;
    $this->request->data = $this->Paciente->read();
    $lugares = $this->Lugare->find('list',['fields' => ['nombre','nombre']]);
    $this->set(compact('lugares'));
  }
  
  public function genera_med_pac($idPaciente = null){
    $this->PacientesMedico->create();
    $dat_pac['paciente_id'] = $idPaciente;
    $dat_pac['medico_id'] = $this->get_id_medico();
    $this->PacientesMedico->save($dat_pac);
  }

  public function get_medico() {
    return $this->Medico->findByid($this->Session->read('Auth.User.id'));
  }

  public function get_id_medico() {
    $medico = $this->get_medico();
    return $medico['Medico']['id'];
  }

}
