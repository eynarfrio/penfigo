<?php

class PielsintomasController extends AppController {

    public $layout = 'penfigo';
    public $uses = array('Pielsintoma');

    public function index() {
        $psintomas = $this->Pielsintoma->find('all');
        $this->set(compact('psintomas'));
    }

    public function pielsintoma($idPiel = null) {
        $this->layout = 'ajax';
        if (!empty($this->request->data)) {
            // debug($this->request->data);
            //exit;
            App::uses('String', 'Utility');
            $archivo = $this->request->data['Pielsintoma']['dimagen'];
            if (!empty($this->request->data['Pielsintoma']['dimagen']['name'])) {
                if ($archivo['error'] === UPLOAD_ERR_OK) {
                    if ($archivo['type'] == 'image/jpeg') {
                        $nombre = String::uuid();
                        if (move_uploaded_file($archivo['tmp_name'], WWW_ROOT . 'imagenes' . DS . $nombre . '.jpg')) {
                            $nombre_imagen = $nombre . '.jpg';

                            $this->Pielsintoma->create();
                            $this->request->data['Pielsintoma']['imagen'] = $nombre_imagen;
                            $this->Pielsintoma->save($this->request->data['Pielsintoma']);
                            if (!empty($this->request->data['Pielsintoma']['id'])) {
                                $idErocion = $this->request->data['Pielsintoma']['id'];
                            } else {
                                $idErocion = $this->Pielsintoma->getLastInsertID();
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
                $this->Pielsintoma->create();
                $this->Pielsintoma->save($this->request->data['Pielsintoma']);
                if (!empty($this->request->data['Pielsintoma']['id'])) {
                    $idPiel = $this->request->data['Pielsintoma']['id'];
                } else {
                    $idPiel = $this->Pielsintoma->getLastInsertID();
                }
                $this->Session->setFlash('Se registro correctamente', 'msgbueno');
                $this->redirect(array('action' => 'index'));
            }
        }
        $this->Pielsintoma->id = $idPiel;
        $this->request->data = $this->Pielsintoma->read();
        $psintomas = $this->Pielsintoma->find('list', ['fields' => ['nombre', 'nombre']]);
        $this->set(compact('psintomas'));
    }

    public function delete($id = null) {
        $this->Pielsintoma->id = $id;
        if ($this->Pielsintoma->exists()) {
            $this->Session->setFlash('NO EXISTE', 'msgerror');
        }
        if ($this->Pielsintoma->delete()) {
            $this->Session->setFlash('Se elimino correctamente', 'msgbueno');
        } else {
            $this->Session->setFlash('No se pudo eliminar', 'msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }

}
