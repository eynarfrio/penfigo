<?php

App::uses('AppController', 'Controller');

class SintomasController extends AppController {

  public $layout = 'penfigo';
  public $uses = array('Medico', 'Paciente', 'Sintoma', 'PacientesSintoma', 'Pielsintoma', 'PacientesPielsintoma');

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
        'fields' => ['PacientesSintoma.*', 'Sintoma.*']
      ]);
      foreach ($sintomas as $key => $sin) {
        $this->request->data['PacientesSintoma'][$key] = $sin['PacientesSintoma'];
      }
    } else {
      $sintomas = $this->Sintoma->find('all', ['recursive' => -1]);
    }
    $this->set(compact('sintomas', 'idPaciente', 'numero'));
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

  public function regis_sin_pac($idPaciente = null, $numero = null) {
    if (!empty($this->request->data['PacientesSintoma'])) {
      if (empty($numero)) {
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

  public function elimina_sin($idPaciente = null, $numero = null) {
    $this->PacientesSintoma->deleteAll(['PacientesSintoma.paciente_id' => $idPaciente, 'PacientesSintoma.numero' => $numero]);
    $this->Session->setFlash('Se elimino correctamente los sintomas!!', 'msgbueno');
    $this->redirect($this->referer());
  }

  public function sintomas_piel($idPaciente = null, $numero = null) {
    $sintomas = $this->PacientesPielsintoma->find('all', [
      'recursive' => 0,
      'conditions' => ['PacientesPielsintoma.paciente_id' => $idPaciente, 'PacientesPielsintoma.numero' => $numero],
      'fields' => ['Pielsintoma.*', 'PacientesPielsintoma.*']
    ]);
    if (empty($sintomas)) {
      $sintomas = $this->Pielsintoma->find('all');
    }
    $idMedico = $this->get_id_medico();
    $this->set(compact('idPaciente', 'sintomas', 'numero', 'idMedico'));
  }

  public function regis_sin_piel($idPaciente = null) {
    if (!empty($this->request->data['PacientesPielsintoma'])) {
      foreach ($this->request->data['PacientesPielsintoma'] as $pa) {
        $datos = $pa;
        $this->PacientesPielsintoma->create();
        $this->PacientesPielsintoma->save($datos);
      }
      $this->Session->setFlash("Se registro correctamente!!", 'msgbueno');
      $this->redirect(['controller' => 'Pacientes', 'action' => 'datos', $idPaciente]);
    }
  }

  public function get_medico() {
    return $this->Medico->findByuser_id($this->Session->read('Auth.User.id'));
  }

  public function get_id_medico() {
    $medico = $this->get_medico();
    return $medico['Medico']['id'];
  }

  public function ajax_img_pisin($idPielsintoma = null) {
    $this->layout = 'ajax';
    $pielsintoma = $this->Pielsintoma->findByid($idPielsintoma, null, null, -1);
    $this->set(compact('pielsintoma'));
  }

  public function ajax_inf_pisin($idPielsintoma = null) {
    $this->layout = 'ajax';
    $pielsintoma = $this->Pielsintoma->findByid($idPielsintoma, null, null, -1);
    $this->set(compact('pielsintoma'));
  }

  public function sintoma($idSintoma = null) {
    $this->layout = 'ajax';
    $this->Sintoma->id = $idSintoma;
    $this->request->data = $this->Sintoma->read();
  }

  public function registra_sintoma() {
    $this->Sintoma->create();
    $this->Sintoma->save($this->request->data['Sintoma']);
    $this->Session->setFlash("Se registro correctamente!!", 'msgbueno');
    $this->redirect(array('action' => 'lista'));
  }

  public function lista() {
    $sintomas = $this->Sintoma->find('all', array(
      'recursive' => -1
    ));
    $this->set(compact('sintomas'));
  }

  public function eliminar($idSintoma = null) {
    $this->Sintoma->delete($idSintoma);
    $this->Session->setFlash("Se elimino correctamente el sintoma!!", 'msgbueno');
    $this->redirect(array('action' => 'lista'));
  }

  public function get_ult_ampollas($idPaciente = null) {
    $estado = $this->PacientesSintoma->find('first', array(
      'recursive' => 0,
      'conditions' => array('PacientesSintoma.paciente_id' => $idPaciente, 'Sintoma.nombre LIKE' => 'Ampollas'),
      'fields' => array('PacientesSintoma.estado'),
      'order' => array('PacientesSintoma.numero DESC')
    ));
    if (!empty($estado)) {
      return $estado['PacientesSintoma']['estado'];
    } else {
      return 0;
    }
  }

  public function guarda_ult_ampollas($idPaciente = null, $estado = NULL) {
    $numero = $this->get_ult_num($idPaciente);
    if (empty($numero)) {
      $sintomas = $this->Sintoma->find('all', array('recursive' => -1, 'fields' => array('id', 'nombre')));
      $n_numero = $this->genera_numero();
      foreach ($sintomas as $sin) {
        $datos['numero'] = $n_numero;
        $datos['paciente_id'] = $idPaciente;
        $datos['sintoma_id'] = $sin['Sintoma']['id'];
        if ($sin['Sintoma']['nombre'] == 'Ampollas') {
          $datos['estado'] = $estado;
        } else {
          $datos['estado'] = 0;
        }
        $this->PacientesSintoma->create();
        $this->PacientesSintoma->save($datos);
      }
    } else {
      $pac_sin = $this->PacientesSintoma->find('first', array(
        'recursive' => 0,
        'conditions' => array('PacientesSintoma.numero' => $numero, 'PacientesSintoma.paciente_id' => $idPaciente, 'Sintoma.nombre LIKE' => 'Ampollas'),
        'fields' => array('PacientesSintoma.id')
      ));
      if (!empty($pac_sin)) {
        $this->PacientesSintoma->id = $pac_sin['PacientesSintoma']['id'];
        $datos['estado'] = $estado;
        $this->PacientesSintoma->save($datos);
      }
    }
    $this->Session->setFlash("Se registro correctamente!!!",'msgbueno');
    $this->redirect(array('controller' => 'Pacientes','action'=>'datos', $idPaciente));
  }

}
