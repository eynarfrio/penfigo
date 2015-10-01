<?php

App::uses('AppController', 'Controller');

class TratamientosController extends AppController {

  public $layout = 'penfigo';
  public $uses = array('Tratamiento', 'Penfigo','PacientesResultado');

  public function get_trat_pac($idPaciente = null, $numero = null) {
    $tratamiento = $this->Tratamiento->find('first', array(
      'recursive' => -1,
      'conditions' => array('paciente_id' => $idPaciente, 'numero' => $numero)
    ));
    return $tratamiento;
  }

  public function pac_tratamiento($idPaciente = null, $numero = null, $id = null) {
    $this->layout = 'ajax';
    $tratamiento = $this->Tratamiento->find('first', array(
      'recursive' => -1,
      'conditions' => array('paciente_id' => $idPaciente, 'numero' => $numero)
    ));
    if (!empty($tratamiento)) {
      $this->request->data = $tratamiento;
    } else {
      $idPenfigo = $this->get_resultado_ex($idPaciente, $numero);
      if (!empty($idPenfigo)) {
        $penfigo = $this->Penfigo->find('first', array(
          'recursive' => -1,
          'conditions' => array('id' => $idPenfigo),
          'fields' => array('nombre', 'tratamiento'),
        ));
        if(!empty($penfigo)){
          $this->request->data['Tratamiento']['descripcion'] = $penfigo['Penfigo']['tratamiento'];
        }
      }
    }
    $this->set(compact('idPaciente', 'numero'));
  }

  public function get_resultado_ex($idPaciente = null, $numero = null) {
    //debug($numero);exit;
    $resultado = $this->PacientesResultado->find('first', array(
      'recursive' => 0,
      'conditions' => array('PacientesResultado.numero' => $numero, 'PacientesResultado.paciente_id' => $idPaciente),
      'fields' => array('Resultado.penfigo_id'),
    ));
    if (!empty($resultado)) {
      return $resultado['Resultado']['penfigo_id'];
    } else {
      return NULL;
    }
  }

  public function regis_trat_pac() {
    $this->Tratamiento->create();
    $this->Tratamiento->save($this->request->data['Tratamiento']);
    $this->Session->setFlash("Se registro correctamente el tratamiento!!", 'msgbueno');
    $this->redirect($this->referer());
  }

}
