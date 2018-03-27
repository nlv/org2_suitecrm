<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$dictionary["FiasHouse"]["fields"]["fiasaddrobj_fiashouse"] = array (
	'name' => 'fiasaddrobj_fiashouse',
	'type' => 'link',
	'relationship' => 'fiasaddrobj_fiashouse',
	'source' => 'non-db',
	'module' => 'FiasAddrObj',
	'bean_name' => false,
	'vname' => 'LBL_FIASADDROBJ_FIASHOUSE_FROM_FIASADDROBJ_TITLE',
	'id_name' => 'aoguid',
);
$dictionary["FiasHouse"]["fields"]["aoname"] = array (
	'name' => 'aoname',
	'type' => 'relate',
	'source' => 'non-db',
	/*'vname' => 'LBL_FIASADDROBJ_FIASHOUSE_FROM_FIASADDROBJ_TITLE',*/
	'vname' => 'LBL_AONAME',
	/*'save' => true,*/
	'id_name' => 'aoguid',
	'link' => 'fiasaddrobj_fiashouse',
	'table' => 'fiasaddrobj',
	'module' => 'FiasAddrObj',
	'rname' => 'fullname',
	'required' => false,
	/*'join_name' => 'fiasaddrobj_fiashouse',*/
	'massupdate' => 0,
	'reportable' => true,
	'unified_search' => false,
);
$dictionary["FiasHouse"]["fields"]["aoguid"] = array (
	'name' => 'aoguid',
	'type' => 'id',
	'relationship' => 'fiasaddrobj_fiashouse',
	'reportable' => false,
	'side' => 'right',
	/*'vname' => 'LBL_FIASADDROBJ_FIASHOUSE_FROM_FIASHOME_TITLE',*/
	'vname' => 'LBL_AOGUID',
	'required' => true,
	'massupdate' => 0,
	'importable' => 'required',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'unified_search' => false,
	'merge_filter' => 'disabled',
	'len' => '36',
	'isnull' => false,
);
$dictionary["FiasHouse"]["indices"]["idx_fiashouse_aoguid"] = array (
	'name' => 'idx_fiashouse_aoguid',
	'type' => 'index', 
	'fields' => array('aoguid'),
);
?>