<?php 

$dictionary["Account"]["fields"]["vk_url"] = array (
            'name' => 'vk_url',
            'vname' => 'LBL_VK_URL',
            'audited' => true,
            'type' => 'url',
            'dbType' => 'varchar',
            'len' => 255,
);

$dictionary["Account"]["fields"]["feddistrict"] = array (
	    'name' => 'feddistrict',
	    'vname' => 'LBL_FEDDISTRICT',
	    'type' => 'enum',
	    'options' => 'federal_districts_dom',
	    'len' => '255',
);

$dictionary["Account"]["fields"]["metropolis"] = array (
	    'name' => 'metropolis',
	    'vname' => 'LBL_METROPOLIS',
	    'type' => 'enum',
	    'options' => 'metropolises_dom',
	    'len' => '255',
);

$dictionary["Account"]["fields"]["diocese"] = array (
	    'name' => 'diocese',
	    'vname' => 'LBL_DIOCESE',
	    'type' => 'enum',
	    'options' => 'dioceses_dom',
	    'len' => '255',
);

$dictionary["Account"]["fields"]["tags"] = array (
                'name' => 'tags',
                'vname' => 'LBL_TAGS',
                'type' => 'multienum',
                'importable' => 'true',
                'audited' => 1,
                'reportable' => 1,
                'options' => 'accounts_tags_dom',
                'isMultiSelect' => true,
);

?>
