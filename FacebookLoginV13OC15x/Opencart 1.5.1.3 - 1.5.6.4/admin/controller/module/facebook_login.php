<?php
class ControllerModuleFacebookLogin extends Controller {
	private $error = array();
	private $version = '1.3';	
	
	public function index() {   
		$this->load->language('module/facebook_login');

		$this->document->setTitle($this->language->get('heading_title') . ' ' . $this->version);
		
		$this->document->addStyle('view/stylesheet/facebook_login.css');
		
		$this->load->model('setting/setting');
				
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('facebook_login', $this->request->post);		
					
			$this->session->data['success'] = $this->language->get('text_success');
						
			$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}
				 
		$this->data['heading_title'] = $this->language->get('heading_title') . ' ' . $this->version;
		
		$this->data['tab_general'] = $this->language->get('tab_general');
		$this->data['tab_fb_button'] = $this->language->get('tab_fb_button');
		$this->data['tab_new_account'] = $this->language->get('tab_new_account');
		$this->data['tab_registration_mail'] = $this->language->get('tab_registration_mail');
		$this->data['tab_help'] = $this->language->get('tab_help');
		
		$this->data['text_select'] = $this->language->get('text_select');		
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_yes'] = $this->language->get('text_yes');
		$this->data['text_no'] = $this->language->get('text_no');
		$this->data['text_content_top'] = $this->language->get('text_content_top');
		$this->data['text_content_bottom'] = $this->language->get('text_content_bottom');		
		$this->data['text_column_left'] = $this->language->get('text_column_left');
		$this->data['text_column_right'] = $this->language->get('text_column_right');
		$this->data['text_standard'] = $this->language->get('text_standard');
		$this->data['text_advanced'] = $this->language->get('text_advanced');
		$this->data['text_link_only'] = $this->language->get('text_link_only');
		$this->data['text_standard_no_icon'] = $this->language->get('text_standard_no_icon');
		$this->data['text_standard_icon'] = $this->language->get('text_standard_icon');
		$this->data['text_rounded_no_icon'] = $this->language->get('text_rounded_no_icon');
		$this->data['text_rounded_icon'] = $this->language->get('text_rounded_icon');
		
		
		$this->data['entry_app_id'] = $this->language->get('entry_app_id');
		$this->data['entry_mode'] = $this->language->get('entry_mode');
	
		$this->data['entry_layout'] = $this->language->get('entry_layout');
		$this->data['entry_position'] = $this->language->get('entry_position');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		
		$this->data['entry_customer_group'] = $this->language->get('entry_customer_group');
		$this->data['entry_required_info'] = $this->language->get('entry_required_info');
		
		$extra_fields = array(
			'telephone',
			'fax',
			'company',
			'company_id',
			'tax_id',
			'address_1',
			'city',
			'postcode',
			'country_id',
			'zone_id'
		);
		
		foreach($extra_fields as $extra_field) {
			$this->data['entry_' . $extra_field] = $this->language->get('entry_' . $extra_field);
		}		
		
		$this->data['entry_button_name'] = $this->language->get('entry_button_name');
		$this->data['entry_button_design'] = $this->language->get('entry_button_design');
		$this->data['entry_button_preview'] = $this->language->get('entry_button_preview');
		
		$this->data['entry_subject'] = $this->language->get('entry_subject');
		$this->data['entry_message'] = $this->language->get('entry_message');
		$this->data['entry_use_html_email'] = $this->language->get('entry_use_html_email');
		$this->data['entry_extra_info_message'] = $this->language->get('entry_extra_info_message');
		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_module'] = $this->language->get('button_add_module');
		$this->data['button_remove'] = $this->language->get('button_remove');
		
 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		if (isset($this->error['facebook_login_app_id'])) {
			$this->data['error_facebook_login_app_id'] = $this->error['facebook_login_app_id'];
		} else {
			$this->data['error_facebook_login_app_id'] = '';
		}
		
		if (isset($this->error['button_name'])) {
			$this->data['error_button_name'] = $this->error['button_name'];
		} else {
			$this->data['error_button_name'] = array();
		}		
		
		if (isset($this->error['customer_group_id'])) {
			$this->data['error_customer_group_id'] = $this->error['customer_group_id'];
		} else {
			$this->data['error_customer_group_id'] = '';
		}

		if (isset($this->error['extra_info_message'])) {
			$this->data['error_extra_info_message'] = $this->error['extra_info_message'];
		} else {
			$this->data['error_extra_info_message'] = array();
		}		
		
		if (isset($this->error['subject'])) {
			$this->data['error_subject'] = $this->error['subject'];
		} else {
			$this->data['error_subject'] = array();
		}	

