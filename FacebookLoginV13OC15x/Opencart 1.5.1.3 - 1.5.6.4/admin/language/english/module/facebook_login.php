<?php
// Heading
$_['heading_title']       		  = 'Facebook Login';

// Tab
$_['tab_general']         		  = 'General Settings';
$_['tab_fb_button']               = 'Facebook Login Button';
$_['tab_new_account']     		  = 'New Account Settings';
$_['tab_registration_mail']       = 'Registration Email Template';
$_['tab_help']           		  = 'Help';

// Text
$_['text_module']         		  = 'Modules';
$_['text_success']        		  = 'Success: You have modified module Facebook Login!';
$_['text_content_top']            = 'Content Top';
$_['text_content_bottom']         = 'Content Bottom';
$_['text_column_left']    		  = 'Column Left';
$_['text_column_right']   		  = 'Column Right';
$_['text_standard']               = 'Standard';
$_['text_advanced']               = 'Advanced (only for advanced users)';
$_['text_link_only']              = 'Link Only';
$_['text_standard_no_icon']       = 'Standard (no icon)';
$_['text_standard_icon']          = 'Standard (with icon)';
$_['text_rounded_no_icon']        = 'Rounded (no icon)';
$_['text_rounded_icon']           = 'Rounded (with icon)';

// Entry 
$_['entry_app_id']                = 'Facebook APP ID:<span class="help">see help guide to find instructions about how to create an FB APP and where to find APP ID</span>';
$_['entry_mode']                  = 'Mode:<span class="help">Standard = show button in default opencart positions<br /><br />Advanced = you can add button anywhere in your store pages</span>';

$_['entry_layout']        		  = 'Layout:';
$_['entry_position']      		  = 'Position:';
$_['entry_status']        		  = 'Status:';
$_['entry_sort_order']    		  = 'Sort Order:';

$_['entry_customer_group']        = 'Customer group:<span class="help">customer group for new account created using Facebook Login button</span>';
$_['entry_required_info']         = 'Customer required info:<span class="help">required info for new customer account<br /><br />If can\'t import some info (ex: telephone) from customer facebook account then extension will show popup to ask this info. (only for first login)</span>';
$_['entry_telephone']             = 'Telephone';
$_['entry_fax']                   = 'Fax';
$_['entry_company']               = 'Company';
$_['entry_company_id']            = 'Company ID';
$_['entry_tax_id']                = 'Tax ID';
$_['entry_address_1']             = 'Address';
$_['entry_city']                  = 'City';
$_['entry_postcode']              = 'Post Code';
$_['entry_country_id']            = 'Country';
$_['entry_zone_id']               = 'Region / State';

$_['entry_button_name']           = 'FB Login Button text:';
$_['entry_button_design']         = 'Design:';
$_['entry_button_preview']        = 'Preview:';
$_['entry_extra_info_message']    = 'Extra Info Message:<span class="help">Ex: We can\'t import all required info from your facebook account. Please fill fields below<br /><br />(used only once in case of info ex: phone, if can\'t be imported from FB account)</span>';

$_['entry_subject']               = 'Subject:';
$_['entry_message']               = 'Message:<span class="help"><br />SPECIAL KEYWORDS:<br />{firstname} = first name<br />{lastname} = last name<br />{email} = customer email<br />{password} = auto generated password<br />{login_link} = login link<br />{store_name} = your store name</span>';
$_['entry_use_html_email']        = 'Send email with <a href="http://www.oc-extensions.com/HTML-Email">HTML Email Extension</a>:<span class="help"><br />If HTML Email Extension is not installed on your store then is used default mail system</span>';

// Error
$_['error_permission']    		     = 'Warning: You do not have permission to modify module Facebook Login!';
$_['error_in_tab']      		     = 'Warning: You have errors in tab %s!';
$_['error_facebook_login_app_id']    = 'Error: Facebook APP ID is required!';
$_['error_button_name']              = 'Error: Button name (text) can\'t be empty!';
$_['error_customer_group_id']        = 'Error: Please select default customer group for accounts created with Facebook Login!';
$_['error_extra_info_message']       = 'Error: Extra info message is required!';
$_['error_subject']                  = 'Error: Registration mail subject is required!';
$_['error_message']                  = 'Error: Registration mail message is required!';
$_['error_message_no_credential']    = 'Error: No login credential ({email} and {password}) detected in mail message (for case when customer want to use later his account without pressing "Login with Facebook" button)!';
$_['error_html_email_not_installed'] = 'Registration Emails can\'t be sent with <a href="http://www.oc-extensions.com/HTML-Email">HTML Email Extension</a> because this extension is not available on your store. Please set option to Disabled!';
?>