<?php
class ControllerModuleFacebookLogin extends Controller {
	protected function index($setting) {
		
		if ($this->config->get('facebook_login_mode') == 'standard') { 
			
			$this->data['button_name'] = $this->config->get('facebook_login_button_name_' . $this->config->get('config_language_id'));
			$this->data['button_class'] = $this->config->get('facebook_login_button_design');
			
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/facebook_login.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/module/facebook_login.tpl';
			} else {
				$this->template = 'default/template/module/facebook_login.tpl';
			}
			
			if (!$this->customer->isLogged()) {
				$this->render();
			}
		}	
	}
	
	public function checkuser() {
		
		$this->load->model('module/facebook_login');
		
		$this->session->data['fb_user_info'] = $this->request->post;
		
		if (isset($this->request->post['email'])) { 
		
			if (!$this->model_module_facebook_login->getTotalCustomersByEmail($this->request->post['email'])) {
				if (!$this->isAdditionalRequired($this->request->post)) {
					
					$this->createAccount();
					$this->customer->login($this->request->post['email'], '', true);
					$this->FBLoginRedirect();
					
				} else {
					$this->accountExtraInfo();
				}			
				
			} else {
			
				if (!$this->customer->isLogged()) {
					$this->customer->login($this->request->post['email'], '', true);
				}
				
				$this->FBLoginRedirect();
			}
			
		} else {
			
			$this->FBRegisterRedirect();
		}		
	}
	
	private function FBLoginRedirect() {
		$json = array();
			
		$json['redirect'] = $this->url->link('account/account', '', 'SSL');
		
		$this->response->setOutput(json_encode($json));
	}
	
	private function FBRegisterRedirect() {
		$json = array();
			
		$json['redirect'] = $this->url->link('account/register', '', 'SSL');
		
		$this->response->setOutput(json_encode($json));
	}	
	
	public function createAccount() {
		$this->load->model('module/facebook_login');
		$this->model_module_facebook_login->addCustomer($this->createOCCustomerData());
	}
	
	public function accountExtraInfo() {
		$this->language->load('module/facebook_login');
	
		$this->load->model('module/facebook_login');
		
		$account_success = false;
		
		$json = array();
		
		if ($this->request->server['REQUEST_METHOD'] == 'POST' && isset($this->request->post['fb_additional_info'])) {
			if (!$json) {
				
				$dinamic_strlen = 'utf8_strlen';
		 
				if ( !function_exists('utf8_strlen') ) {
					$dinamic_strlen = 'strlen';
				}
				
				if ($this->config->get('facebook_login_zone_id')) {
					if (!isset($this->request->post['zone_id']) || $this->request->post['zone_id'] == '') {
						$json['error']['warning'] = $this->language->get('error_zone');
					}
				}	
				
				if ($this->config->get('facebook_login_country_id')) {
					if ($this->request->post['country_id'] == '') {
						$json['error']['warning'] = $this->language->get('error_country');
					}				
				}
				
				if ($this->config->get('facebook_login_postcode')) {
					if (($dinamic_strlen($this->request->post['postcode']) < 2) || ($dinamic_strlen($this->request->post['postcode']) > 10)) {
						$json['error']['warning'] = $this->language->get('error_postcode');
					}
				}				
				
				if ($this->config->get('facebook_login_city')) {
					if (($dinamic_strlen($this->request->post['city']) < 2) || ($dinamic_strlen($this->request->post['city']) > 128)) {
						$json['error']['warning'] = $this->language->get('error_city');
					}
				}
				
				if ($this->config->get('facebook_login_address_1')) {
					if (($dinamic_strlen($this->request->post['address_1']) < 3) || ($dinamic_strlen($this->request->post['address_1']) > 128)) {
						$json['error']['warning'] = $this->language->get('error_address_1');
					}
				}
				
				if ($this->config->get('facebook_login_tax_id')) {
					if (($dinamic_strlen($this->request->post['tax_id']) < 1)) {
						$json['error']['warning'] = $this->language->get('error_tax_id');
					}
				}				
				
				if ($this->config->get('facebook_login_company_id')) {
					if (($dinamic_strlen($this->request->post['company_id']) < 1)) {
						$json['error']['warning'] = $this->language->get('error_company_id');
					}
				}				
				
				if ($this->config->get('facebook_login_company')) {
					if (($dinamic_strlen($this->request->post['company']) < 1)) {
						$json['error']['warning'] = $this->language->get('error_company');
					}
				}				
				
				if ($this->config->get('facebook_login_fax')) {
					if (($dinamic_strlen($this->request->post['fax']) < 3) || ($dinamic_strlen($this->request->post['fax']) > 32)) {
						$json['error']['warning'] = $this->language->get('error_fax');
					}
				}
				
				if ($this->config->get('facebook_login_telephone')) {
					if (($dinamic_strlen($this->request->post['telephone']) < 3) || ($dinamic_strlen($this->request->post['telephone']) > 32)) {
						$json['error']['warning'] = $this->language->get('error_telephone');
					}
				}
			}
			
			if (!$json) {
				
				$this->session->data['fb_user_extra_info'] = $this->request->post;
				
				$this->model_module_facebook_login->addCustomer($this->createOCCustomerData());
				
				$this->customer->login($this->session->data['fb_user_info']['email'], '', true);
				
				$account_success = true;
				
				$this->FBLoginRedirect();
			}
		
		} else {
			
			$extra_info = $this->config->get('facebook_login_extra_info');
			
			if (isset($extra_info[$this->config->get('config_language_id')]['message'])) {
				$this->data['text_explain_info'] = html_entity_decode($extra_info[$this->config->get('config_language_id')]['message'], ENT_QUOTES, 'UTF-8');
			} else {
				$this->data['text_explain_info'] = '';
			}
			
			$this->data['text_yes'] = $this->language->get('text_yes');
			$this->data['text_no'] = $this->language->get('text_no');
			$this->data['text_select'] = $this->language->get('text_select');
			$this->data['text_none'] = $this->language->get('text_none');
							
			$this->data['entry_telephone'] = $this->language->get('entry_telephone');
			$this->data['entry_fax'] = $this->language->get('entry_fax');
			$this->data['entry_company'] = $this->language->get('entry_company');
			$this->data['entry_company_id'] = $this->language->get('entry_company_id');
			$this->data['entry_tax_id'] = $this->language->get('entry_tax_id');
			$this->data['entry_address_1'] = $this->language->get('entry_address_1');
			$this->data['entry_postcode'] = $this->language->get('entry_postcode');
			$this->data['entry_city'] = $this->language->get('entry_city');
			$this->data['entry_country'] = $this->language->get('entry_country');
			$this->data['entry_zone'] = $this->language->get('entry_zone');
			
			if ($this->config->get('facebook_login_telephone')) {
				$this->data['telephone_required'] = true;
			} else {
				$this->data['telephone_required'] = false;
			}
			
			if ($this->config->get('facebook_login_fax')) {
				$this->data['fax_required'] = true;
			} else {
				$this->data['fax_required'] = false;
			}

			if ($this->config->get('facebook_login_company')) {
				$this->data['company_required'] = true;
			} else {
				$this->data['company_required'] = false;
			}

			if ($this->config->get('facebook_login_company_id')) {
				$this->data['company_id_required'] = true;
			} else {
				$this->data['company_id_required'] = false;
			}	

			if ($this->config->get('facebook_login_tax_id')) {
				$this->data['tax_id_required'] = true;
			} else {
				$this->data['tax_id_required'] = false;
			}

			if ($this->config->get('facebook_login_address_1')) {
				$this->data['address_1_required'] = true;
			} else {
				$this->data['address_1_required'] = false;
			}

			if ($this->config->get('facebook_login_city')) {
				$this->data['city_required'] = true;
			} else {
				$this->data['city_required'] = false;
			}			
			
			if ($this->config->get('facebook_login_postcode')) {
				$this->data['postcode_required'] = true;
			} else {
				$this->data['postcode_required'] = false;
			}

			if ($this->config->get('facebook_login_country_id')) {
				$this->data['country_id_required'] = true;
			} else {
				$this->data['country_id_required'] = false;
			}

			if ($this->config->get('facebook_login_zone_id')) {
				$this->data['zone_id_required'] = true;
			} else {
				$this->data['zone_id_required'] = false;
			}				
			
			$this->data['button_register_now'] = $this->language->get('button_register_now');
		
			$this->data['customer_group_id'] = $this->config->get('facebook_login_customer_group_id');
			
			$this->data['country_id'] = $this->config->get('config_country_id');
			$this->data['zone_id'] = $this->config->get('config_zone_id');
			
			$this->load->model('localisation/country');
			$this->data['countries'] = $this->model_localisation_country->getCountries();
		
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/facebook_login_ai.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/module/facebook_login_ai.tpl';
			} else {
				$this->template = 'default/template/module/facebook_login_ai.tpl';
			}
			
			$json['output'] = $this->render();
		}
		
		if (!$account_success) { 
			$this->response->setOutput(json_encode($json));
		}	
	}
	
	public function createOCCustomerData() {
		
		$this->load->model('module/facebook_login');
		
		// create customer data in oc format
		$oc_customer_data = array(
			'firstname'  		=> $this->session->data['fb_user_info']['first_name'],
			'lastname'   		=> $this->session->data['fb_user_info']['last_name'],
			'email'      		=> $this->session->data['fb_user_info']['email'],
			'telephone'  		=> isset($this->session->data['fb_user_extra_info']['telephone']) ? $this->session->data['fb_user_extra_info']['telephone'] : '', 
			'fax'        		=> isset($this->session->data['fb_user_extra_info']['fax']) ? $this->session->data['fb_user_extra_info']['fax'] : '',
			'password'   		=> $this->model_module_facebook_login->generateRandomPassword(), 
			'newsletter' 		=> '1',
			'customer_group_id' => isset($this->session->data['fb_user_extra_info']['customer_group_id']) ? $this->session->data['fb_user_extra_info']['customer_group_id'] : $this->config->get('facebook_login_customer_group_id'),
			'status'            => '1',
			'approved'          => '1',
			'company'           => isset($this->session->data['fb_user_extra_info']['company']) ? $this->session->data['fb_user_extra_info']['company'] : '',
			'company_id'        => isset($this->session->data['fb_user_extra_info']['company_id']) ? $this->session->data['fb_user_extra_info']['company_id'] : '',
			'tax_id'            => isset($this->session->data['fb_user_extra_info']['tax_id']) ? $this->session->data['fb_user_extra_info']['tax_id'] : '',
			'address_1'         => isset($this->session->data['fb_user_extra_info']['address_1']) ? $this->session->data['fb_user_extra_info']['address_1'] : '', 
			'address_2'         => isset($this->session->data['fb_user_extra_info']['address_2']) ? $this->session->data['fb_user_extra_info']['address_2'] : '', 
			'city'              => isset($this->session->data['fb_user_extra_info']['city']) ? $this->session->data['fb_user_extra_info']['city'] : '', 
			'postcode'          => isset($this->session->data['fb_user_extra_info']['postcode']) ? $this->session->data['fb_user_extra_info']['postcode'] : '', 
			'country_id'        => isset($this->session->data['fb_user_extra_info']['country_id']) ? $this->session->data['fb_user_extra_info']['country_id'] : '', 
			'zone_id'           => isset($this->session->data['fb_user_extra_info']['zone_id']) ? $this->session->data['fb_user_extra_info']['zone_id'] : '', 	
		);
		
		return $oc_customer_data;
	}
	
	private function isAdditionalRequired($user_info) {
		$show_extra_dialog = false;
		
		if ($this->config->get('facebook_login_telephone') && !isset($user_info['telephone'])) {
			$show_extra_dialog = true;
		}
		
		if ($this->config->get('facebook_login_fax') && !isset($user_info['fax'])) {
			$show_extra_dialog = true;
		}		
		
		if ($this->config->get('facebook_login_company') && !isset($user_info['company'])) {
			$show_extra_dialog = true;
		}
		
		if ($this->config->get('facebook_login_company_id') && !isset($user_info['company_id'])) {
			$show_extra_dialog = true;
		}		
		
		if ($this->config->get('facebook_login_tax_id') && !isset($user_info['tax_id'])) {
			$show_extra_dialog = true;
		}
		
		if ($this->config->get('facebook_login_address_1') && !isset($user_info['address_1'])) {
			$show_extra_dialog = true;
		}		
		
		if ($this->config->get('facebook_login_city') && !isset($user_info['city'])) {
			$show_extra_dialog = true;
		}	

		if ($this->config->get('facebook_login_postcode') && !isset($user_info['postcode'])) {
			$show_extra_dialog = true;
		}		
		
		if ($this->config->get('facebook_login_country_id') && !isset($user_info['country_id'])) {
			$show_extra_dialog = true;
		}	

		if ($this->config->get('facebook_login_zone_id') && !isset($user_info['zone_id'])) {
			$show_extra_dialog = true;
		}		
		
		return $show_extra_dialog;
	}
	
	public function country() {
		$json = array();
		
		$this->load->model('localisation/country');

    	$country_info = $this->model_localisation_country->getCountry($this->request->get['country_id']);
		
		if ($country_info) {
			$this->load->model('localisation/zone');

			$json = array(
				'country_id'        => $country_info['country_id'],
				'name'              => $country_info['name'],
				'iso_code_2'        => $country_info['iso_code_2'],
				'iso_code_3'        => $country_info['iso_code_3'],
				'address_format'    => $country_info['address_format'],
				'postcode_required' => $country_info['postcode_required'],
				'zone'              => $this->model_localisation_zone->getZonesByCountryId($this->request->get['country_id']),
				'status'            => $country_info['status']		
			);
		}
		
		$this->response->setOutput(json_encode($json));
	}
}
?>