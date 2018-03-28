<?php
$dictionary['accounts_addr_fias'] = array (
	'relationships' => array(
		'accounts_addr_fias' => array(
			'lhs_module'=> 'Accounts', 
			'lhs_table'=> 'accounts', 
			'lhs_key' => 'id',
			'rhs_module'=> 'Addr_FIAS', 
			'rhs_table'=> 'addr_fias', 
			'rhs_key' => 'parent_id',
			'relationship_type' => 'one-to-many', 
			'relationship_role_column' => 'parent_type',
			'relationship_role_column_value' => 'Accounts',
		),
	),
);
?>