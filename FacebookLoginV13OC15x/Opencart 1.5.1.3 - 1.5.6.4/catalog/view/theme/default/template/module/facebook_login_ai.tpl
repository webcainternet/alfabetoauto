<div id="fbl-explain-info" class="fbl-toggle"><?php echo $text_explain_info; ?></div>

<div id="fbl-more-info-form" class="fbl-toggle">
	<div class="fbl-fields-area">
	  <div id="fbl-notification"></div>
	  
	  <table class="form">
		<?php if ($telephone_required) { ?>
		<tr>
		  <td><span class="required">*</span> <?php echo $entry_telephone; ?></td>
		  <td><input type="text" name="telephone" value="" /></td>
		</tr>
		<?php } ?>
		
		<?php if ($fax_required) { ?>
		<tr>
		  <td><span class="required">*</span> <?php echo $entry_fax; ?></td>
		  <td><input type="text" name="fax" value="" /></td>
		</tr>	
		<?php } ?>
		
		<?php if ($company_required) { ?>
		<tr>
		  <td><?php echo $entry_company; ?></td>
		  <td><input type="text" name="company" value="" /></td>
		</tr>   
		<?php } ?>
		
		<input type="hidden" name="customer_group_id" value="<?php echo $customer_group_id; ?>" />   
		<?php if ($company_id_required) { ?>
		<tr>
		  <td><span class="required">*</span> <?php echo $entry_company_id; ?></td>
		  <td><input type="text" name="company_id" value="" /></td>
		</tr>
		<?php } ?>
		
		<?php if ($tax_id_required) { ?>
		<tr>
		  <td><span class="required">*</span> <?php echo $entry_tax_id; ?></td>
		  <td><input type="text" name="tax_id" value="" /></td>
		</tr>
		<?php } ?>
		
		<?php if ($address_1_required) { ?>
		<tr>
		  <td><span class="required">*</span> <?php echo $entry_address_1; ?></td>
		  <td><input type="text" name="address_1" value="" size="40" /></td>
		</tr>
		<?php } ?>
		
		<?php if ($city_required) { ?>
		<tr>
		  <td><span class="required">*</span> <?php echo $entry_city; ?></td>
		  <td><input type="text" name="city" value="" /></td>
		</tr>
		<?php } ?>
		
		<?php if ($postcode_required) { ?>
		<tr>
		  <td><span class="required">*</span> <?php echo $entry_postcode; ?></td>
		  <td><input type="text" name="postcode" value="" /></td>
		</tr>
		<?php } ?>
		
		<?php if ($country_id_required) { ?>
		<tr>
		  <td><span class="required">*</span> <?php echo $entry_country; ?></td>
		  <td><select name="country_id">
			  <option value=""><?php echo $text_select; ?></option>
			  <?php foreach ($countries as $country) { ?>
			  <?php if ($country['country_id'] == $country_id) { ?>
			  <option value="<?php echo $country['country_id']; ?>" selected="selected"><?php echo $country['name']; ?></option>
			  <?php } else { ?>
			  <option value="<?php echo $country['country_id']; ?>"><?php echo $country['name']; ?></option>
			  <?php } ?>
			  <?php } ?>
			</select>
		  </td>
		</tr>
		<?php } ?>
		
		<?php if ($zone_id_required) { ?>
		<tr>
		  <td><span class="required">*</span> <?php echo $entry_zone; ?></td>
		  <td><select name="zone_id">
			</select></td>
		</tr>
		<?php } ?>
	  </table>
  </div>
  
  <input type="hidden" name="fb_additional_info" value="1" />
  
  <div class="buttons">
	<div class="right">
		<a id="fbl-register-now" class="fbl-register-button"><?php echo $button_register_now; ?></a>
	</div>
  </div>
</div>

<script type="text/javascript"><!--
$('#fbl-register-now').bind('click', function() { 
	$.ajax({
		type: 'POST',
		url: 'index.php?route=module/facebook_login/accountExtraInfo',
		data: $('#fbl-more-info-form input[type=\'text\'], #fbl-more-info-form input[type=\'hidden\'], #fbl-more-info-form select'),
		dataType: 'json',
		beforeSend: function () {
			$('.fbl-toggle').hide();
			$('.facebooklogin-modal').addClass('loading-background');
			
		},
		success: function(json) {
			$('.success, .warning').remove();
			
			if (json['error']) {
				$('.facebooklogin-modal').removeClass('loading-background');
				$('.fbl-toggle').show();
			
				$('#fbl-notification').html('<div class="warning" style="display: none;">' + json['error']['warning'] + '<img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>');
					
				$('.warning').fadeIn('slow');
			}
			
			if (json['redirect']) {
				if (facebook_login_stay_here) {
					location.reload();
				} else {
					location = json['redirect'];
				}
			}		
		}
	});
});

$('select[name=\'country_id\']').bind('change', function() {
	$.ajax({
		url: 'index.php?route=module/facebook_login/country&country_id=' + this.value,
		dataType: 'json',
		beforeSend: function() {
			$('select[name=\'country_id\']').after('<span class="wait">&nbsp;<img src="catalog/view/theme/default/image/loading.gif" alt="" /></span>');
		},
		complete: function() {
			$('.wait').remove();
		},			
		success: function(json) {
			if (json['postcode_required'] == '1') {
				$('#postcode-required').show();
			} else {
				$('#postcode-required').hide();
			}
			
			html = '<option value=""><?php echo $text_select; ?></option>';
			
			if (json['zone'] != '') {
				for (i = 0; i < json['zone'].length; i++) {
        			html += '<option value="' + json['zone'][i]['zone_id'] + '"';
	    			
					if (json['zone'][i]['zone_id'] == '<?php echo $zone_id; ?>') {
	      				html += ' selected="selected"';
	    			}
	
	    			html += '>' + json['zone'][i]['name'] + '</option>';
				}
			} else {
				html += '<option value="0" selected="selected"><?php echo $text_none; ?></option>';
			}
			
			$('select[name=\'zone_id\']').html(html);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
});

$('select[name=\'country_id\']').trigger('change');
//--></script>