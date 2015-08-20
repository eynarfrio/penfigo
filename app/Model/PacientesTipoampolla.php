<?php
App::uses('AppModel', 'Model');
/**
 * PacientesTipoampolla Model
 *
 * @property Areaampolla $Areaampolla
 * @property Tipoampolla $Tipoampolla
 */
class PacientesTipoampolla extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Areaampolla' => array(
			'className' => 'Areaampolla',
			'foreignKey' => 'areaampolla_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tipoampolla' => array(
			'className' => 'Tipoampolla',
			'foreignKey' => 'tipoampolla_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
