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
    'PacientesTipoerocione',
    'PacientesResultado',
    'PacientesSintoma',
    'Areaampolla',
    'PacientesTipoampolla',
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
    $verifica = $this->verifica_datos_ll($idPaciente, $numero);
    if ($verifica) {
      $penfigos = $this->Penfigo->find('all');
      foreach ($penfigos as $key => $pen) {
        $penfigos[$key]['resultado_sintomas'] = $this->get_num_sintomas($idPaciente, $numero, $pen['Penfigo']['id']);
        $penfigos[$key]['resultado_num_ampollas_m'] = $this->get_num_ampollas($idPaciente, $numero, $pen['Penfigo']['id'], 'Mucosas');
        //$penfigos[$key]['resultado_num_ampollas_p'] = $this->get_num_ampollas($idPaciente, $numero, $pen['Penfigo']['id'], 'Piel');
        //$penfigos[$key]['resultado_num_erociones_m'] = $this->get_num_erociones($idPaciente, $numero, $pen['Penfigo']['id'], 'Mucosas');
        //$penfigos[$key]['resultado_num_erociones_p'] = $this->get_num_erociones($idPaciente, $numero, $pen['Penfigo']['id'], 'Piel');

        $diagnostico_t = $penfigos[$key]['resultado_sintomas'] + $penfigos[$key]['resultado_num_ampollas_m'];
        $penfigos[$key]['diagnostico'] = round($diagnostico_t / 2, 2);
      }
    }
    /* debug($penfigos);
      exit; */
    $this->set(compact('penfigos', 'verifica'));
  }

  //verifica datos llenos
  public function verifica_datos_ll($idPaciente = null, $numero = null) {
    $n_sintomas_pac = $this->PacientesPielsintoma->find('count', array(
      'recursive' => -1,
      'conditions' => array(
        'PacientesPielsintoma.paciente_id' => $idPaciente,
        'PacientesPielsintoma.numero' => $numero,
      ),
    ));
    $n_amp_muc_pac = $this->Areaampolla->find('count', array(
      'recursive' => -1,
      'conditions' => array('paciente_id' => $idPaciente, 'numero' => $numero, 'tipo' => 'Mucosas')
    ));
    $n_amp_pie_pac = $this->Areaampolla->find('count', array(
      'recursive' => -1,
      'conditions' => array('paciente_id' => $idPaciente, 'numero' => $numero, 'tipo' => 'Piel')
    ));
    if ($n_sintomas_pac > 0 && $n_amp_muc_pac > 0 && $n_amp_pie_pac > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function diagnostico($idPaciente = null, $numero = null) {
    $this->layout = 'ajax';
    $idPenfigo = $this->get_resultado_ex($idPaciente, $numero);
    if (!empty($idPenfigo)) {
      $penfigo = $this->Penfigo->find('first', array(
        'recursive' => -1,
        'conditions' => array('id' => $idPenfigo),
        'fields' => array('nombre', 'tratamiento'),
      ));
      if (!empty($idPenfigo)) {
        $penfigos['resultado_sintomas'] = $this->get_num_sintomas($idPaciente, $numero, $idPenfigo);
        $penfigos['resultado_num_ampollas_m'] = $this->get_num_ampollas($idPaciente, $numero, $idPenfigo, 'Mucosas');
        $penfigos['resultado_num_ampollas_p'] = $this->get_num_ampollas($idPaciente, $numero, $idPenfigo, 'Piel');
        //$penfigos[$key]['resultado_num_erociones_m'] = $this->get_num_erociones($idPaciente, $numero, $idPenfigo, 'Mucosas');
        //$penfigos[$key]['resultado_num_erociones_p'] = $this->get_num_erociones($idPaciente, $numero, $idPenfigo, 'Piel');

        $diagnostico_t = $penfigos['resultado_sintomas'] + $penfigos['resultado_num_ampollas_m'] + $penfigos['resultado_num_ampollas_p'];
        $penfigos['diagnostico'] = round($diagnostico_t / 3, 2);
      }
      $diagnostico_sin_s = $this->get_sint_sis_p($idPaciente, $numero);
      $diagnostico_amp_m = $this->get_pac_areas($idPaciente, $numero, 'Mucosas');
      $diagnostico_amp_p = $this->get_pac_areas($idPaciente, $numero, 'Piel');
      $diagnostico_sin_p = $this->get_sint_piel($idPaciente, $numero);
      if (!empty($diagnostico_amp_m)) {
        if (!empty($diagnostico_amp_p)) {
          $diagnostico = "$diagnostico_sin_s ademas; $diagnostico_amp_m y $diagnostico_amp_p tambien $diagnostico_sin_p";
        } else {
          $diagnostico = "$diagnostico_sin_s ademas; $diagnostico_amp_m tambien $diagnostico_sin_p";
        }
      } else {
        if (!empty($diagnostico_amp_p)) {
          $diagnostico = "$diagnostico_sin_s ademas; $diagnostico_amp_p tambien $diagnostico_sin_p";
        } else {
          $diagnostico = "$diagnostico_sin_s tambien $diagnostico_sin_p";
        }
      }
    }
    //$diagnostico = $this->get_pac_areas($idPaciente, $numero, 'Mucosas');

    /* debug($penfigo);
      exit; */
    $this->set(compact('penfigos', 'penfigo', 'diagnostico', 'idPenfigo','idPaciente','numero'));
  }

  function get_sint_piel($idPaciente, $numero) {
    $diagnostico = '';
    $sintomas = $this->PacientesPielsintoma->find('all', array(
      'recursive' => 0,
      'conditions' => array('PacientesPielsintoma.paciente_id' => $idPaciente, 'PacientesPielsintoma.numero' => $numero, 'PacientesPielsintoma.estado' => 1),
      'fields' => array('Pielsintoma.nombre'),
    ));
    foreach ($sintomas as $sin) {
      if (!empty($diagnostico)) {
        $diagnostico = "$diagnostico, " . $sin['Pielsintoma']['nombre'];
      } else {
        $diagnostico = $sin['Pielsintoma']['nombre'];
      }
    }
    if (!empty($diagnostico)) {
      return "El paciente presenta $diagnostico en la piel";
    } else {
      return "";
    }
  }

  function get_sint_sis_p($idPaciente, $numero) {
    $diagnostico = '';
    $sintomas = $this->PacientesSintoma->find('all', array(
      'recursive' => 0,
      'conditions' => array('PacientesSintoma.paciente_id' => $idPaciente, 'PacientesSintoma.numero' => $numero, 'PacientesSintoma.estado' => 1),
      'fields' => array('Sintoma.nombre'),
    ));
    foreach ($sintomas as $sin) {
      if (!empty($diagnostico)) {
        $diagnostico = "$diagnostico, " . $sin['Sintoma']['nombre'];
      } else {
        $diagnostico = $sin['Sintoma']['nombre'];
      }
    }
    if (!empty($diagnostico)) {
      return "El paciente presenta sintomas de $diagnostico";
    } else {
      return "";
    }
  }

  function get_pac_areas($idPaciente, $numero, $tipo) {
    $diagnostico_a = "";
    $array = $this->Areaampolla->find('all', [
      'recursive' => 0,
      'conditions' => ['Areaampolla.paciente_id' => $idPaciente, 'Areaampolla.numero' => $numero, 'Areaampolla.estado' => 1, 'Areaampolla.tipo' => $tipo],
      'fields' => ['Area.nombre', 'Areaampolla.id', 'Areaampolla.modified'],
    ]);
    if (!empty($array)) {
      $diagnostico_a = "Se encontro ampollas de $tipo en el area o areas como: ";
      $diagnostico_a_2 = "";
      foreach ($array as $a) {
        if (!empty($diagnostico_a_2)) {
          $cadena = $this->get_pac_tipos_am($a['Areaampolla']['id']);
          $diagnostico_a_2 = "$diagnostico_a_2, " . $a['Area']['nombre'] . " de tipo ($cadena)";
        } else {
          $cadena = $this->get_pac_tipos_am($a['Areaampolla']['id']);
          $diagnostico_a_2 = $a['Area']['nombre'] . " de tipo ($cadena)";
        }
      }
      $diagnostico_a = "$diagnostico_a $diagnostico_a_2";
    }
    return $diagnostico_a;
  }

  function get_pac_tipos_am($idAreaampolla) {
    $tipos = $this->PacientesTipoampolla->find('all', [
      'recursive' => 0,
      'conditions' => ['PacientesTipoampolla.areaampolla_id' => $idAreaampolla, 'PacientesTipoampolla.estado' => 1],
      'fields' => ['Tipoampolla.nombre'],
    ]);
    $cadena = "";
    foreach ($tipos as $ti) {
      $nombre = $ti['Tipoampolla']['nombre'];
      if (!empty($cadena)) {
        $cadena = $cadena . ", " . $nombre;
      } else {
        $cadena = $nombre;
      }
    }
    return $cadena;
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

  public function get_nikolsky($idPaciente = null, $numero = null) {
    $nikolsky = $this->PacientesPielsintoma->find('first', array(
      'recursive' => 0,
      'conditions' => array(
        'Pielsintoma.nombre' => 'Signo de Nikolsky',
        'PacientesPielsintoma.estado' => 1,
        'PacientesPielsintoma.paciente_id' => $idPaciente,
        'PacientesPielsintoma.numero' => $numero,
      ),
      'fields' => array('PacientesPielsintoma.id'),
    ));
    $nro_sint_p = $this->PacientesPielsintoma->find('count', array(
      'recursive' => -1,
      'conditions' => array(
        'PacientesPielsintoma.paciente_id' => $idPaciente,
        'PacientesPielsintoma.numero' => $numero,
      ),
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
      'fields' => 'Penfigosintoma.pielsintoma_id',
    ));
    $sintomas = $this->Penfigosintoma->find('list', array(
      'recursive' => 0,
      'conditions' => array(
        'Penfigosintoma.penfigo_id' => $idPenfigo,
        'OR' => array(
          array('Penfigosintoma.importancia' => NULL),
          array('Penfigosintoma.importancia' => 0),
        ),
      ),
      'fields' => 'Penfigosintoma.pielsintoma_id',
    ));
    $n_sintomas_i = $this->PacientesPielsintoma->find('count', array(
      'recursive' => -1,
      'conditions' => array(
        'PacientesPielsintoma.paciente_id' => $idPaciente,
        'PacientesPielsintoma.pielsintoma_id' => $sintomas_i,
        'PacientesPielsintoma.estado' => 1,
        'PacientesPielsintoma.numero' => $numero,
      ),
    ));
    $n_sintomas = $this->PacientesPielsintoma->find('count', array(
      'recursive' => -1,
      'conditions' => array(
        'PacientesPielsintoma.paciente_id' => $idPaciente,
        'PacientesPielsintoma.pielsintoma_id' => $sintomas,
        'PacientesPielsintoma.estado' => 1,
        'PacientesPielsintoma.numero' => $numero,
      ),
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
      //'Area.tipo' => $tipo,
      ),
      'fields' => array('Penfigoampolla.area_id', 'Penfigoampolla.tipoampolla_id'),
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
        //'Area.tipo' => $tipo,
        'OR' => array(
          array('Penfigoampolla.importancia' => NULL),
          array('Penfigoampolla.importancia' => 0),
        ),
      ),
      'fields' => array('Penfigoampolla.area_id', 'Penfigoampolla.tipoampolla_id'),
    ));

    $array_a = array();
    $array_a['Areaampolla.paciente_id'] = $idPaciente;
    $array_a['Areaampolla.numero'] = $numero;
    $array_a['PacientesTipoampolla.estado'] = 1;
    $array_a_aux = array();
    foreach ($ampollas as $key => $am) {
      $array_a_aux[$key]['Areaampolla.area_id'] = $am['Penfigoampolla']['area_id'];
      $array_a_aux[$key]['PacientesTipoampolla.tipoampolla_id'] = $am['Penfigoampolla']['tipoampolla_id'];
    }
    $array_a['OR'] = $array_a_aux;

    if (!empty($array_a_i)) {
      $n_ampolla_i = $this->PacientesTipoampolla->find('count', array(
        'recursive' => 0,
        'conditions' => $array_a_i,
      ));
    } else {
      $n_ampolla_i = 0;
    }

    if (!empty($ampollas)) {
      $n_ampolla = $this->PacientesTipoampolla->find('count', array(
        'recursive' => 0,
        'conditions' => $array_a,
      ));
    } else {
      $n_ampolla = 0;
    }
    /* debug("Ampollas de penfigo inmportantes " . count($ampollas_i));
      debug("Ampollas de penfigo " . count($ampollas));
      debug("ampollas de paciente $n_ampolla");
      debug("ampollas de paciente importante $n_ampolla_i");
      debug("---------"); */
    //exit;
    if (count($ampollas_i) <= count($ampollas) && count($ampollas_i) > 0) {
      if (count($ampollas_i) > 0) {
        $total_i = $n_ampolla_i / count($ampollas_i) * 51;
      } else {
        $total_i = 0;
      }
      if (count($ampollas) > 0) {
        $total_n = $n_ampolla / count($ampollas) * 49;
      } else {
        $total_n = 0;
      }
      $total = $total_i + $total_n;
    } else {
      $sintomas_t = count($ampollas_i) + count($ampollas);
      if ($sintomas_t > 0) {
        $total = (($n_ampolla_i + $n_ampolla) / $sintomas_t) * 100;
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
        'Area.tipo' => $tipo,
      ),
      'fields' => array('Penfigoerocione.area_id', 'Penfigoerocione.tipoerocione_id'),
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
          array('Penfigoerocione.importancia' => 0),
        ),
      ),
      'fields' => array('Penfigoerocione.area_id', 'Penfigoerocione.tipoerocione_id'),
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
        'conditions' => $array_a_i,
      ));
    } else {
      $n_erocion_i = 0;
    }

    if (!empty($array_a)) {
      $n_erocion = $this->PacientesTipoerocione->find('count', array(
        'recursive' => 0,
        'conditions' => $array_a,
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
        $total = (($n_erocion_i + $n_erocion) / $sintomas_t) * 100;
      } else {
        $total = 100;
      }
    }
    return $total;
  }

}
