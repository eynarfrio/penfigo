<?php
App::uses('AppModel', 'Model');
/**
 * PacientesSintoma Model
 *
 * @property Paciente $Paciente
 * @property Sintoma $Sintoma
 */
class PacientesSintoma extends AppModel {


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
		'Sintoma' => array(
			'className' => 'Sintoma',
			'foreignKey' => 'sintoma_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
