<?php
$module_name = 'FiasAddrObj';
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
			'name',
			'fullname',
		),
		'advanced_search' => array(
			'shortname',
			'name',
			'fullname',
			'aolevel',
			'code',
			'postalcode',
		),
	),
);
?>