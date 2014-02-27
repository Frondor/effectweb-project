<?php
/***********************************************************/
/* Cetemaster Services, Limited                            */
/* Copyright (c) 2010-2013. All Rights Reserved,           */
/* www.cetemaster.com.br / www.cetemaster.com              */
/***********************************************************/
/* File generated by Cetemaster PHP Template Engine        */
/* Template: Harmony                                       */
/* DB file: skin_recovery                                  */
/* DB generated in 20/10/2013 - 04:34h                     */
/***********************************************************/
/* This is a cache file generated by                       */
/* DO NOT EDIT DIRECTLY                                    */
/* The changes are not saved to the cache automatically    */
/***********************************************************/

/********** Begin: recoverMember **********/
$CTM_TEMPLATE_DATABASE['recoverMember'] = <<<HTML
    <div class="box-content">
    	<div class="header"><span>{::x####$####x::this->lang->words['Recovery']['Recover']['Title']}</span></div>
        <form name="RecoverData" id="RecoverData" class="frm">
        	<table width="100%" border="0">
            	<tr>
                	<td><label>{::x####$####x::this->lang->words['Recovery']['Recover']['Login']}</label></td>
                    <td><input type="text" name="Login" id="Login" onKeyUp="this.value = this.value.toLowerCase();" maxlength="10" size="32" /></td>
        		</tr>
                <tr>
                	<td><label>{::x####$####x::this->lang->words['Recovery']['Recover']['Mail']}</label></td>
                    <td><input type="text" name="Mail" id="Mail" onKeyUp="this.value = this.value.toLowerCase();" size="32" /></td>
        		</tr>
        	</table>
        	<input type="button" value="{::x####$####x::this->lang->words['Recovery']['Recover']['Button']}" onclick="CTM.AjaxLoad('?app=core&module=recovery&write=true','Command','RecoverData');" class="btn" />
        </form>
    </div>
    <div id="Command"></div>
HTML;
/********** End: recoverMember **********/

/********** Begin: redefinePassword **********/
$CTM_TEMPLATE_DATABASE['redefinePassword'] = <<<HTML
    <if syntax="empty(::x####$####x::link_error)">
	<script type="text/javascript">
	::x####$####x::(function()
	{
		::x####$####x::("#NewPassword").keyup(function()
        {
            return CTM.PasswordLevel("NewPassword", "PassResult");
        });
        ::x####$####x::("#CNewPassword").blur(function()
        {
            if(::x####$####x::(this).val().length < 1)
				CTM.setFieldHover("CNewPassword", "CPassResult", "{::x####$####x::this->lang->words['Recovery']['Process']['FieldCheck']['Void']}", "#EFDC75", "exclamation");
            else if(::x####$####x::("#NewPassword").val() != ::x####$####x::(this).val())
				CTM.setFieldHover("CNewPassword", "CPassResult", "{::x####$####x::this->lang->words['Recovery']['Process']['FieldCheck']['PassConfirm']}", "#FF0000", "cross");
            else
				CTM.setFieldHover("CNewPassword", "CPassResult", "{::x####$####x::this->lang->words['Recovery']['Process']['FieldCheck']['PassConfirmed']}", "#093", "tick");
        });
	});
    </script>
    </if>
    <div class="box-content">
    	<div class="header"><span>{::x####$####x::this->lang->words['Recovery']['Process']['Title']}</span></div>
        <if syntax="empty(::x####$####x::link_error)">
        <form name="RedefinePassword" id="RedefinePassword" class="frm">
        	<table width="100%" border="0">
            	<tr>
                	<td><label>{::x####$####x::this->lang->words['Recovery']['Process']['NewPassword']}</label></td>
                    <td>
                    	<input type="password" name="NewPassword" id="NewPassword" onkeyup="this.value = this.value.toLowerCase();" maxlength="10" size="32" />
                        <span id="PassResult"></span>
        			</td>
                </tr>
                <tr>
                	<td><label>{::x####$####x::this->lang->words['Recovery']['Process']['CNewPassword']}</label></td>
                    <td>
                    	<input type="password" name="CNewPassword" id="CNewPassword" onkeyup="this.value = this.value.toLowerCase();" maxlength="10" size="32" />
                        <span id="CPassResult"></span>
        			</td>
        		</tr>
                <if syntax="empty(::x####$####x::link_id)">
                <tr>
                	<td><label>{::x####$####x::this->lang->words['Recovery']['Process']['Code']}</label></td>
                    <td>
                    	<input type="text" name="RedefineCode" id="RedefineCode" onkeyup="this.value = this.value.toUpperCase();" maxlength="23" size="32" />
        			</td>
        		</tr>
                </if>
        	</table>
        	<input type="button" value="{::x####$####x::this->lang->words['Recovery']['Process']['Button']}" onclick="CTM.AjaxLoad('?app=core&module=recovery&do=process&write=true<if syntax='!empty(::x####$####x::link_id)'>&id={::x####$####x::link_id}</if>','Command','RedefinePassword');" class="btn" />
        </form>
        <else />
        <div class="error-box">{::x####$####x::link_error}</div>
        </if>
    </div>
    <div id="Command"></div>
HTML;
/********** End: redefinePassword **********/