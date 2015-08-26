<?php

App::uses('AppController', 'Controller');

class TratamientosController extends AppController {

  public $layout = 'penfigo';
  public $uses = array('Tratamiento');

  public function get_trat_pac($idPaciente = null, $numero = null) {
    $tratamiento = $this->Tratamiento->find('first', array(
      'recursive' => -1,
      'conditions' => array('paciente_id' => $idPaciente, 'numero' => $numero)
    ));
    return $tratamiento;
  }

  public function pac_tratamiento($idPaciente = null,$numero = null,$id = null) {
    $this->layout = 'ajax';
    $this->Tratamiento->id = $id;
    $this->request->data = $this->Tratamiento->read();
    $this->set(compact('idPaciente','numero'));
  }
  
  public function regis_trat_pac(){
    $this->Tratamiento->create();
    $this->Tratamiento->save($this->request->data['Tratamiento']);
    $this->Session->setFlash("Se registro correctamente el tratamiento!!",'msgbueno');
    $this->redirect($this->referer());
  }

}
