<?php

class TipoampollasController extends AppController {

  public $uses = array('Tipoampolla');

  public function index() {
    $tampollas = $this->Tipoampolla->find('all');
    $this->set(compact('tampollas'));
  }

  public function tipoampolla($idAmpolla = null) {
    $this->layout = 'ajax';
    if (!empty($this->request->data)) {
      /* debug($this->request->data);
        exit; */
      App::uses('String', 'Utility');
      $archivo = $this->request->data['Tipoampolla']['dimagen'];
      if (!empty($this->request->data['Tipoampolla']['dimagen']['name'])) {
        if ($archivo['error'] === UPLOAD_ERR_OK) {
          if ($archivo['type'] == 'image/jpeg') {
            $nombre = String::uuid();
            if (move_uploaded_file($archivo['tmp_name'], WWW_ROOT . 'imagenes' . DS . $nombre . '.jpg')) {
              $nombre_imagen = $nombre . '.jpg';

              $this->Tipoampolla->create();
              $this->request->data['Tipoampolla']['imagen'] = $nombre_imagen;
              $this->Tipoampolla->save($this->request->data['Tipoampolla']);
              if (!empty($this->request->data['Tipoampolla']['id'])) {
                $idAmpolla = $this->request->data['Tipoampolla']['id'];
              } else {
                $idAmpolla = $this->Tipoampolla->getLastInsertID();
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
        $this->Tipoampolla->create();
        $this->Tipoampolla->save($this->request->data['Tipoampolla']);
        if (!empty($this->request->data['Tipoampolla']['id'])) {
          $idAmpolla = $this->request->data['Tipoampolla']['id'];
        } else {
          $idAmpolla = $this->Tipoampolla->getLastInsertID();
        }
        $this->Session->setFlash('Se registro correctamente', 'msgbueno');
        $this->redirect(array('action' => 'index'));
      }
    }
    $this->Tipoampolla->id = $idAmpolla;
    $this->request->data = $this->Tipoampolla->read();
  }

  public function delete($id = null) {
    $this->Tipoampolla->id = $id;
    if (!$this->Tipoampolla->exists()) {
      $this->Session->setFlash('No existe.', 'msgerror');
    }
    if ($this->Tipoampolla->delete()) {
      $this->Session->setFlash('se elimino correctamente.', 'msgbueno');
    } else {
      $this->Session->setFlash('no se pudo eliminar.', 'msgerror');
    }
    $this->redirect(array('action' => 'index'));
  }

}
