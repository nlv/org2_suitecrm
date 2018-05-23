<?php

$viewdefs ['Contacts'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'hidden' => 
        array (
          0 => '<input type="hidden" name="opportunity_id" value="{$smarty.request.opportunity_id}">',
          1 => '<input type="hidden" name="case_id" value="{$smarty.request.case_id}">',
          2 => '<input type="hidden" name="bug_id" value="{$smarty.request.bug_id}">',
          3 => '<input type="hidden" name="email_id" value="{$smarty.request.email_id}">',
          4 => '<input type="hidden" name="inbound_email_id" value="{$smarty.request.inbound_email_id}">',
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
                 alert('1');
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
      'useTabs' => false,
      'tabDefs' => 
      array (
        'LBL_CONTACT_INFORMATION' => 
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
      'lbl_contact_information' => 
      array (
        array (
          0 => 
          array (
            'name' => 'first_name',
            'customCode' => '{html_options name="salutation" id="salutation" options=$fields.salutation.options selected=$fields.salutation.value}&nbsp;<input name="first_name"  id="first_name" size="25" maxlength="25" type="text" value="{$fields.first_name.value}">',
          ),
          1 => 
          array (
            'name' => 'patronymic_name',
            'comment' => 'Patronymic name of the contact',
            'label' => 'LBL_PATRONYMIC_NAME',
          ),
          array (
            'name' => 'last_name',
          ),
	  null,
        ),
	array (
		'tags',
		null,
	),
        array (
          0 => 
          array (
            'name' => 'phone_work',
            'comment' => 'Work phone number of the contact',
            'label' => 'LBL_OFFICE_PHONE',
          ),
          1 => 
          array (
            'name' => 'phone_mobile',
            'comment' => 'Mobile phone number of the contact',
            'label' => 'LBL_MOBILE_PHONE',
          ),
        ),
        array ('vk_url', null),
        array (
          0 => 
          array (
            'name' => 'title',
            'comment' => 'The title of the contact',
            'label' => 'LBL_TITLE',
          ),
          1 => 'department',
        ),
        array (
          0 => 
          array (
            'name' => 'account_name',
            'displayParams' => 
            array (
              'key' => 'billing',
              'copy' => 'primary',
              'billingKey' => 'primary',
              'additionalFields' => 
              array (
                'phone_office' => 'phone_work',
              ),
            ),
          ),
          1 => 
          array (
            'name' => 'phone_fax',
            'comment' => 'Contact fax number',
            'label' => 'LBL_FAX_PHONE',
          ),
        ),
        array (
          0 => 
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL_ADDRESS',
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
          0 => 
          array (
            'name' => 'primary_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'primary',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
          1 => 
          array (
            'name' => 'alt_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'alt',
              'copy' => 'primary',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
        ),
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => '',
        ),
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
        ),
      ),
      'LBL_PANEL_ADVANCED' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'lead_source',
            'comment' => 'How did the contact come about',
            'label' => 'LBL_LEAD_SOURCE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'report_to_name',
            'label' => 'LBL_REPORTS_TO',
          ),
          1 => 'campaign_name',
        ),
      ),
    ),
  ),
);

