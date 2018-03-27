<?php
$module_name = 'FiasAddrObj';
$viewdefs [$module_name] = array(
	'EditView' => array(
		'templateMeta' => array(
			'maxColumns' => '2',
			'widths' => array(
				0 => array(
					'label' => '10',
					'field' => '30',
				),
				1 => array(
					'label' => '10',
					'field' => '30',
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
					0 => 'shortname',
					1 => 'name',
				),
				1 => array (
					0 => 'postalcode',
					1 => 'aolevel',
				),
				2 => array (
					0 => 'code',
					1 => 'plaincode',
				),
				3 => array(
					0 => 'updatedate',
					1 => 'parentname',
				),
			),
		),
	),
);
?>