		if (isset($this->error['message'])) {
			$this->data['error_message'] = $this->error['message'];
		} else {
			$this->data['error_message'] = array();
		}

		if (isset($this->error['use_html_email'])) {
			$this->data['error_use_html_email'] = $this->error['use_html_email'];
		} else {
			$this->data['error_use_html_email'] = array();
		}		
		
  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/facebook_login', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->data['action'] = $this->url->link('module/facebook_login', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		
		if (isset($this->request->post['facebook_login_app_id'])){
			$this->data['facebook_login_app_id'] = $this->request->post['facebook_login_app_id'];
		} elseif ( $this->config->get('facebook_login_app_id')){
			$this->data['facebook_login_app_id'] = $this->config->get('facebook_login_app_id');
		} else {
			$this->data['facebook_login_app_id'] = '';
		}
		
		if (isset($this->request->post['facebook_login_mode'])){
			$this->data['facebook_login_mode'] = $this->request->post['facebook_login_mode'];
		} elseif ( $this->config->get('facebook_login_mode')){
			$this->data['facebook_login_mode'] = $this->config->get('facebook_login_mode');
		} else {
			$this->data['facebook_login_mode'] = '';
		}

		if (isset($this->request->post['facebook_login_redirect_mode'])){
			$this->data['facebook_login_redirect_mode'] = $this->request->post['facebook_login_redirect_mode'];
		} elseif ( $this->config->get('facebook_login_redirect_mode')){
			$this->data['facebook_login_redirect_mode'] = $this->config->get('facebook_login_redirect_mode');
		} else {
			$this->data['facebook_login_redirect_mode'] = '';
		}		
		
		if (isset($this->request->post['facebook_login_customer_group_id'])){
			$this->data['facebook_login_customer_group_id'] = $this->request->post['facebook_login_customer_group_id'];
		} elseif ( $this->config->get('facebook_login_customer_group_id')){
			$this->data['facebook_login_customer_group_id'] = $this->config->get('facebook_login_customer_group_id');
		} else {
			$this->data['facebook_login_customer_group_id'] = '';
		}		
		
		foreach($extra_fields as $extra_field) {
			if (isset($this->request->post['facebook_login_' . $extra_field])){
				$this->data['facebook_login_' . $extra_field] = $this->request->post['facebook_login_' . $extra_field];
			} elseif ( $this->config->get('facebook_login_' . $extra_field)){
				$this->data['facebook_login_' . $extra_field] = $this->config->get('facebook_login_' . $extra_field);
			} else {
				$this->data['facebook_login_' . $extra_field] = '';
			}
		}	
		
		$this->load->model('localisation/language');
		$this->data['languages'] = $this->model_localisation_language->getLanguages();
		
		foreach($this->data['languages'] as $language) {
			if (isset($this->request->post['facebook_login_button_name_' . $language['language_id']])){
				$this->data['facebook_login_button_name_' . $language['language_id']] = $this->request->post['facebook_login_button_name_' . $language['language_id']];
			} elseif ( $this->config->get('facebook_login_button_name_' . $language['language_id'])){
				$this->data['facebook_login_button_name_' . $language['language_id']] = $this->config->get('facebook_login_button_name_' . $language['language_id']);
			} else {
				$this->data['facebook_login_button_name_' . $language['language_id']] = '';
			}
		}
		
		if (isset($this->request->post['facebook_login_button_design'])){
			$this->data['facebook_login_button_design'] = $this->request->post['facebook_login_button_design'];
		} elseif ( $this->config->get('facebook_login_button_design')){
			$this->data['facebook_login_button_design'] = $this->config->get('facebook_login_button_design');
		} else {
			$this->data['facebook_login_button_design'] = '';
		}		
		
		if (isset($this->request->post['facebook_login_use_html_email'])){
			$this->data['facebook_login_use_html_email'] = $this->request->post['facebook_login_use_html_email'];
		} elseif ( $this->config->get('facebook_login_use_html_email')){
			$this->data['facebook_login_use_html_email'] = $this->config->get('facebook_login_use_html_email');
		} else {
			$this->data['facebook_login_use_html_email'] = '';
		}		
		
		if (isset($this->request->post['facebook_login_extra_info'])){
			$this->data['facebook_login_extra_info'] = $this->request->post['facebook_login_extra_info'];
		} elseif ( $this->config->get('facebook_login_extra_info')){
			$this->data['facebook_login_extra_info'] = $this->config->get('facebook_login_extra_info');
		} else {
			$this->data['facebook_login_extra_info'] = array();
		}		
		
