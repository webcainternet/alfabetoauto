<?php echo $header; ?>
<div id="content">
<div class="breadcrumb">
  <?php foreach ($breadcrumbs as $breadcrumb) { ?>
  <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
  <?php } ?>
</div>
<?php if ($error_warning) { ?>
<div class="warning"><?php echo $error_warning; ?></div>
<?php } ?>
<div class="box">
  <div class="heading">
    <h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
    <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a></div>
  </div>
  <div class="content facebook-login-content">
	
	<div id="tabs" class="vtabs">
		<a href="#tab-general"><?php echo $tab_general; ?></a>
		<a href="#tab-new-account"><?php echo $tab_new_account; ?></a>
		<a href="#tab-fb-button"><?php echo $tab_fb_button; ?></a>
		<a href="#tab-registration-mail"><?php echo $tab_registration_mail; ?></a>
		<a href="#tab-help"><?php echo $tab_help; ?></a>
	</div>
  
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
	  
		<div id="tab-general" class="vtabs-content">
		  <table class="form">
			<tr>
				<td class="left"><span class="required">* </span><?php echo $entry_app_id; ?></td>
				<td><input type="text" name="facebook_login_app_id" value="<?php echo $facebook_login_app_id; ?>">
				<?php if ($error_facebook_login_app_id) { ?>
				<span class="error"><?php echo $error_facebook_login_app_id; ?></span>
				<?php } ?>
				</td>
			</tr>
			<tr>
				<td class="left"><?php echo $entry_mode; ?></td>
				<td><select name="facebook_login_mode">
				<?php if ($facebook_login_mode == "advanced") { ?>
				<option value="standard"><?php echo $text_standard; ?></option>
				<option value="advanced" selected="selected"><?php echo $text_advanced; ?></option>
				<?php } else { ?>
				<option value="standard" selected="selected"><?php echo $text_standard; ?></option>
				<option value="advanced"><?php echo $text_advanced; ?></option>
				<?php } ?>
				</select></td>
			</tr>
		  </table>
		  
		  <div class="advanced-mode">
			Advanced mode means that you have basic knowledge to add few lines of code in your template file.<br /><br />
			<div class="attention">Starting with version 1.2 was added new option to redirect user to same page after account was created. (by default customer is redirected to his account page)<br />Notice that for option 'Stay on same page', in code is added css class "ocx-stay-here"</div>
			
			Show code for redirect mode: 
			<select name="facebook_login_redirect_mode">
				<?php if ($facebook_login_redirect_mode == 'account') { ?>
				<option value="account" selected="selected">Redirect to Account Page (useful in login / register page)</option>
				<option value="same-page">Stay on same page (useful on checkout page)</option>
				<?php } else { ?>
				<option value="account">Redirect to Account Page (useful in login / register page)</option>
				<option value="same-page" selected="selected">Stay on same page (useful on checkout page)</option>				
				<?php } ?>
			</select>
			<br /><br />
			
			<strong>1. For 'link only' use code:</strong>
			<div class="code-block">
				<?php echo htmlspecialchars('<?php if (!$this->customer->isLogged()) { ?>'); ?><br />
				<?php echo htmlspecialchars('<a class="ocx-facebook-login-trigger" href="javascript:void(0);"><?php echo $this->config->get(\'facebook_login_button_name_\' . $this->config->get(\'config_language_id\')); ?></a>'); ?><br />
				<?php echo htmlspecialchars('<?php } ?>'); ?>
			</div>
			Result: <a class="ocx-facebook-login-trigger" href="javascript:void(0);">Login with Facebook</a>
			<br /><br />
			
			<strong>2. For 'Standard (no icon)' use code:</strong>
			<div class="code-block">
				<?php echo htmlspecialchars('<?php if (!$this->customer->isLogged()) { ?>'); ?><br />
				<?php echo htmlspecialchars('<a class="ocx-facebook-login-trigger ocx-fbl-button ocx-standard" href="javascript:void(0);"><?php echo $this->config->get(\'facebook_login_button_name_\' . $this->config->get(\'config_language_id\')); ?></a>'); ?><br />
				<?php echo htmlspecialchars('<?php } ?>'); ?>
			</div>
			Result: <a class="ocx-facebook-login-trigger ocx-fbl-button ocx-standard" href="javascript:void(0);">Login with Facebook</a>
			<br /><br />
			
			<strong>3. For 'Standard (with icon)' use code:</strong>
			<div class="code-block">
				<?php echo htmlspecialchars('<?php if (!$this->customer->isLogged()) { ?>'); ?><br />
				<?php echo htmlspecialchars('<a class="ocx-facebook-login-trigger ocx-fbl-button ocx-standard ocx-icon" href="javascript:void(0);"><?php echo $this->config->get(\'facebook_login_button_name_\' . $this->config->get(\'config_language_id\')); ?></a>'); ?><br />
				<?php echo htmlspecialchars('<?php } ?>'); ?>
			</div>
			Result: <a class="ocx-facebook-login-trigger ocx-fbl-button ocx-standard ocx-icon" href="javascript:void(0);">Login with Facebook</a>
			<br /><br />
			
			<strong>4. For 'Rounded (no icon)' use code:</strong>
			<div class="code-block">
				<?php echo htmlspecialchars('<?php if (!$this->customer->isLogged()) { ?>'); ?><br />
				<?php echo htmlspecialchars('<a class="ocx-facebook-login-trigger ocx-fbl-button ocx-rounded" href="javascript:void(0);"><?php echo $this->config->get(\'facebook_login_button_name_\' . $this->config->get(\'config_language_id\')); ?></a>'); ?><br />
				<?php echo htmlspecialchars('<?php } ?>'); ?>
			</div>
			Result: <a class="ocx-facebook-login-trigger ocx-fbl-button ocx-rounded" href="javascript:void(0);">Login with Facebook</a>
			<br /><br />
			
			<strong>5. For 'Rounded (with icon)' use code:</strong>
			<div class="code-block">
				<?php echo htmlspecialchars('<?php if (!$this->customer->isLogged()) { ?>'); ?><br />
				<?php echo htmlspecialchars('<a class="ocx-facebook-login-trigger ocx-fbl-button ocx-rounded ocx-icon" href="javascript:void(0);"><?php echo $this->config->get(\'facebook_login_button_name_\' . $this->config->get(\'config_language_id\')); ?></a>'); ?><br />
				<?php echo htmlspecialchars('<?php } ?>'); ?>
			</div>
			Result: <a class="ocx-facebook-login-trigger ocx-fbl-button ocx-rounded ocx-icon" href="javascript:void(0);">Login with Facebook</a>
		  </div>
		  
		  <table id="module" class="list">
			<thead>
			  <tr>
				<td class="left"><?php echo $entry_layout; ?></td>
				<td class="left"><?php echo $entry_position; ?></td>
				<td class="left"><?php echo $entry_status; ?></td>
				<td class="right"><?php echo $entry_sort_order; ?></td>
				<td></td>
			  </tr>
			</thead>
			<?php $module_row = 0; ?>
			<?php foreach ($modules as $module) { ?>
			<tbody id="module-row<?php echo $module_row; ?>">
			  <tr>
				<td class="left"><select name="facebook_login_module[<?php echo $module_row; ?>][layout_id]">
					<?php foreach ($layouts as $layout) { ?>
					<?php if ($layout['layout_id'] == $module['layout_id']) { ?>
					<option value="<?php echo $layout['layout_id']; ?>" selected="selected"><?php echo $layout['name']; ?></option>
					<?php } else { ?>
					<option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>
					<?php } ?>
					<?php } ?>
				  </select></td>				
				<td class="left"><select name="facebook_login_module[<?php echo $module_row; ?>][position]">
					<?php if ($module['position'] == 'content_top') { ?>
					<option value="content_top" selected="selected"><?php echo $text_content_top; ?></option>
					<?php } else { ?>
					<option value="content_top"><?php echo $text_content_top; ?></option>
					<?php } ?>
					<?php if ($module['position'] == 'content_bottom') { ?>
					<option value="content_bottom" selected="selected"><?php echo $text_content_bottom; ?></option>
					<?php } else { ?>
					<option value="content_bottom"><?php echo $text_content_bottom; ?></option>
					<?php } ?>
					<?php if ($module['position'] == 'column_left') { ?>
					<option value="column_left" selected="selected"><?php echo $text_column_left; ?></option>
					<?php } else { ?>
					<option value="column_left"><?php echo $text_column_left; ?></option>
					<?php } ?>
					<?php if ($module['position'] == 'column_right') { ?>
					<option value="column_right" selected="selected"><?php echo $text_column_right; ?></option>
					<?php } else { ?>
					<option value="column_right"><?php echo $text_column_right; ?></option>
					<?php } ?>
				  </select></td>
				<td class="left"><select name="facebook_login_module[<?php echo $module_row; ?>][status]">
					<?php if ($module['status']) { ?>
					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
					<option value="0"><?php echo $text_disabled; ?></option>
					<?php } else { ?>
					<option value="1"><?php echo $text_enabled; ?></option>
					<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
					<?php } ?>
				  </select></td>
				<td class="right"><input type="text" name="facebook_login_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo $module['sort_order']; ?>" size="3" /></td>
				<td class="left"><a onclick="$('#module-row<?php echo $module_row; ?>').remove();" class="button"><?php echo $button_remove; ?></a></td>
			  </tr>
			</tbody>
			<?php $module_row++; ?>
			<?php } ?>
			<tfoot>
			  <tr>
				<td colspan="4"></td>
				<td class="left"><a onclick="addModule();" class="button"><?php echo $button_add_module; ?></a></td>
			  </tr>
			</tfoot>
		  </table>
		</div> 	

		<div id="tab-new-account" class="vtabs-content">
			<table class="form">
				<tr>
					<td class="left"><span class="required">* </span><?php echo $entry_customer_group; ?></td>
					<td><select name="facebook_login_customer_group_id">
					<option value=""><?php echo $text_select; ?></option>
					<?php foreach($customer_groups as $customer_group) { ?>
					<?php if ($customer_group['customer_group_id'] == $facebook_login_customer_group_id) { ?>
					<option value="<?php echo $customer_group['customer_group_id']; ?>" selected="selected"><?php echo $customer_group['name']; ?></option>
					<?php } else { ?>
					<option value="<?php echo $customer_group['customer_group_id']; ?>"><?php echo $customer_group['name']; ?></option>
					<?php } ?>
					<?php } ?>
					</select>
					<?php if ($error_customer_group_id) { ?>
					<span class="error"><?php echo $error_customer_group_id; ?></span>
					<?php } ?>
					</td>
				</tr>
				<tr>
					<td class="left"><?php echo $entry_required_info; ?></td>
					<td>
						<?php foreach($extra_fields as $extra_field) { ?>
						<div class="required-selection-box">
							<div class="onoffswitch">
							<?php if (${'facebook_login_' . $extra_field}) { ?>
							<input type="checkbox" class="onoffswitch-checkbox" id="fbl_<?php echo $extra_field; ?>" checked="checked" />
							<?php } else { ?>
							<input type="checkbox" class="onoffswitch-checkbox" id="fbl_<?php echo $extra_field; ?>" />
							<?php } ?>
							<label class="onoffswitch-label" for="fbl_<?php echo $extra_field; ?>">
								<span class="onoffswitch-inner"></span>
								<span class="onoffswitch-switch"></span>
							</label>
							<input type="hidden" name="facebook_login_<?php echo $extra_field; ?>" id="facebook_login_<?php echo $extra_field; ?>" value="<?php echo ${'facebook_login_' . $extra_field}; ?>" />
							</div>
							<div class="required-name"><?php echo ${'entry_' . $extra_field}; ?></div>
						</div>			
						<?php } ?>	
					</td>
				</tr>	
			</table>	
		</div>	
		
		<div id="tab-fb-button" class="vtabs-content">
			<table class="form">
				<tr>
					<td class="left"><span class="required">* </span><?php echo $entry_button_name; ?></td>
					<td>
					<?php foreach ($languages as $language) { ?>
					<img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <input type="text" name="facebook_login_button_name_<?php echo $language['language_id'];?>" id="facebook-login-button-name-<?php echo $language['language_id'];?>" value="<?php echo ${'facebook_login_button_name_' . $language['language_id']}; ?>" size="60" />
					<?php if (isset($error_button_name[$language['language_id']])) { ?>
					<span class="error"><?php echo $error_button_name[$language['language_id']]; ?></span>
					<?php } ?>
					<br />
					<?php } ?>
					</td>
				</tr>
				<tr>
					<td class="left"><?php echo $entry_button_design; ?></td>
					<td><select name="facebook_login_button_design">
					<option value="" <?php echo ($facebook_login_button_design == '')? 'selected="selected"' : ''; ?>><?php echo $text_link_only; ?></option>
					<option value="ocx-fbl-button ocx-standard" <?php echo ($facebook_login_button_design == 'ocx-fbl-button ocx-standard')? 'selected="selected"' : ''; ?>><?php echo $text_standard_no_icon; ?></option>
					<option value="ocx-fbl-button ocx-standard ocx-icon" <?php echo ($facebook_login_button_design == 'ocx-fbl-button ocx-standard ocx-icon')? 'selected="selected"' : ''; ?>><?php echo $text_standard_icon; ?></option>			
					<option value="ocx-fbl-button ocx-rounded" <?php echo ($facebook_login_button_design == 'ocx-fbl-button ocx-rounded')? 'selected="selected"' : ''; ?>><?php echo $text_rounded_no_icon; ?></option>
					<option value="ocx-fbl-button ocx-rounded ocx-icon" <?php echo ($facebook_login_button_design == 'ocx-fbl-button ocx-rounded ocx-icon')? 'selected="selected"' : ''; ?>><?php echo $text_rounded_icon; ?></option>
					</select></td>
				</tr>
				<tr>
					<td class="left"><?php echo $entry_button_preview; ?></td>
					<td style="height:50px;"><a id="facebook-login-preview" class="button-facebook-login"></a></td>
				</tr>
			</table>
			
			<div id="extra-info-languages" class="htabs">
				<?php foreach ($languages as $language) { ?>
				<a href="#extra-info-language<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>
				<?php } ?>
			</div>
			
			<?php foreach ($languages as $language) { ?>
			<div id="extra-info-language<?php echo $language['language_id']; ?>">
				<table class="form">
					<tr>
						<td class="left"><span class="required">* </span><?php echo $entry_extra_info_message; ?></td>
						<td><textarea name="facebook_login_extra_info[<?php echo $language['language_id']; ?>][message]" id="facebook_login_extra_info_<?php echo $language['language_id']; ?>" cols="120" rows="8"><?php echo isset($facebook_login_extra_info[$language['language_id']]) ? $facebook_login_extra_info[$language['language_id']]['message'] : ''; ?></textarea>
						<?php if (isset($error_extra_info_message[$language['language_id']])) { ?>
						<span class="error"><?php echo $error_extra_info_message[$language['language_id']]; ?></span>
						<?php } ?>
						</td>
					</tr>		
				</table>
			</div>
			<?php } ?>	
			
		</div>	
		
		<div id="tab-registration-mail" class="vtabs-content">		
			<div id="rm-languages" class="htabs">
				<?php foreach ($languages as $language) { ?>
				<a href="#rm-language<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>
				<?php } ?>
			</div>
			
			<?php foreach ($languages as $language) { ?>
			<div id="rm-language<?php echo $language['language_id']; ?>">
				<table class="form">
					<tr>
						<td class="left"><span class="required">* </span><?php echo $entry_subject; ?></td>
						<td><input name="facebook_login_mail[<?php echo $language['language_id']; ?>][subject]" size="100" value="<?php echo isset($facebook_login_mail[$language['language_id']]) ? $facebook_login_mail[$language['language_id']]['subject'] : ''; ?>" />
						<?php if (isset($error_subject[$language['language_id']])) { ?>
						<span class="error"><?php echo $error_subject[$language['language_id']]; ?></span>
						<?php } ?>
						</td>
					</tr>
					<tr>
						<td class="left"><span class="required">* </span><?php echo $entry_message; ?></td>
						<td><textarea name="facebook_login_mail[<?php echo $language['language_id']; ?>][message]" id="facebook_login_message_<?php echo $language['language_id']; ?>" cols="120" rows="8"><?php echo isset($facebook_login_mail[$language['language_id']]) ? $facebook_login_mail[$language['language_id']]['message'] : ''; ?></textarea>
						<?php if (isset($error_message[$language['language_id']])) { ?>
						<span class="error"><?php echo $error_message[$language['language_id']]; ?></span>
						<?php } ?>
						</td>
					</tr>		
				</table>
			</div>
			<?php } ?>	
		
			<table class="form">
				<tr>
					<td class="left"><?php echo $entry_use_html_email; ?></td>
					<td><select name="facebook_login_use_html_email">
						<?php if ($facebook_login_use_html_email) { ?>
						<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
						<option value="0"><?php echo $text_disabled; ?></option>
						<?php } else { ?>
						<option value="1"><?php echo $text_enabled; ?></option>
						<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
						<?php } ?>
					</select>
					
					<?php if ($error_use_html_email){  ?>
					<span class="error"><?php echo $error_use_html_email; ?></span>
					<?php } ?>
					</td>
				</tr>
			</table>
		
		</div>	
		
		<div id="tab-help" class="vtabs-content">
			Changelog and HELP you can find  : <a href="http://oc-extensions.com/Facebook-Login" target="blank">HERE</a><br /><br />
			If you need support email us at <strong>support@oc-extensions.com</strong><br /><br /><br />
			
			<u><strong>Become a Premium Member:</strong></u><br /><br />
			With Premium Membership you will can download all our products (past, present and future) starting with the payment date, until the same day and month, a year later. <br />
			Find more on <a href="http://www.oc-extensions.com">www.oc-extensions.com</a>
		</div>
    </form>
  </div>
