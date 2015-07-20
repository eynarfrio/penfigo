<?php

App::uses('AppController', 'Controller');

class SintomasController extends AppController {

  public $uses = array('Medico', 'Paciente', 'Sintoma', 'PacientesSintoma');

  public function pacientesintomas($idPaciente = null, $numero = NULL) {
    $sintomas = $this->Sintoma->find('all', ['recursive' => -1]);
    $this->set(compact('sintomas', 'idPaciente'));
  }

  public function ajax_sintomas($idPaciente = null, $numero = NULL) {
    $this->layout = 'ajax';
    if (!empty($numero)) {
      $sintomas = $this->PacientesSintoma->find('all', [
        'recursive' => 0,
        'conditions' => ['PacientesSintoma.paciente_id' => $idPaciente, 'PacientesSintoma.numero' => $numero],
        'fields' => ['PacientesSintoma.*','Sintoma.*']
      ]);
      foreach ($sintomas as $key => $sin){
        $this->request->data['PacientesSintoma'][$key] = $sin['PacientesSintoma'];
      }
    }else{
      $sintomas = $this->Sintoma->find('all', ['recursive' => -1]);
    }
    $this->set(compact('sintomas', 'idPaciente','numero'));
  }

  public function get_ult_num($idPaciente = null) {
    $sintoma_n = $this->PacientesSintoma->find('first', [
      'conditions' => ['PacientesSintoma.paciente_id' => $idPaciente]
      , 'order' => 'PacientesSintoma.id DESC'
      , 'fields' => ['PacientesSintoma.numero']
    ]);
    if (!empty($sintoma_n)) {
      return $sintoma_n['PacientesSintoma']['numero'];
    } else {
      return NULL;
    }
  }

  public function regis_sin_pac($idPaciente = null,$numero = null) {
    if (!empty($this->request->data['PacientesSintoma'])) {
      if(empty($numero)){
        $numero = $this->genera_numero();
      }
      foreach ($this->request->data['PacientesSintoma'] as $pa) {
        $datos = $pa;
        $this->PacientesSintoma->create();
        $datos['numero'] = $numero;
        $this->PacientesSintoma->save($datos);
      }
      $this->Session->setFlash("Se registro correctamente!!", 'msgbueno');
      $this->redirect(['controller' => 'Pacientes', 'action' => 'datos', $idPaciente]);
    }
  }

  public function genera_numero() {
    $sin_t = $this->PacientesSintoma->find('first', [
      'order' => 'PacientesSintoma.id DESC',
      'fields' => ['PacientesSintoma.numero']
    ]);
    if (!empty($sin_t)) {
      return $sin_t['PacientesSintoma']['numero'] + 1;
    } else {
      return 1;
    }
  }
  
  public function elimina_sin($idPaciente = null,$numero = null){
    $this->PacientesSintoma->deleteAll(['PacientesSintoma.paciente_id' => $idPaciente,'PacientesSintoma.numero' => $numero]);
    $this->Session->setFlash('Se elimino correctamente los sintomas!!','msgbueno');
    $this->redirect($this->referer());
  }

}