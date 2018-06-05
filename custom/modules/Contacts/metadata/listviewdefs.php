<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


$listViewDefs['Contacts'] = array(
	'FULL_NAME2' => array(
		'width' => '20%', 		
		'label' => 'LBL_NAME', 
		'link' => true,
        'contextMenu' => array('objectType' => 'sugarPerson', 
                               'metaData' => array('contact_id' => '{$ID}', 
                                                   'module' => 'Contacts',
                                                   'return_action' => 'ListView', 
                                                   'contact_name' => '{$FULL_NAME}', 
                                                   'parent_id' => '{$ACCOUNT_ID}',
                                                   'parent_name' => '{$ACCOUNT_NAME}',
                                                   'return_module' => 'Contacts', 
                                                   'return_action' => 'ListView', 
                                                   'parent_type' => 'Account', 
                                                   'notes_parent_type' => 'Account')
                              ),
		'orderBy' => 'name',
        'default' => true,
        'related_fields' => array('first_name', 'patronymic_name', 'last_name', 'salutation', 'account_name', 'account_id'),
		), 
	'SALUTATION' => array(
		'width' => '15%', 
		'label' => 'LBL_SALUTATION',
        ), 
	'FEDDISTRICT' => array(
		'width' => '15%', 
		'label' => 'LBL_FEDDISTRICT',
        'default' => true), 
	'METROPOLIS' => array(
		'width' => '15%', 
		'label' => 'LBL_METROPOLIS',
        'default' => true), 
	'DIOCESE' => array(
		'width' => '15%', 
		'label' => 'LBL_DIOCESE',
        'default' => true), 
        'PHONE_MOBILE' => array(
          'width' => '10', 
          'label' => 'LBL_MOBILE_PHONE',
          'default' => true
        ),
	'EMAIL1' => array(
		'width' => '15%', 
		'label' => 'LBL_LIST_EMAIL_ADDRESS',
		'sortable' => false,
		'link' => true,
		'customCode' => '{$EMAIL1_LINK}',
        'default' => true
		),  
	'VK_URL' => array(
		'width' => '15%', 
		'label' => 'LBL_VK_URL',
		'sortable' => false,
        'default' => true
		),  
    'CREATED_BY_NAME' => array(
        'width' => '10', 
        'label' => 'LBL_CREATED'),
    'TAGS' => array(
        'width' => '10', 
	'label' => 'LBL_TAGS',
	'default' => true,
     ),
    'ASSIGNED_USER_NAME' => array(
        'width' => '10', 
        'label' => 'LBL_LIST_ASSIGNED_USER',
        'module' => 'Employees',
        'id' => 'ASSIGNED_USER_ID',
        'default' => false),
    'MODIFIED_BY_NAME' => array(
        'width' => '10', 
        'label' => 'LBL_MODIFIED'),
    'SYNC_CONTACT' => array (
        'type' => 'bool',
        'label' => 'LBL_SYNC_CONTACT',
        'width' => '10%',
        'default' => false,
        'sortable' => false,
        ),
    'DATE_ENTERED' => array(
        'width' => '10', 
        'label' => 'LBL_DATE_ENTERED',
		'default' => true)       
);