</div>

<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<script type="text/javascript"><!--
<?php foreach ($languages as $language) { ?>
CKEDITOR.replace('facebook_login_message_<?php echo $language['language_id']; ?>', {
	filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
});

CKEDITOR.replace('facebook_login_extra_info_<?php echo $language['language_id']; ?>', {
	filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
});
<?php } ?>
//--></script>
<script type="text/javascript"><!--	
$('#tabs a').tabs();
$('#rm-languages a').tabs();
$('#extra-info-languages a').tabs();

var module_row = <?php echo $module_row; ?>;

function addModule() {	
	html  = '<tbody id="module-row' + module_row + '">';
	html += '  <tr>';
	html += '    <td class="left"><select name="facebook_login_module[' + module_row + '][layout_id]">';
	<?php foreach ($layouts as $layout) { ?>
	html += '      <option value="<?php echo $layout['layout_id']; ?>"><?php echo addslashes($layout['name']); ?></option>';
	<?php } ?>
	html += '    </select></td>';	
	html += '    <td class="left"><select name="facebook_login_module[' + module_row + '][position]">';
	html += '      <option value="content_top"><?php echo $text_content_top; ?></option>';
	html += '      <option value="content_bottom"><?php echo $text_content_bottom; ?></option>';
	html += '      <option value="column_left"><?php echo $text_column_left; ?></option>';
	html += '      <option value="column_right"><?php echo $text_column_right; ?></option>';
	html += '    </select></td>';
	html += '    <td class="left"><select name="facebook_login_module[' + module_row + '][status]">';
    html += '      <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
    html += '      <option value="0"><?php echo $text_disabled; ?></option>';
    html += '    </select></td>';
	html += '    <td class="right"><input type="text" name="facebook_login_module[' + module_row + '][sort_order]" value="" size="3" /></td>';
	html += '    <td class="left"><a onclick="$(\'#module-row' + module_row + '\').remove();" class="button"><?php echo $button_remove; ?></a></td>';
	html += '  </tr>';
	html += '</tbody>';
	
	$('#module tfoot').before(html);
	
	module_row++;
}