		if (isset($this->request->post['facebook_login_mail'])){
			$this->data['facebook_login_mail'] = $this->request->post['facebook_login_mail'];
		} elseif ( $this->config->get('facebook_login_mail')){
			$this->data['facebook_login_mail'] = $this->config->get('facebook_login_mail');
		} else {
			$this->data['facebook_login_mail'] = array();
		}		
		
		$this->data['modules'] = array();
		
		if (isset($this->request->post['facebook_login_module'])) {
			$this->data['modules'] = $this->request->post['facebook_login_module'];
		} elseif ($this->config->get('facebook_login_module')) { 
			$this->data['modules'] = $this->config->get('facebook_login_module');
		}		
		
		$this->load->model('sale/customer_group');
		$this->data['customer_groups'] = $this->model_sale_customer_group->getCustomerGroups();		
						
		$this->load->model('design/layout');
		$this->data['layouts'] = $this->model_design_layout->getLayouts();
		
		$this->data['extra_fields'] = $extra_fields;
		$this->data['default_language_id'] = $this->config->get('config_language_id');
		
		$this->data['token'] = $this->session->data['token'];
						 
		$this->template = 'module/facebook_login.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
	}
	
	
	private function validate() {
	
		if (!$this->user->hasPermission('modify', 'module/facebook_login')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		$dinamic_strlen = 'utf8_strlen';
		 
		if ( !function_exists('utf8_strlen') ) {
			$dinamic_strlen = 'strlen';
		}
		
		if ($dinamic_strlen($this->request->post['facebook_login_app_id']) == 0){
			$this->error['facebook_login_app_id'] = $this->language->get('error_facebook_login_app_id');
			$this->error['warning'] = sprintf($this->language->get('error_in_tab'), $this->language->get('tab_general'));
		}		
		
		$this->load->model('localisation/language');
		$languages = $this->model_localisation_language->getLanguages();
		
		foreach($languages as $language) {
			$key = 'facebook_login_button_name_' . $language['language_id'];
			
			if (isset($this->request->post[$key])) {
				if ($dinamic_strlen($this->request->post[$key]) < 1) {
					$this->error['button_name'][$language_id] = $this->language->get('error_button_name');
					$this->error['warning'] = sprintf($this->language->get('error_in_tab'), $this->language->get('tab_fb_button'));
				}
			}
		}		
		
		if ($dinamic_strlen($this->request->post['facebook_login_customer_group_id']) == 0){
			$this->error['customer_group_id'] = $this->language->get('error_customer_group_id');
			$this->error['warning'] = sprintf($this->language->get('error_in_tab'), $this->language->get('tab_new_account'));
		}		
		
		foreach ($this->request->post['facebook_login_mail'] as $language_id => $value) {
			if ($dinamic_strlen($value['subject']) < 1) {
        		$this->error['subject'][$language_id] = $this->language->get('error_subject');
        		$this->error['warning'] = sprintf($this->language->get('error_in_tab'), $this->language->get('tab_registration_mail'));
      		}
			
			if ($dinamic_strlen($value['message']) < 1) {
        		$this->error['message'][$language_id] = $this->language->get('error_message');
        		$this->error['warning'] = sprintf($this->language->get('error_in_tab'), $this->language->get('tab_registration_mail'));
      		}
			
			if (strpos($value['message'], "{email}") === false || strpos($value['message'], "{password}") === false) {
				$this->error['message'][$language_id] = $this->language->get('error_message_no_credential');
        		$this->error['warning'] = sprintf($this->language->get('error_in_tab'), $this->language->get('tab_registration_mail'));
			}
		}	
		
		if ($this->request->post['facebook_login_use_html_email'] == 1 && !$this->isHTMLEmailExtensionInstalled() ) {
			$this->error['use_html_email'] = $this->language->get('error_html_email_not_installed');
			$this->error['warning'] = sprintf($this->language->get('error_in_tab'), $this->language->get('tab_registration_mail'));
		}

		foreach ($this->request->post['facebook_login_extra_info'] as $language_id => $value) {
			if ($dinamic_strlen($value['message']) < 1) {
        		$this->error['extra_info_message'][$language_id] = $this->language->get('error_extra_info_message');
        		$this->error['warning'] = sprintf($this->language->get('error_in_tab'), $this->language->get('tab_fb_button'));
      		}
		}
				
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
	
	private function isHTMLEmailExtensionInstalled() {
		$installed = false;
		
		if ($this->config->get('html_email_default_word') && file_exists(DIR_APPLICATION . 'model/tool/html_email.php') && file_exists(DIR_CATALOG . 'model/tool/html_email.php')) {
			$installed = true;	
		}
		
		return $installed;
	}	
}
?>