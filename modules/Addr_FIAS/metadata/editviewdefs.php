<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$viewdefs['Addr_FIAS']['EditView'] = array (
	'templateMeta' => array (
		'maxColumns' => '2',
		'form' => array (
			'buttons' => array (
				'SAVE',
				'CANCEL',
			),
			'enctype' => 'multipart/form-data',
			'hidden' => array(
				'<input type="hidden" name="parent_id" value="{$smarty.request.return_id}">',
				'<input type="hidden" name="parent_type" value="{$smarty.request.return_module}">',
			),
		),
		'widths' => array (
			array ( 
				'label' => '10',
				'field' => '50',
			),
			array ( 
				'label' => '10',
				'field' => '50',
			),
		),
	),
	'panels' => array (
		'default' => array (
			array ('fias_address_type'),
			array (
				array (
					'name' => 'fias_address_fullname',
					'type' => 'FiasAddr',
					'hideLabel' => true,
					'displayParams' => array(
						'key' => 'fias_address',
					),
				),
			),
		),
	),     
);
?>