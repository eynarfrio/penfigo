<?php

App::uses('AppController', 'Controller');

class PenfigosController extends AppController {

  public $layout = 'penfigo';
  public $uses = array(
    'Penfigo',
    'Penfigoampolla',
    'Penfigoerocione',
    'Penfigosintoma',
    'PacientesPielsintoma',
    'PacientesTipoampolla',
    'PacientesTipoerocione'
  );

  public function index() {
    $penfigos = $this->Penfigo->find('all');
    $this->set(compact('penfigos'));
  }

  public function penfigo($idPenfigo = NULL) {
    $this->layout = 'ajax';
    if (!empty($this->request->data['Penfigo'])) {
      $this->Penfigo->create();
      $this->Penfigo->save($this->request->data['Penfigo']);
      $this->Session->setFlash("Se registro correctamente el penfigo!!", 'msgbueno');
      $this->redirect(array('action' => 'index'));
    }
    $this->Penfigo->id = $idPenfigo;
    $this->request->data = $this->Penfigo->read();
  }

  public function delete($idPenfigo = null) {
    $this->Penfigo->delete($idPenfigo);
    $this->Session->setFlash("Se elimino correctamente!!!", 'msgbueno');
    $this->redirect(array('action' => 'index'));
  }

  public function pre_diagnostico($idPaciente = null, $numero = null) {
    $this->layout = 'ajax';
    $penfigos = $this->Penfigo->find('all');
    foreach ($penfigos as $key => $pen) {
      $penfigos[$key]['resultado_sintomas'] = $this->get_num_sintomas($idPaciente, $numero, $pen['Penfigo']['id']);
      $penfigos[$key]['resultado_num_ampollas_m'] = $this->get_num_ampollas($idPaciente, $numero, $pen['Penfigo']['id'], 'Mucosas');
      $penfigos[$key]['resultado_num_ampollas_p'] = $this->get_num_ampollas($idPaciente, $numero, $pen['Penfigo']['id'], 'Piel');
      $penfigos[$key]['resultado_num_erociones_m'] = $this->get_num_erociones($idPaciente, $numero, $pen['Penfigo']['id'], 'Mucosas');
      $penfigos[$key]['resultado_num_erociones_p'] = $this->get_num_erociones($idPaciente, $numero, $pen['Penfigo']['id'], 'Piel');

      $diagnostico_t = $penfigos[$key]['resultado_sintomas'] + $penfigos[$key]['resultado_num_ampollas_m'] + $penfigos[$key]['resultado_num_ampollas_p'] + $penfigos[$key]['resultado_num_erociones_m'] + $penfigos[$key]['resultado_num_erociones_p'];
      $penfigos[$key]['diagnostico'] = round($diagnostico_t / 5, 2);
    }
    $this->set(compact('penfigos'));
  }

  public function get_nikolsky($idPaciente = null, $numero = null) {
    $nikolsky = $this->PacientesPielsintoma->find('first', array(
      'recursive' => 0,
      'conditions' => array(
        'Pielsintoma.nombre' => 'Signo de Nikolsky',
        'PacientesPielsintoma.estado' => 1,
        'PacientesPielsintoma.paciente_id' => $idPaciente,
        'PacientesPielsintoma.numero' => $numero
      ),
      'fields' => array('PacientesPielsintoma.id')
    ));
    $nro_sint_p = $this->PacientesPielsintoma->find('count', array(
      'recursive' => -1,
      'conditions' => array(
        'PacientesPielsintoma.paciente_id' => $idPaciente,
        'PacientesPielsintoma.numero' => $numero
      )
    ));
    $veri_nikolsky = FALSE;
    if (empty($nikolsky) && $nro_sint_p > 0) {
      $veri_nikolsky = TRUE;
    }
    return $veri_nikolsky;
  }

