<?php

$viewdefs ['Accounts'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'SAVE',
          1 => 'CANCEL',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'javascript' => "
        <script>
	  function setOptions (list, pval, field, cval = undefined) {ldelim}
	      ops = SUGAR.language.languages['app_list_strings'][list][pval];
              field.empty();
	      $.each(ops,function(k, v) {ldelim} 
                 field.append($('<option></option>',{ldelim}value: k, text:v{rdelim}));
              {rdelim});

	      if (cval != undefined) {ldelim}
		if (!(cval in ops)) {ldelim}
                 field.append($('<option></option>',{ldelim}value: cval, text:cval{rdelim}));
                {rdelim}
                field.val(cval);
              {rdelim}
	  {rdelim}


          $(document).ready(function() {ldelim}
             setOptions ('metropolises_by_feddistricts_dom',
  	         $('#feddistrict').val(),
		 $('#metropolis'),
                 $('#metropolis').val()
             );
             setOptions ('dioces_by_metropolises_dom',
 	         $('#metropolis').val(),
		 $('#diocese'),
		 $('#diocese').val()
	     );
          {rdelim});
        </script>",
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/Accounts/Account.js',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'LBL_ACCOUNT_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_ADVANCED' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'lbl_account_information' => 
      array (
        array (
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
          array (
            'name' => 'phone_office',
            'label' => 'LBL_PHONE_OFFICE',
          ),
        ),
	array ('tags', null),
        array (
          array (
            'name' => 'website',
            'type' => 'link',
            'label' => 'LBL_WEBSITE',
          ),
          array (
            'name' => 'phone_fax',
            'label' => 'LBL_FAX',
          ),
        ),
	array ('vk_url', null),
        array (
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL',
          ),
        ),
	array (
		[
			'name' => 'feddistrict',
                         'displayParams' => [
                             'field' => [
				     'onchange' => "
				         setOptions ('metropolises_by_feddistricts_dom',
						     this.value,
						     $('#metropolis')
                                         );
				         setOptions ('dioces_by_metropolises_dom',
						     $('#metropolis').val(),
						     $('#diocese')
                                         )
				     "
			     ]
		         ]

		], 
		null),
	array (
		[
			'name' => 'metropolis',
                         'displayParams' => [
                             'field' => [
			         'onchange' => "setOptions (
			  	                  'dioces_by_metropolises_dom',
						  this.value,
					          $('#diocese'))"
			     ]
		         ]

		], 
		'diocese'
	),
        array (
          array (
            'name' => 'billing_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
          array (
            'name' => 'shipping_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'shipping',
              'copy' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
        ),
        array (
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        array (
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
        ),
      ),
      'LBL_PANEL_ADVANCED' => 
      array (
        array (
          0 => 'account_type',
          1 => 'industry',
        ),
        array (
          0 => 'annual_revenue',
          1 => 'employees',
        ),
        array (
          0 => 'parent_name',
        ),
        array (
          0 => 'campaign_name',
        ),
      ),
    ),
  ),
);
