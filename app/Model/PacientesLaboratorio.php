<?php
App::uses('AppModel', 'Model');
/**
 * PacientesLaboratorio Model
 *
 * @property Paciente $Paciente
 * @property Laboratorio $Laboratorio
 */
class PacientesLaboratorio extends AppModel {


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
		'Laboratorio' => array(
			'className' => 'Laboratorio',
			'foreignKey' => 'laboratorio_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
