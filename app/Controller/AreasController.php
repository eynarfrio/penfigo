<?php

class AreasController extends AppController {

    public $uses = array('Area');

    public function index() {
        $areas = $this->Area->find('all');
        $this->set(compact('areas'));
    }

    public function area($idArea = null) {
        $this->layout = 'ajax';
        if (!empty($this->request->data)) {
            //debug($this->request->data);
            //exit;
            App::uses('String', 'Utility');
            $archivo = $this->request->data['Area']['dimagen'];
            if (!empty($this->request->data['Area']['dimagen']['name'])) {
                if ($archivo['error'] === UPLOAD_ERR_OK) {
                    if ($archivo['type'] == 'image/jpeg') {
                        $nombre = String::uuid();
                        if (move_uploaded_file($archivo['tmp_name'], WWW_ROOT . 'imagenes' . DS . $nombre . '.jpg')) {
                            $nombre_imagen = $nombre . '.jpg';

                            $this->Area->create();
                            $this->request->data['Area']['imagen'] = $nombre_imagen;
                            $this->Area->save($this->request->data['Area']);
                            if (!empty($this->request->data['Area']['id'])) {
                                $idArea = $this->request->data['Area']['id'];
                            } else {
                                $idArea = $this->Area->getLastInsertID();
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
                $this->Area->create();
                $this->Area->save($this->request->data['Area']);
                if (!empty($this->request->data['Area']['id'])) {
                    $idArea = $this->request->data['Area']['id'];
                } else {
                    $idArea = $this->Area->getLastInsertID();
                }
                $this->Session->setFlash('Se registro correctamente!!!', 'msgbueno');
                $this->redirect(['action' => 'index']);
            }
        }
        $this->Area->id = $idArea;
        $this->request->data = $this->Area->read();
    }

    public function delete($id = null) {
        $this->Area->id = $id;
        if (!$this->Area->exists()) {
            $this->Session->setFlash('No existe.', 'msgerror');
        }
        if ($this->Area->delete()) {
            $this->Session->setFlash('se elimino correctamente.', 'msgbueno');
        } else {
            $this->Session->setFlash('no se pudo eliminar.', 'msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }

}
