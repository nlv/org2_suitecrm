<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$viewdefs ['Addr_FIAS'] = array (
	'QuickCreate' => array (
		'templateMeta' => array (
			'form' => array (
				'buttons' => array (
					0 => 'SAVE',
					1 => 'CANCEL',
				),
				'enctype' => 'multipart/form-data',
				'hidden' => array(
					'<input type="hidden" name="parent_id" value="{$smarty.request.return_id}">',
					'<input type="hidden" name="parent_type" value="{$smarty.request.return_module}">',
				),
			),
			'maxColumns' => '2',
			'widths' => array (
				0 => array (
					'label' => '10',
					'field' => '50',
				),
				1 => array (
					'label' => '10',
					'field' => '50',
				),
			),
		),
		'panels' => array (
			0 => array (
				'name' => 'fias_address_type',
			),
			1 => array(
				array(
					'name' => 'fias_address_fullname',
					'type' => 'FiasAddr',
					'hideLabel' => true,
					'displayParams' => array (
						'key' => 'fias_address',
					),
				),
			),
		),
	),
);
?>