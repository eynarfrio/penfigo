<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 * @property Medico $Medico
 */
class User extends AppModel {
  //The Associations below have been created with all possible keys, those that are not needed can be removed

  /**
   * hasMany associations
   *
   * @var array
   */
  public function beforeSave($options = array()) {
    if (!empty($this->data['User']['password'])) {
      $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
    }
    return true;
  }

  public $hasMany = array(
    'Medico' => array(
      'className' => 'Medico',
      'foreignKey' => 'user_id',
      'dependent' => false,
      'conditions' => '',
      'fields' => '',
      'order' => '',
      'limit' => '',
      'offset' => '',
      'exclusive' => '',
      'finderQuery' => '',
      'counterQuery' => ''
    )
  );

}
