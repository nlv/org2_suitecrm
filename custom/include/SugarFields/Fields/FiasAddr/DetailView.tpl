<table border='0' cellpadding='0' cellspacing='0' width='100%'>
	<tr>
    <td width='99%' >
            <input type="hidden" class="sugar_field" id="$fields.{{$displayParams.key}}_fullname" value="{$fields.{{$displayParams.key}}_fullname.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
            {$fields.{{$displayParams.key}}_fullname.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}<br />
    </td>
		{{if !empty($displayParams.enableConnectors)}}
			<td class="dataField">
				{{sugarvar_connector view='DetailView'}} 
			</td>
		{{/if}}
		<td class='dataField' width='1%'>
		{{* 
		This is custom code that you may set to show on the second column of the address
		table.  An example would be the "Copy" button present from the Accounts detailview.
		See modules/Accounts/views/view.detail.php to see the value being set 
		*}}
			{$custom_code_{{$displayParams.key}}}

                </td>
	</tr>
</table>