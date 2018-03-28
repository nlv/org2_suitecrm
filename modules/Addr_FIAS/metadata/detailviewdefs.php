<?php
$module_name = 'Addr_FIAS';
$viewdefs [$module_name] = 
array (
	'DetailView' => array (
		'templateMeta' => array (
			'form' => array (
				'buttons' => array (
					0 => 'EDIT',
					1 => 'DUPLICATE',
					2 => 'DELETE',
				),
			),
			'maxColumns' => '3',
			'widths' => array (
				0 => array (
					'label' => '10',
					'field' => '15',
				),
				1 => array (
					'label' => '10',
					'field' => '15',
				),
				2 => array (
					'label' => '10',
					'field' => '40',
				),
			),
		),
		'panels' => array (
			'default' => array (
				0 => array (
					0 => 'fias_address_type',
					1 => 'fias_address_postalcode',
					2 => 'fias_address_fullname',
				),
			),     

		),
	),
);
?>