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
      'required' => true,
      'importable' => 'required',
);
$dictionary["Contact"]["fields"]["name"] = array (
      'name' => 'name',
      'rname' => 'name',
      'vname' => 'LBL_NAME',
      'type' => 'name',
      'link' => true,
      'fields' => 
      array (
        0 => 'first_name',
	1 => 'patronymic_name',
        2 => 'last_name',
      ),
      'sort_on' => 'last_name',
      'source' => 'non-db',
      'group' => 'last_name',
      'len' => '255',
      'db_concat_fields' => 
      array (
        0 => 'first_name',
	1 => 'patronymic_name',
        2 => 'last_name',
      ),
      'importable' => 'false',
);

$dictionary["Contact"]["fields"]["fullname"] = array (
     'type' => 'fullname',
      'fields' => 
      array (
        0 => 'first_name',
	1 => 'patronymic_name',
        2 => 'last_name',
      ),
      'sort_on' => 'last_name',
      'source' => 'non-db',
      'group' => 'last_name',
      'len' => '510',
      'db_concat_fields' => 
      array (
        0 => 'first_name',
	1 => 'patronymic_name',
        2 => 'last_name',
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
?>
