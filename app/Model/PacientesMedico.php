<?php
App::uses('AppModel', 'Model');
/**
 * PacientesMedico Model
 *
 * @property Paciente $Paciente
 * @property Medico $Medico
 */
class PacientesMedico extends AppModel {


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
		'Medico' => array(
			'className' => 'Medico',
			'foreignKey' => 'medico_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
