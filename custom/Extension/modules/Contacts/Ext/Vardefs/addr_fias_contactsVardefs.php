<?php
$dictionary['Contact']['fields']['addr_fias'] = array (
  	'name' => 'addr_fias',
    'type' => 'link',
	'relationship' => 'contacts_addr_fias',
	'module'=>'Addr_FIAS',
	'bean_name'=>'AddrFIAS',
    'source'=>'non-db',
	'vname'=>'LBL_ADDR_FIAS',
);
$dictionary['AddrFIAS']['fields']['contacts'] = array (
	'name' => 'contacts',
	'type' => 'link',
	'relationship' => 'contacts_addr_fias',
	'source' => 'non-db',
	'module' => 'Contacts',
	'bean_name' => 'Contact',
	'vname' => 'LBL_CONTACTS_SUBPANEL_TITLE',
);
?>