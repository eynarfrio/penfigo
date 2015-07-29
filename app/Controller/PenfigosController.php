<?php

App::uses('AppController', 'Controller');

class PenfigosController extends AppController {

  public $uses = array(
    'Penfigo',
    'Penfigoampolla',
    'Penfigoerocione',
    'Penfigosintoma',
    'PacientesPielsintoma',
    'PacientesTipoampolla',
    'PacientesTipoerocione'
  );

  public function pre_diagnostico($idPaciente = null, $numero = null) {
    $penfigos = $this->Penfigo->find('all');
    foreach ($penfigos as $key => $pen) {
      
    }
  }

  public function get_num_sintomas($idPaciente = null, $numero = null, $idPenfigo = null) {
    $sintomas_i = $this->Penfigosintoma->find('list', array(
      'recursive' => 0,
      'conditions' => array('Penfigosintoma.penfigo_id' => $idPenfigo, 'Penfigosintoma.importancia' => 1),
      'fields' => 'Penfigosintoma.pielsintomas_id'
    ));
    $sintomas = $this->Penfigosintoma->find('list', array(
      'recursive' => 0,
      'conditions' => array('Penfigosintoma.penfigo_id' => $idPenfigo, 'Penfigosintoma.importancia' => array(null, 0)),
      'fields' => 'Penfigosintoma.pielsintomas_id'
    ));

    $n_sintomas_i = $this->PacientesPielsintoma->find('count', array(
      'recursive' => -1,
      'conditions' => array(
        'PacientesPielsintoma.paciente_id' => $idPaciente,
        'PacientesPielsintoma.pielsintoma_id' => $sintomas_i,
        'PacientesPielsintoma.estado' => 1,
        'PacientesPielsintoma.numero' => $numero
      )
    ));
    $n_sintomas = $this->PacientesPielsintoma->find('count', array(
      'recursive' => -1,
      'conditions' => array(
        'PacientesPielsintoma.paciente_id' => $idPaciente,
        'PacientesPielsintoma.pielsintoma_id' => $sintomas,
        'PacientesPielsintoma.estado' => 1,
        'PacientesPielsintoma.numero' => $numero
      )
    ));

    if (count($sintomas_i) <= count($sintomas)) {
      if (count($sintomas_i) > 0) {
        $total_i = $n_sintomas_i / count($sintomas_i) * 51;
      } else {
        $total_i = 0;
      }
      if (count($sintomas) > 0) {
        $total_n = $n_sintomas / count($sintomas) * 49;
      } else {
        $total_n = 0;
      }
      $total = $total_i + $total_n;
    } else {
      $sintomas_t = count($sintomas_i) + count($sintomas);
      if ($sintomas_t > 0) {
        $total = (($n_sintomas_i + $n_sintomas) / $sintomas_t) * 100;
      } else {
        $total = 0;
      }
    }
    return $total;
  }

}
