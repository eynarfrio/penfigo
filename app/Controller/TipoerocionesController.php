<?php

class TipoerocionesController extends AppController {

    public $layout = 'penfigo';
    public $uses = array('Tipoerocione');

    public function index() {
        $terociones = $this->Tipoerocione->find('all');
        $this->set(compact('terociones'));
    }

    public function tipoerocion($idErocion = null) {
        $this->layout = 'ajax';
        if (!empty($this->request->data)) {
            // debug($this->request->data);
            //exit;
            App::uses('String', 'Utility');
            $archivo = $this->request->data['Tipoerocione']['dimagen'];
            if (!empty($this->request->data['Tipoerocione']['dimagen']['name'])) {
                if ($archivo['error'] === UPLOAD_ERR_OK) {
                    if ($archivo['type'] == 'image/jpeg') {
                        $nombre = String::uuid();
                        if (move_uploaded_file($archivo['tmp_name'], WWW_ROOT . 'imagenes' . DS . $nombre . '.jpg')) {
                            $nombre_imagen = $nombre . '.jpg';

                            $this->Tipoerocione->create();
                            $this->request->data['Tipoerocione']['imagen'] = $nombre_imagen;
                            $this->Tipoerocione->save($this->request->data['Tipoerocione']);
                            if (!empty($this->request->data['Tipoerocione']['id'])) {
                                $idErocion = $this->request->data['Tipoerocione']['id'];
                            } else {
                                $idErocion = $this->Tipoerocione->getLastInsertID();
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
                $this->Tipoerocione->create();
                $this->Tipoerocione->save($this->request->data['Tipoerocione']);
                if (!empty($this->request->data['Tipoerocione']['id'])) {
                    $idErocion = $this->request->data['Tipoerocione']['id'];
                } else {
                    $idErocion = $this->Tipoerocione->getLastInsertID();
                    $this->Session->setFlash(' Registro realizado correctamente','msgbueno');
                    $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash('Se registro correctamente', 'msgbueno');
                $this->redirect(array('action' => 'index'));
            }
        }
        $this->Tipoerocione->id = $idErocion;
        $this->request->data = $this->Tipoerocione->read();
    }

    public function delete($id = null) {
        $this->Tipoerocione->id = $id;
        if (!$this->Tipoerocione->exists()) {
            $this->Session->setFlash('No existe.', 'msgerror');
        }
        if ($this->Tipoerocione->delete()) {
            $this->Session->setFlash('se elimino correctamente.', 'msgbueno');
        } else {
            $this->Session->setFlash('no se pudo eliminar.', 'msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }

}
