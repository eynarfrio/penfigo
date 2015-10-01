<?php

App::uses('AppController', 'Controller');

class PacientesController extends AppController {

    public $layout = 'penfigo';
    public $uses = [
        'Paciente',
        'PacientesMedico',
        'Medico', 'Lugare',
        'PacientesSintoma',
        'Areaampolla',
        'PacientesTipoampolla',
        'PacientesTipoerocione',
        'PacientesPielsintoma',
        'PacientesSigno'
    ];

    public function mispacientes() {
        $idMedico = $this->get_id_medico();
        $list_pac = $this->PacientesMedico->find('list', array(
            'fields' => array('PacientesMedico.paciente_id', 'PacientesMedico.paciente_id'),
            'conditions' => array('PacientesMedico.medico_id' => $idMedico),
            'group' => 'paciente_id'
        ));
        $pacientes = $this->Paciente->find('all', array(
            'recursive' => -1,
            'conditions' => array('id' => $list_pac)
        ));
        $this->set(compact('pacientes'));
    }

    public function pacientes() {
        $pacientes = $this->PacientesMedico->find('all', [
            'recursive' => 0,
            'order' => ['Paciente.modified DESC']
        ]);
        $this->set(compact('pacientes'));
    }

    public function paciente($idPaciente = null) {
        if (!empty($this->request->data)) {
            /* debug($this->request->data);
              exit; */
            App::uses('String', 'Utility');
            $dato = $this->request->data;
            $archivo = $this->request->data['Paciente']['dimagen'];
            if (!empty($this->request->data['Paciente']['dimagen']['name'])) {
                if ($archivo['error'] === UPLOAD_ERR_OK) {
                    if ($archivo['type'] == 'image/jpeg') {
                        $nombre = String::uuid();
                        if (move_uploaded_file($archivo['tmp_name'], WWW_ROOT . 'imagenes' . DS . $nombre . '.jpg')) {
                            $nombre_imagen = $nombre . '.jpg';

                            $this->Paciente->create();
                            $this->request->data['Paciente']['imagen'] = $nombre_imagen;
                            $this->Paciente->save($this->request->data['Paciente']);
                            if (!empty($this->request->data['Paciente']['id'])) {
                                $idPaciente = $this->request->data['Paciente']['id'];
                            } else {
                                $idPaciente = $this->Paciente->getLastInsertID();
                            }
                            $this->Session->setFlash('Se registro correctamente', 'msgbueno');
                            $this->redirect(array('action' => 'index'));
                        }
                    } else {
                        $this->Session->setFlash("La imagen debe de ser formato jpeg o jpg", 'msgerror');
                        $this->redirect($this->referer());
                    }
                } else {
                    $this->Session->setFlash("Ocurrio un error intente nuevamente", 'msgerror');
                    $this->redirect($this->referer());
                }
            } else {
                $this->Paciente->create();
                $this->Paciente->save($dato['Paciente']);
                if (empty($dato['Paciente']['id'])) {
                    //debug($dato['Paciente']['id']);exit;
                    $idPaciente = $this->Paciente->getLastInsertID();
                    $this->genera_med_pac($idPaciente);
                } else {
                    $idPaciente = $dato['Paciente']['id'];
                }
                $this->Session->setFlash('Se registro correctamente el paciente!!!', 'msgbueno');
                $this->redirect(['action' => 'datos', $idPaciente]);
            }
        }
        $this->Paciente->id = $idPaciente;
        $this->request->data = $this->Paciente->read();
        /* debug($this->request->data);
          exit; */
         $pacientes = $this->Paciente->find('first', [
            'recursive' => 0,
            'order' => ['Paciente.imagen']
        ]);
        $lugares = $this->Lugare->find('list', ['fields' => ['nombre', 'nombre']]);
        $this->set(compact('lugares','pacientes'));
        
    }

    public function genera_med_pac($idPaciente = null) {
        $this->PacientesMedico->create();
        $dat_pac['paciente_id'] = $idPaciente;
        $dat_pac['medico_id'] = $this->get_id_medico();
        $this->PacientesMedico->save($dat_pac);
    }

    public function get_medico() {
        return $this->Medico->findByuser_id($this->Session->read('Auth.User.id'));
    }

    public function get_id_medico() {
        $medico = $this->get_medico();
        return $medico['Medico']['id'];
    }

