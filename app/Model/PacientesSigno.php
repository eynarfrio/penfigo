<?php
App::uses('AppModel', 'Model');
/**
 * PacientesSigno Model
 *
 * @property Paciente $Paciente
 * @property Signo $Signo
 */
class PacientesSigno extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Paciente' => array(
			'className' => 'Paciente',
			'foreignKey' => 'paciente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Signo' => array(
			'className' => 'Signo',
			'foreignKey' => 'signo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
