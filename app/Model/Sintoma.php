<?php
App::uses('AppModel', 'Model');
/**
 * Sintoma Model
 *
 * @property Paciente $Paciente
 */
class Sintoma extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Paciente' => array(
			'className' => 'Paciente',
			'joinTable' => 'pacientes_sintomas',
			'foreignKey' => 'sintoma_id',
			'associationForeignKey' => 'paciente_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
