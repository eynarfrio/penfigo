<?php

App::uses('AppController', 'Controller');

class SignosController extends AppController {

    public $layout = 'penfigo';
    public $uses = array('Signo', 'PacientesSigno');

    public function index() {
        $signos = $this->Signo->find('all');
        $this->set(compact('signos'));
    }

    public function signo($idSigno = null) {
        $this->layout = 'ajax';
        if (!empty($this->request->data)) {
            //debug($this->request->data);
            //exit;
            $this->Signo->create();
            $this->Signo->save($this->request->data['Signo']);
            if (!empty($this->request->data['Signo']['id'])) {
                $idSigno = $this->request->data['Signo']['id'];
            } else {
                $idSigno = $this->Signo->getLastInsertID();
            }
            $this->Session->setFlash('Se registro correctamente!!!', 'msgbueno');
            $this->redirect(['action' => 'index']);
        }
        $this->Signo->id = $idSigno;
        $this->request->data = $this->Signo->read();
    }

    public function ajax_signos($idPaciente = null, $numero = null) {
        $this->layout = 'ajax';
        if (!empty($numero)) {
            $signos = $this->PacientesSigno->find('all', [
                'recursive' => 0,
                'conditions' => ['PacientesSigno.paciente_id' => $idPaciente, 'PacientesSigno.numero' => $numero],
                'fields' => ['PacientesSigno.*', 'Signo.*']
            ]);
            foreach ($signos as $key => $sin) {
                $this->request->data['PacientesSigno'][$key] = $sin['PacientesSigno'];
            }
        } else {
            $signos = $this->Signo->find('all', ['recursive' => -1]);
        }
        $this->set(compact('signos', 'idPaciente', 'numero'));
    }

    public function get_ult_num($idPaciente = null) {
        $sintoma_n = $this->PacientesSigno->find('first', [
            'conditions' => ['PacientesSigno.paciente_id' => $idPaciente]
            , 'order' => 'PacientesSigno.id DESC'
            , 'fields' => ['PacientesSigno.numero']
        ]);
        if (!empty($sintoma_n)) {
            return $sintoma_n['PacientesSigno']['numero'];
        } else {
            return NULL;
        }
    }

    public function regis_sig_pac($idPaciente = null, $numero = null) {
        if (!empty($this->request->data['PacientesSigno'])) {
            if (empty($numero)) {
                $numero = $this->genera_numero();
            }
            foreach ($this->request->data['PacientesSigno'] as $pa) {
                $datos = $pa;
                $this->PacientesSigno->create();
                $datos['numero'] = $numero;
                $this->PacientesSigno->save($datos);
            }
            $this->Session->setFlash("Se registro correctamente!!", 'msgbueno');
            $this->redirect(['controller' => 'Pacientes', 'action' => 'datos', $idPaciente]);
        }
    }

    public function genera_numero() {
        $sin_t = $this->PacientesSigno->find('first', [
            'order' => 'PacientesSigno.id DESC',
            'fields' => ['PacientesSigno.numero']
        ]);
        if (!empty($sin_t)) {
            return $sin_t['PacientesSigno']['numero'] + 1;
        } else {
            return 1;
        }
    }

    public function delete($id = null) {
        $this->Signo->id = $id;
        if (!$this->Signo->exists()) {
            $this->Session->setFlash('No existe.', 'msgerror');
        }
        if ($this->Signo->delete()) {
            $this->Session->setFlash('se elimino correctamente.', 'msgbueno');
        } else {
            $this->Session->setFlash('no se pudo eliminar.', 'msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }

}
