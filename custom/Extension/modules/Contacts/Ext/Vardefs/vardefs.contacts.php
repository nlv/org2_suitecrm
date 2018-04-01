<?php 

$dictionary["Contact"]["fields"]["patronymic_name"] = array (
      'name' => 'patronymic_name',
      'vname' => 'LBL_PATRONYMIC_NAME',
      'type' => 'varchar',
      'len' => '100',
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'comment' => 'Patronymic name of the contact',
      'merge_filter' => 'selected',
      'required' => false,
);
$dictionary["Contact"]["fields"]["name"] = array (
      'name' => 'name',
      'rname' => 'name',
      'vname' => 'LBL_NAME',
      'type' => 'name',
      'link' => true,
      'fields' => 
      array (
        'last_name',
        'first_name',
	'patronymic_name',
      ),
      'sort_on' => 'last_name',
      'source' => 'non-db',
      'group' => 'last_name',
      'len' => '255',
      'db_concat_fields' => 
      array (
        'last_name',
        'first_name',
	'patronymic_name',
      ),
      'importable' => 'false',
);

$dictionary["Contact"]["fields"]["full_name"] = array (
     'name' => 'full_name',
     'type' => 'fullname',
      'fields' => 
      array (
        'last_name',
        'first_name',
	'patronymic_name',
      ),
      'sort_on' => 'last_name',
      'source' => 'non-db',
      'group' => 'last_name',
      'len' => '510',
      'db_concat_fields' => 
      array (
        'last_name',
        'first_name',
	'patronymic_name',
      ),
      'studio' => 
      array (
        'listview' => false,
      ),
);
$dictionary["Contact"]["fields"]["full_name2"] = array (
     'name' => 'full_name2',
     'type' => 'fullname',
      'fields' => 
      array (
        'last_name',
        'first_name',
	'patronymic_name',
      ),
      'sort_on' => 'last_name',
      'source' => 'non-db',
      'group' => 'last_name',
      'len' => '510',
      'db_concat_fields' => 
      array (
        'last_name',
        'first_name',
	'patronymic_name',
      ),
      'studio' => 
      array (
        'listview' => false,
      ),
);
$dictionary["Contact"]["fields"]["vk_url"] = array (
            'name' => 'vk_url',
            'vname' => 'LBL_VK_URL',
            'audited' => true,
            'type' => 'url',
            'dbType' => 'varchar',
            'len' => 255,
);

$dictionary["Contact"]["fields"]["feddistrict"] = array (
	    'name' => 'feddistrict',
	    'vname' => 'LBL_FEDDISTRICT',
	    'type' => 'enum',
	    'options' => 'federal_districts_dom',
	    'len' => '255',
);

$dictionary["Contact"]["fields"]["metropolis"] = array (
	    'name' => 'metropolis',
	    'vname' => 'LBL_METROPOLIS',
	    'type' => 'enum',
	    'options' => 'metropolises_dom',
	    'len' => '255',
);

$dictionary["Contact"]["fields"]["diocese"] = array (
	    'name' => 'diocese',
	    'vname' => 'LBL_DIOCESE',
	    'type' => 'enum',
	    'options' => 'dioceses_dom',
	    'len' => '255',
);
?>
