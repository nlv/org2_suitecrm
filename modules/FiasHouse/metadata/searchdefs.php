<?php
$module_name = 'FiasHouse';
$searchdefs[$module_name] = array(
	'templateMeta' => array( 
		'maxColumns' => '2', 
		'widths' => array(
			'label' => '10', 
			'field' => '30'
		), 
	),
	'layout' => array(
		'basic_search' => array(
			'postalcode',
			'name',
		),
        'advanced_search' => array(
			'postalcode',
			'name',
			'buildnum',
			'strucnum',
		),
	),
);
?>
