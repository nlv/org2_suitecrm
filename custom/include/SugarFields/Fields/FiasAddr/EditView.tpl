<script type="text/javascript" src='{sugar_getjspath file="custom/include/SugarFields/Fields/FiasAddr/SugarFieldFiasAddr.js"}'></script>
<style>
  .ui-autocomplete-loading {ldelim}
    background: white url("{sugar_getimagepath file="img_loading.gif"}") right center no-repeat;
  {rdelim}
</style>

<fieldset id='{{$displayParams.key}}_fieldset'> 
    <legend>{sugar_translate label='LBL_{{$displayParams.key|upper}}_FIAS' module='{{$module}}'}</legend>
    <table border="0" cellspacing="1" cellpadding="0" class="edit" width="50%">
    {{foreach from=$displayParams.fields key=k item=field}}
        <tr>
            <td id="{{$field.name}}_label" width='{{$def.templateMeta.widths[$smarty.foreach.colIteration.index].label}}%' scope='row' >
                <label for="{{$field.name}}">{sugar_translate label='{{$field.vname}}' module='{{$module}}'}:</label>
                {{if $field.required || $field.name|lower|in_array:$displayParams.required}}
                    <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
                {{/if}}
            </td>
            <td>
        <input type="text" name="{{$field.name}}" id="{{$field.name}}" 
               size="{{if !empty($field.size)}} 
                        {{$field.size}}
                    {{else}}
                      {{$displayParams.size|default:30}} 
                    {{/if}}" maxlength="{{$field.len|default:$displayParams.maxlength}}" value='{$fields.{{$field.name}}.value}' tabindex="{{$tabindex}}">
        {{if !empty($field.id_name)}}
            <input type="hidden" name="{{$field.id_name}}"  id="{{$field.id_name}}" {{if !empty($field.id_name)}}value="{{sugarvar memberName='field.id_name' key='value'}}"{{/if}}>

                    {{if $k!= 'fullname'}}
                        <span class="id-ff multiple">
                           {* <button type="button" name="btn_{{$field.name}}" id="btn_{{$field.name}}" tabindex="{{$tabindex}}" title="{sugar_translate label="{{$displayParams.accessKeySelectTitle}}"}" class="button firstChild" value="{sugar_translate label="{{$displayParams.accessKeySelectLabel}}"}"
                            onclick='open_popup(
                                "{{$field.module}}", 
                                    600, 
                                    400, 
                                    {{$field.return_function}}, 
                                    true, 
                                    false, 
                                    {{if !empty($field.popup_request_data)}} 
                                        {{$field.popup_request_data}}
                                    {{/if}}, 
                                    "single", 
                                    true
                                    );'>
                                    <img src="{sugar_getimagepath file="id-ff-select.png"}">
                            </button>*}
                                    {{if empty($displayParams.selectOnly) }}
                                        <button type="button" name="btn_clr_{{$field.name}}" id="btn_clr_{{$field.name}}" tabindex="{{$tabindex}}" title="{sugar_translate label="{{$displayParams.accessKeyClearTitle}}"}"  class="button lastChild"
                                            onclick="SUGAR.clearRelateField(this.form, '{{$field.name}}', 
                                                '{{$field.id_name}}');
                                                 {{if !empty($field.javascript)}}{{$field.javascript}}{{/if}}"
                                            value="{sugar_translate label="{{$displayParams.accessKeyClearLabel}}"}" {{if isset($displayParams.javascript.btn_clear)}}{{$displayParams.javascript.btn_clear}}{{/if}}>
                                        <img src="{sugar_getimagepath file="id-ff-clear.png"}">
                                        </button>
                                {{/if}}
                        </span>

                    {{/if}}
            {{/if}}                
            </td>
        </tr>
    {{/foreach}}
     {{if $displayParams.copy}}
         {{foreach from=$displayParams.copy key=k item=fcopy}}
        <tr>
            <td scope='row' NOWRAP>
                {sugar_translate label='{{$fcopy.label}}' module=''}:
            </td>
            <td>
                <input id="{{$displayParams.key}}_{{$fcopy.name}}_checkbox" group="{{$displayParams.key}}_checkbox" type="checkbox" onclick="{{$displayParams.key}}_{{$fcopy.name}}_copy_address.syncFields();">
            </td>
        </tr>
        {{/foreach}}
    {{else}}
        <tr>
            <td colspan='2' NOWRAP>&nbsp;</td>
        </tr>
    {{/if}}

    </table>
</fieldset>
<script type="text/javascript">
  var _Global_Obj = _Global_Obj || [];
  
  $(document).ready(function(){ldelim} 
  
    SUGAR.util.doWhen("typeof(SUGAR.FiasAddrField) != 'undefined'", function(){ldelim}
        {{$displayParams.key}}_address = new SUGAR.FiasAddrField("{{$displayParams.key}}","{{$displayParams.form_name}}");
        {rdelim});
        
    
    SUGAR.util.doWhen("typeof(SUGAR.AddressFieldA) != 'undefined'", function(){ldelim}
        {{foreach from=$displayParams.copy key=k item=fcopy}}
		{{$displayParams.key}}_{{$fcopy.name}}_copy_address = new SUGAR.AddressFieldA("{{$displayParams.key}}_{{$fcopy.name}}_checkbox",'{{$fcopy.name}}', '{{$displayParams.key}}');
                _Global_Obj["{{$displayParams.key}}_{{$fcopy.name}}"] = {ldelim} name : "{{$displayParams.key}}_address", fromEl : "{{$fcopy.name}}", toEl : "{{$displayParams.key}}", checked : false, obj: {{$displayParams.key}}_{{$fcopy.name}}_copy_address,
                            aobj : {{$displayParams.key}}_address {rdelim};
        {{/foreach}}            
	{rdelim});
{rdelim});
</script>
