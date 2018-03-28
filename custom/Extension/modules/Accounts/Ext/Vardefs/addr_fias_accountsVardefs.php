<?php
$dictionary['Account']['fields']['addr_fias'] = array (
	'name' => 'addr_fias',
	'type' => 'link',
	'relationship' => 'accounts_addr_fias',
	'module'=>'Addr_FIAS',
	'bean_name'=>'AddrFIAS',
	'source'=>'non-db',
	'vname'=>'LBL_ADDR_FIAS',
);
$dictionary['AddrFIAS']['fields']['account'] = array (
	'name' => 'account',
	'type' => 'link',
	'relationship' => 'accounts_addr_fias',
	'source' => 'non-db',
	'module' => 'Accounts',
	'bean_name' => 'Account',
	'vname' => 'LBL_ACCOUNTS_SUBPANEL_TITLE',
);	
?>