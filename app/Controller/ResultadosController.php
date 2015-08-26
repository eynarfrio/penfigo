<?php

App::uses('AppController', 'Controller');

class ResultadosController extends AppController {

  public $layout = 'penfigo';
  public $uses = array('Resultado', 'Examene', 'PacientesResultado');

  public function get_res_pac($idPaciente = null, $numero = null, $idExamene = null) {
    $resultado = $this->PacientesResultado->find('first', array(
      'recursive' => 0,
      'conditions' => array('PacientesResultado.paciente_id' => $idPaciente, 'PacientesResultado.numero' => $numero, 'PacientesResultado.examene_id' => $idExamene),
      'fields' => array('Resultado.*', 'PacientesResultado.*')
    ));
    return $resultado;
  }
  
  public function pac_examen($idPaciente = null, $numero = null, $idExamen = null,$id = null){
    $this->layout = 'ajax';
    $resultados = $this->Resultado->find('list',array(
      'conditions' => array('Resultado.examene_id' => $idExamen),
      'fields' => array('id','descripcion')
    ));
    $examen = $this->Examene->findByid($idExamen,null,null,-1);
    $this->PacientesResultado->id = $id;
    $this->request->data = $this->PacientesResultado->read();
    $this->set(compact('resultados','idPaciente','numero','examen','idExamen'));
  }
  
  public function regis_res_pac(){
    $this->PacientesResultado->create();
    $this->PacientesResultado->save($this->request->data['PacientesResultado']);
    $this->Session->setFlash("Se registro correctamente!!",'msgbueno');
    $this->redirect($this->referer());
  }
  
  public function get_res_pen($idResultado = null){
    $resultado = $this->Resultado->find('first',array(
      'recursive' => 0,
      'conditions' => array('Resultado.id' => $idResultado),
      'fields' => array('Penfigo.nombre')
    ));
    return $resultado['Penfigo']['nombre'];
  }

}
