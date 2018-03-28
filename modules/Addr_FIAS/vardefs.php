<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

 $dictionary['AddrFIAS'] = array (
	'table' => 'addr_fias',
	'comment' => 'Addresses module (FIAS)',
	'audited' => true,
	'fields' => array (
		'fias_address_type' => array ( // DB
			'name' => 'fias_address_type',
			'vname' => 'LBL_FIAS_ADDRESS_TYPE',
			'type' => 'enum',
			'options' => 'addr_fias_address_type_dom', 
			//'audited' => true,
			'required' => true,
			'isnull' => 'false',
		),
		'fias_address_fullname' => array(  // DB
			'name' => 'fias_address_fullname',
			'vname' => 'LBL_FIAS_ADDRESS_FULLNAME',
			'required' => true,
			'isnull' => 'false',
			'type' => 'varchar',
			'len' => '255',
		),
		'fias_address_fullname_id' => array( // DB
			'name' => 'fias_address_fullname_id',
			'vname' => 'LBL_FIAS_ADDRESS_FIASADDROBJ',
			'type' => 'id',
		),
		'fias_address_house_id' => array( // DB
			'name' => 'fias_address_house_id',
			'vname' => 'LBL_FIAS_ADDRESS_FIASHOUSE',
			'type' => 'id',
		),
		'fias_address_postalcode' => array( // DB
			'name' => 'fias_address_postalcode',
			'vname' => 'LBL_FIAS_ADDRESS_POSTALCODE',
			'type' => 'varchar',
			'len' => '6',
		),
		'fias_address_room' => array( // DB
			'name' => 'fias_address_room',
			'vname' => 'LBL_FIAS_ADDRESS_ROOM',
			'type' => 'varchar',
			'len' => '10',
		),
		
		'parent_type' => array (
			'name' => 'parent_type',
			'vname' => 'LBL_PARENT_NAME',
			'type' => 'parent_type',
			'dbType' => 'varchar',
			'group' => 'parent_name',
			'options' => 'parent_type_display',
			//'required' => true,
			'len' => '255',
			'options' => 'parent_type_display',
		),
		'parent_name'=> array (
			'name' => 'parent_name',
			'parent_type' => 'record_type_display' ,
			'type_name' => 'parent_type',
			'id_name' => 'parent_id',
			'vname' => 'LBL_LIST_RELATED_TO',
			'type' => 'parent',
			'group' => 'parent_name',
			'source' => 'non-db',
			'options' => 'parent_type_display',
		),
		'parent_id' => array (
			'name' => 'parent_id',
			'type' => 'id',
			'group' => 'parent_name',
			'reportable' => false,
			'vname' => 'LBL_PARENT_ID',
			//'required' => true,
		),		
	),

	'indices' => array(
		array(
			'name' => 'idx_addrfias_parent_type_parent_id_fias_address_type',
			'type' => 'index', 
			'fields' => array('parent_type', 'parent_id', 'fias_address_type'),
		),
	),

	'optimistic_locking' =>true,
);

VardefManager::createVardef('Addr_FIAS', 'AddrFIAS', array('basic'));
?>