<?php
$module_name = 'FiasHouse';
$viewdefs [$module_name] = array(
	'EditView' => array(
		'templateMeta' => array(
			'maxColumns' => '4',
			'widths' => array(
				0 => array(
					'label' => '15%',
					'field' => '10%',
				),
				1 => array(
					'label' => '15%',
					'field' => '10%',
				),
				2 => array(
					'label' => '15%',
					'field' => '10%',
				),
				3 => array(
					'label' => '15%',
					'field' => '10%',
				),
			),
			'useTabs' => false,
			'tabDefs' => array (
				'DEFAULT' => array(
					'newTab' => false,
					'panelDefault' => 'expanded',
				),
			),
		),
	    'panels' => array(
    		'default' => array(
				0 => array (
					0 => 'postalcode',
					1 => 'name',
					2 => 'buildnum',
					3 => 'strucnum',
				),
				1 => array (
					0 => 'counter',
					1 => 'updatedate',
				),
				2 => array (
					0 => 'aoname',
				),
			),
	    ),
    ),
);
?>