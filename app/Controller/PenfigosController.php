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
    $penfigos = $this->Penfigo->find('all');
    foreach ($penfigos as $key => $pen) {
      $penfigos[$key]['resultado'] = $this->get_num_sintomas($idPaciente, $numero, $pen['Penfigo']['id']);
    }
    debug($penfigos);exit;
  }

  public function get_num_sintomas($idPaciente = null, $numero = null, $idPenfigo = null) {
    $sintomas_i = $this->Penfigosintoma->find('list', array(
      'recursive' => 0,
      'conditions' => array('Penfigosintoma.penfigo_id' => $idPenfigo, 'Penfigosintoma.importancia' => 1),
      'fields' => 'Penfigosintoma.pielsintoma_id'
    ));
    $sintomas = $this->Penfigosintoma->find('list', array(
      'recursive' => 0,
      'conditions' => array('Penfigosintoma.penfigo_id' => $idPenfigo),
       'or' => array('Penfigosintoma.importancia' => null),
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
    debug($sintomas);
    debug($sintomas_i);
    debug($n_sintomas);
    debug($n_sintomas_i);
    exit;
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
