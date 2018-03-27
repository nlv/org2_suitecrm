<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

$dictionary["fiasaddrobj_fiashouse"] = array(
	'true_relationship_type' => 'one-to-many',
	'relationships' => array(
		'fiasaddrobj_fiashouse' => array(
			'lhs_module' => 'FiasAddrObj',
			'lhs_table' => 'fiasaddrobj',
			'lhs_key' => 'id',
			'rhs_module' => 'FiasHouse',
			'rhs_table' => 'fiashouse',
			'rhs_key' => 'aoguid',
			'relationship_type' => 'one-to-many',
		),
	),
);
?>