  public function get_num_sintomas($idPaciente = null, $numero = null, $idPenfigo = null) {
    $sintomas_i = $this->Penfigosintoma->find('list', array(
      'recursive' => 0,
      'conditions' => array('Penfigosintoma.penfigo_id' => $idPenfigo, 'Penfigosintoma.importancia' => 1),
      'fields' => 'Penfigosintoma.pielsintoma_id'
    ));
    $sintomas = $this->Penfigosintoma->find('list', array(
      'recursive' => 0,
      'conditions' => array(
        'Penfigosintoma.penfigo_id' => $idPenfigo,
        'OR' => array(
          array('Penfigosintoma.importancia' => NULL),
          array('Penfigosintoma.importancia' => 0)
        )
      ),
      'fields' => 'Penfigosintoma.pielsintoma_id'
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

  public function get_num_ampollas($idPaciente = null, $numero = null, $idPenfigo = null, $tipo = null) {
    $ampollas_i = $this->Penfigoampolla->find('all', array(
      'recursive' => 0,
      'conditions' => array(
        'Penfigoampolla.penfigo_id' => $idPenfigo,
        'Penfigoampolla.importancia' => 1,
        'Area.tipo' => $tipo
      ),
      'fields' => array('Penfigoampolla.area_id', 'Penfigoampolla.tipoampolla_id')
    ));
    $array_a_i = array();
    foreach ($ampollas_i as $am) {
      $array_a_i['Areaampolla.area_id'] = $am['Penfigoampolla']['area_id'];
      $array_a_i['PacientesTipoampolla.tipoampolla_id'] = $am['Penfigoampolla']['tipoampolla_id'];
      $array_a_i['PacientesTipoampolla.estado'] = 1;
      $array_a_i['Areaampolla.paciente_id'] = $idPaciente;
      $array_a_i['Areaampolla.numero'] = $numero;
    }

    $ampollas = $this->Penfigoampolla->find('all', array(
      'recursive' => 0,
      'conditions' => array(
        'Penfigoampolla.penfigo_id' => $idPenfigo,
        'Area.tipo' => $tipo,
        'OR' => array(
          array('Penfigoampolla.importancia' => NULL),
          array('Penfigoampolla.importancia' => 0)
        )
      ),
      'fields' => array('Penfigoampolla.area_id', 'Penfigoampolla.tipoampolla_id')
    ));
    $array_a = array();
    foreach ($ampollas as $am) {
      $array_a['Areaampolla.area_id'] = $am['Penfigoampolla']['area_id'];
      $array_a['PacientesTipoampolla.tipoampolla_id'] = $am['Penfigoampolla']['tipoampolla_id'];
      $array_a['PacientesTipoampolla.estado'] = 1;
      $array_a['Areaampolla.paciente_id'] = $idPaciente;
      $array_a['Areaampolla.numero'] = $numero;
    }

    if (!empty($array_a_i)) {
      $n_ampolla_i = $this->PacientesTipoampolla->find('count', array(
        'recursive' => 0,
        'conditions' => $array_a_i
      ));
    } else {
      $n_ampolla_i = 0;
    }

    if (!empty($array_a)) {
      $n_ampolla = $this->PacientesTipoampolla->find('count', array(
        'recursive' => 0,
        'conditions' => $array_a
      ));
    } else {
      $n_ampolla = 0;
    }

    //debug($ampollas_i);
    if (count($ampollas_i) <= count($ampollas)) {
      if (count($ampollas_i) > 0) {
        $total_i = $n_ampolla_i / count($ampollas_i) * 51;
      } else {
        $total_i = 51;
      }
      if (count($ampollas) > 0) {
        $total_n = $n_ampolla / count($ampollas) * 49;
      } else {
        $total_n = 49;
      }
      $total = $total_i + $total_n;
    } else {
      $sintomas_t = count($ampollas_i) + count($ampollas);
      if ($sintomas_t > 0) {
        $total = ((count($ampollas_i) + $n_ampolla) / $sintomas_t) * 100;
      } else {
        $total = 100;
      }
    }
    return $total;
  }

  public function get_num_erociones($idPaciente = null, $numero = null, $idPenfigo = null, $tipo = null) {
    $erociones_i = $this->Penfigoerocione->find('all', array(
      'recursive' => 0,
      'conditions' => array(
        'Penfigoerocione.penfigo_id' => $idPenfigo,
        'Penfigoerocione.importancia' => 1,
        'Area.tipo' => $tipo
      ),
      'fields' => array('Penfigoerocione.area_id', 'Penfigoerocione.tipoerocione_id')
    ));
    $array_a_i = array();
    foreach ($erociones_i as $am) {
      $array_a_i['Areaampolla.area_id'] = $am['Penfigoerocione']['area_id'];
      $array_a_i['PacientesTipoerocione.tipoerocione_id'] = $am['Penfigoerocione']['tipoerocione_id'];
      $array_a_i['PacientesTipoerocione.estado'] = 1;
      $array_a_i['Areaampolla.paciente_id'] = $idPaciente;
      $array_a_i['Areaampolla.numero'] = $numero;
    }

    $erociones = $this->Penfigoerocione->find('all', array(
      'recursive' => 0,
      'conditions' => array(
        'Penfigoerocione.penfigo_id' => $idPenfigo,
        'Area.tipo' => $tipo,
        'OR' => array(
          array('Penfigoerocione.importancia' => NULL),
          array('Penfigoerocione.importancia' => 0)
        )
      ),
      'fields' => array('Penfigoerocione.area_id', 'Penfigoerocione.tipoerocione_id')
    ));
    $array_a = array();
    foreach ($erociones as $am) {
      $array_a['Areaampolla.area_id'] = $am['Penfigoerocione']['area_id'];
      $array_a['PacientesTipoerocione.tipoerocione_id'] = $am['Penfigoerocione']['tipoerocione_id'];
      $array_a['PacientesTipoerocione.estado'] = 1;
      $array_a['Areaampolla.paciente_id'] = $idPaciente;
      $array_a['Areaampolla.numero'] = $numero;
    }

    if (!empty($array_a_i)) {
      $n_erocion_i = $this->PacientesTipoerocione->find('count', array(
        'recursive' => 0,
        'conditions' => $array_a_i
      ));
    } else {
      $n_erocion_i = 0;
    }

    if (!empty($array_a)) {
      $n_erocion = $this->PacientesTipoerocione->find('count', array(
        'recursive' => 0,
        'conditions' => $array_a
      ));
    } else {
      $n_erocion = 0;
    }


    if (count($erociones_i) <= count($erociones)) {
      if (count($erociones_i) > 0) {
        $total_i = $n_erocion_i / count($erociones_i) * 51;
      } else {
        $total_i = 51;
      }
      if (count($erociones) > 0) {
        $total_n = $n_erocion / count($erociones) * 49;
      } else {
        $total_n = 49;
      }
      $total = $total_i + $total_n;
    } else {
      $sintomas_t = count($erociones_i) + count($erociones);
      if ($sintomas_t > 0) {
        $total = ((count($erociones_i) + $n_erocion) / $sintomas_t) * 100;
      } else {
        $total = 100;
      }
    }
    return $total;
  }

}
