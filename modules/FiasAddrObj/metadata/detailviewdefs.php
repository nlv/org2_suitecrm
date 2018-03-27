<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$module_name = 'FiasAddrObj';
$viewdefs [$module_name] = array(
	'DetailView' => array (
		'templateMeta' => array(
			'form' => array(
				'buttons' => array(
					0 => 'EDIT',
					1 => 'DELETE',
				),
			),
			'maxColumns' => '4',
			'widths' => array(
				0 => array(
					'label' => '15',
					'field' => '10',
				),
				1 => array(
					'label' => '15',
					'field' => '10',
				),
				2 => array(
					'label' => '15',
					'field' => '10',
				),
				3 => array(
					'label' => '15',
					'field' => '10',
				),
			),
			'useTabs' => false,
			'tabDefs' => array (
				'DEFAULT' => array(
					'newTab' => false,
					'panelDefault' => 'expanded',
				),
			),
			'syncDetailEditViews' => false,
		),
	    'panels' => array(
    		'default' => array(
				0 => array (
					0 => 'aolevel',
					1 => 'shortname',
					2 => 'name',
				),
				1 => array (
					0 => 'postalcode',
					1 => 'code',
					2 => 'plaincode',
					3 => 'updatedate',
				),
				2 => array(
					0 => 'parentname',
				),
			),
	    ),
    ),
);
?>