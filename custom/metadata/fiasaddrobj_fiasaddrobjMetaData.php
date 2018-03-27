<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

$dictionary["fiasaddrobj_fiasaddrobj"] = array (
	'true_relationship_type' => 'one-to-many',
	'relationships' => array(
		'fiasaddrobj_fiasaddrobj' => array(
			'lhs_module' => 'FiasAddrObj',
			'lhs_table' => 'fiasaddrobj',
			'lhs_key' => 'id',
			'rhs_module' => 'FiasAddrObj',
			'rhs_table' => 'fiasaddrobj',
			'rhs_key' => 'parentguid',
			'relationship_type' => 'one-to-many',
		),
	),
);
?>