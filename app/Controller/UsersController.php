<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

  public $uses = array('User', 'Medico', 'Lugare');

  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('registro_medico');
  }

  public function index() {
    $usuarios = $this->User->find('all',array('conditions' => array('User.role' => 'Administrador')));
    $this->set(compact('usuarios'));
  }

  public function usuario($idusuario = null) {
    $this->layout = 'ajax';
    $this->User->id = $idusuario;
    $this->request->data = $this->User->read();
  }

  public function guardarusuario() {
    $valida = $this->validar('User');
    if (empty($valida)) {
      $this->User->create();
      if (!empty($this->request->data['User']['password2'])) {
        $this->request->data['User']['password'] = $this->request->data['User']['password2'];
      }
      $this->User->save($this->request->data['User']);
      $this->Session->setFlash('Se registro correctamente', 'msgbueno');
    } else {
      $this->Session->setFlash($valida, 'msgerror');
    }
    $this->redirect(array('action' => 'index'));
  }

  public function delete($id = null) {
    $this->User->id = $id;
    if (!$this->User->exists()) {
      $this->Session->setFlash('No existe el usuario.', 'msgerror');
    }
    if ($this->User->delete()) {
      $this->Session->setFlash('se elimino correctamente el usuario.', 'msgbueno');
    } else {
      $this->Session->setFlash('no se pudo eliminar el usuario.', 'msgerror');
    }
    $this->redirect(array('action' => 'index'));
  }

  public function login() {
    $this->layout = 'login';
    if ($this->request->is('post')) {
      if ($this->Auth->login()) {
        $role = $this->Session->read('Auth.User.role');
        switch ($role) {
          case 'Medico General':
            $this->redirect(array('controller' => 'Medicos', 'action' => 'informacion'));
          case 'Dermatologo':
            $this->redirect(array('controller' => 'Medicos', 'action' => 'informacion'));
          default:
            break;
        }
      } else {
        $this->Session->setFlash('Usuario o password incorrectos intente de nuevo.', 'msgerror');
      }
    } else {
      //$this->Session->setFlash('Porfavor Ingrese su ususario y su password','msginfo');
    }
  }

  public function salir() {
    $this->redirect($this->Auth->logout());
    $this->redirect(array('action' => 'login'));
  }

  public function medicos() {
    $medicos = $this->Medico->find('all', [
      'recursive' => 0
    ]);
    $this->set(compact('medicos'));
  }

  public function registro_medico() {
    $this->layout = 'registro';
    if (!empty($this->request->data)) {
      $datos = $this->request->data;
      $datos['User']['username'] = $datos['Medico']['ci'];
      $datos['User']['password'] = $datos['User']['password2'];
      $datos['User']['role'] = $datos['Medico']['tipo_medico'];
      $this->User->create();
      $this->User->save($datos['User']);
      $idUser = $this->User->getLastInsertID();
      $datos['Medico']['user_id'] = $idUser;
      $this->Medico->create();
      $this->Medico->save($datos['Medico']);

      $this->request->data = $datos;
      if ($this->Auth->login()) {
        $this->Session->setFlash("El registro se realizo correctamente!!", 'msgbueno');
        $this->redirect(['controller' => 'Medicos', 'action' => 'informacion']);
      }
    }
    $lugares = $this->Lugare->find('list', ['fields' => ['nombre', 'nombre']]);
    $this->set(compact('lugares'));
  }
  
  public function user($idUser = null){
    $this->layout = 'ajax';
    $this->User->id = $idUser;
    $this->request->data = $this->User->read();
  }

  public function registra_usuario() {
    $duser = $this->request->data['User'];
    if (!empty($duser['password_2'])) {
      $duser['password'] = $duser['password_2'];
    }
    $this->User->create();
    if ($this->User->save($duser)) {
      $this->Session->setFlash("Se registro correctamente el usuario!!", 'msgbueno');
    } else {
      $this->Session->setFlash("No se pudo registrar al usuario", 'msgerror');
    }
    $this->redirect(array('action' => 'index'));
  }
  

}