$('select[name=\'facebook_login_mode\']').bind('change', function() {
	if ($(this).val() == 'advanced') {
		$('.advanced-mode').show();
		$('#module').hide();
	} else {
		$('.advanced-mode').hide();
		$('#module').show();
	}
});

$('select[name=\'facebook_login_mode\']').trigger('change');

$('select[name=\'facebook_login_redirect_mode\']').bind('change', function() {

	if ($(this).val() == 'same-page') {
		$('.code-block').each(function(){
			$(this).html($(this).html().replace("ocx-facebook-login-trigger", "ocx-facebook-login-trigger ocx-stay-here"));
		});
	} 
	
	if ($(this).val() == 'account') {
		$('.code-block').each(function(){
			$(this).html($(this).html().replace("ocx-facebook-login-trigger ocx-stay-here", "ocx-facebook-login-trigger"));
		});
	}
});

$('select[name=\'facebook_login_redirect_mode\']').trigger('change');

$('.onoffswitch-checkbox').bind('change', function(){
	var target = '#' + $(this).attr('id').replace("fbl", "facebook_login");
	
	if ($(this).is(':checked')) {
		$(target).val(1);
	} else {
		$(target).val(0);
	}
});

$('#facebook-login-button-name-<?php echo $default_language_id; ?>').bind('keyup', function(){
	$('#facebook-login-preview').text($(this).val());
});

$('#facebook-login-button-name-<?php echo $default_language_id; ?>').trigger('keyup');

$('select[name=\'facebook_login_button_design\']').bind('change', function() {
	$('#facebook-login-preview').attr('class', $(this).val());
});

$('select[name=\'facebook_login_button_design\']').trigger('change');
//--></script>
<?php echo $footer; ?>