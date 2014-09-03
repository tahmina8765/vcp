<?php
App::uses('AppModel', 'Model');
/**
 * AgentExpertise Model
 *
 * @property Agent $Agent
 * @property Expertise $Expertise
 */
class AgentExpertise extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'agent_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'expertise_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Agent' => array(
			'className' => 'Agent',
			'foreignKey' => 'agent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Expertise' => array(
			'className' => 'Expertise',
			'foreignKey' => 'expertise_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