    public function datos($idPaciente = null) {
        $paciente = $this->Paciente->findByid($idPaciente);
        $sintomas = $this->PacientesSintoma->find('all', [
            'recursive' => 0,
            'conditions' => ['PacientesSintoma.paciente_id' => $idPaciente]
        ]);
        $sintomas_amp = $this->PacientesSintoma->find('all', [
            'recursive' => -1,
            'conditions' => ['PacientesSintoma.paciente_id' => $idPaciente],
            'group' => 'PacientesSintoma.numero',
            'fields' => array('PacientesSintoma.numero')
        ]);
        $array_samp = [];
        $iamp = 0;
        foreach ($sintomas_amp as $sp) {
            $preg_amp = $this->PacientesSintoma->find('first', [
                'recursive' => 0,
                'conditions' => [
                    'Sintoma.nombre' => 'Ampollas',
                    'PacientesSintoma.estado' => 1,
                    'PacientesSintoma.paciente_id' => $idPaciente,
                    'PacientesSintoma.numero' => $sp['PacientesSintoma']['numero']
                ],
                'fields' => 'PacientesSintoma.id'
            ]);
            $iamp++;
            if (!empty($preg_amp)) {
                $array_samp[$iamp]['estado'] = TRUE;
                $array_samp[$iamp]['areas_mu'] = $this->get_pac_areas($idPaciente, $sp['PacientesSintoma']['numero'], 'Mucosas');
                $array_samp[$iamp]['areas_pi'] = $this->get_pac_areas($idPaciente, $sp['PacientesSintoma']['numero'], 'Piel');
            } else {
                $array_samp[$iamp]['estado'] = FALSE;
            }
            $array_samp[$iamp]['numero'] = $sp['PacientesSintoma']['numero'];
        }
        /* debug($array_samp);
          exit; */
        $p_signos = $this->PacientesSigno->find('all', array(
            'recursive' => 0,
            'conditions' => array('PacientesSigno.paciente_id' => $idPaciente),
            'fields' => array('Signo.nombre', 'PacientesSigno.valor', 'PacientesSigno.id', 'PacientesSigno.modified', 'PacientesSigno.numero'),
            'order' => array('PacientesSigno.numero')
        ));
        $num_signo = NULL;
        if (!empty($p_signos)) {
            $num_signo = end($p_signos)['PacientesSigno']['numero'];
        }
        $this->set(compact('paciente', 'sintomas', 'idPaciente', 'array_samp', 'num_signo', 'p_signos'));
    }

    function get_pac_areas($idPaciente, $numero, $tipo) {
        $array = $this->Areaampolla->find('all', [
            'recursive' => 0,
            'conditions' => ['Areaampolla.paciente_id' => $idPaciente, 'Areaampolla.numero' => $numero, 'Areaampolla.estado' => 1, 'Areaampolla.tipo' => $tipo],
            'fields' => ['Area.nombre', 'Areaampolla.id', 'Areaampolla.modified']
        ]);
        if (!empty($array)) {
            foreach ($array as $key => $a) {
                $array[$key]['Areaampolla']['tipos'] = $this->get_pac_tipos_am($a['Areaampolla']['id']);
            }
        }
        return $array;
    }

    function get_pac_tipos_am($idAreaampolla) {
        $tipos = $this->PacientesTipoampolla->find('all', [
            'recursive' => 0,
            'conditions' => ['PacientesTipoampolla.areaampolla_id' => $idAreaampolla, 'PacientesTipoampolla.estado' => 1],
            'fields' => ['Tipoampolla.nombre']
        ]);
        $cadena = "";
        foreach ($tipos as $ti) {
            $nombre = $ti['Tipoampolla']['nombre'];
            /* if ($ti['Tipoampolla']['nombre'] == 'Erosiones') {
              $nombre = $ti['Tipoampolla']['nombre'] . ' ' . $this->get_pac_tipos_er($idAreaampolla);
              } */
            if (!empty($cadena)) {
                $cadena = $cadena . ", " . $nombre;
            } else {
                $cadena = $nombre;
            }
        }
        return $cadena;
    }

    public function get_pac_tipos_er($idAreaampolla) {
        $tipos = $this->PacientesTipoerocione->find('all', [
            'recursive' => 0,
            'conditions' => ['PacientesTipoerocione.areaampolla_id' => $idAreaampolla, 'PacientesTipoerocione.estado' => 1],
            'fields' => ['Tipoerocione.nombre']
        ]);
        $cadena = "";
        foreach ($tipos as $ti) {
            if (!empty($cadena)) {
                $cadena = $cadena . ", " . $ti['Tipoerocione']['nombre'];
            } else {
                $cadena = '(' . $ti['Tipoerocione']['nombre'];
            }
        }
        if (!empty($cadena)) {
            $cadena = $cadena . ')';
        }
        return $cadena;
    }

    function calculaedad($fechanacimiento) {
        list($ano, $mes, $dia) = explode("-", $fechanacimiento);
        $ano_diferencia = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia = date("d") - $dia;
        if ($dia_diferencia < 0 || $mes_diferencia < 0)
            $ano_diferencia--;
        return $ano_diferencia;
    }

    function get_sintomaspiel($idPaciente = null, $numero = null) {
        $sintomas = $this->PacientesPielsintoma->find('all', [
            'recursive' => 0,
            'conditions' => [
                'PacientesPielsintoma.paciente_id' => $idPaciente,
                'PacientesPielsintoma.numero' => $numero
            ],
            'fields' => ['PacientesPielsintoma.*', 'Pielsintoma.*']
        ]);
        return $sintomas;
    }

}
