<?php 
class ControllerToolmasspoptiupd extends Controller { 
	private $error = array();
	
	public function index() {
		
		if(version_compare(VERSION, '1.5.4.1', '>')) {
		$this->language->load('tool/masspoptiupd');
		} else {
    		$this->load->language('tool/masspoptiupd');
		}
		
		$this->document->addStyle('view/template/tool/masspoptiupd.css');

		$this->data['heading_title'] = $this->language->get('heading_title');
		
		// Filters
		$this->data['masstxt_p_filters_h'] = $this->language->get('masstxt_p_filters_h');
		$this->data['masstxt_name'] = $this->language->get('masstxt_name');
		$this->data['masstxt_name_help'] = $this->language->get('masstxt_name_help');
		$this->data['masstxt_model'] = $this->language->get('masstxt_model');
		$this->data['masstxt_model_help'] = $this->language->get('masstxt_model_help');
		$this->data['masstxt_tag'] = $this->language->get('masstxt_tag');
		$this->data['masstxt_tag_help'] = $this->language->get('masstxt_tag_help');
		$this->data['masstxt_categories'] = $this->language->get('masstxt_categories');
		$this->data['masstxt_manufacturers'] = $this->language->get('masstxt_manufacturers');
		$this->data['masstxt_price'] = $this->language->get('masstxt_price');
		$this->data['masstxt_price_help'] = $this->language->get('masstxt_price_help');
		$this->data['masstxt_discount'] = $this->language->get('masstxt_discount');
		$this->data['masstxt_customer_group'] = $this->language->get('masstxt_customer_group');
		$this->data['masstxt_special'] = $this->language->get('masstxt_special');
		$this->data['masstxt_tax_class'] = $this->language->get('masstxt_tax_class');
		$this->data['masstxt_quantity'] = $this->language->get('masstxt_quantity');
		$this->data['masstxt_minimum_quantity'] = $this->language->get('masstxt_minimum_quantity');
		$this->data['masstxt_subtract_stock'] = $this->language->get('masstxt_subtract_stock');
		$this->data['masstxt_out_of_stock_status'] = $this->language->get('masstxt_out_of_stock_status');
		$this->data['masstxt_requires_shipping'] = $this->language->get('masstxt_requires_shipping');
		$this->data['masstxt_date_available'] = $this->language->get('masstxt_date_available');
		$this->data['masstxt_date_added'] = $this->language->get('masstxt_date_added');
		$this->data['masstxt_date_modified'] = $this->language->get('masstxt_date_modified');
		$this->data['masstxt_status'] = $this->language->get('masstxt_status');
		$this->data['masstxt_store'] = $this->language->get('masstxt_store');
		$this->data['masstxt_with_attribute'] = $this->language->get('masstxt_with_attribute');
		$this->data['masstxt_with_attribute_value'] = $this->language->get('masstxt_with_attribute_value');
		$this->data['masstxt_with_attribute_value_help'] = $this->language->get('masstxt_with_attribute_value_help');
		$this->data['masstxt_with_this_option'] = $this->language->get('masstxt_with_this_option');
		$this->data['masstxt_with_this_option_value'] = $this->language->get('masstxt_with_this_option_value');
		$this->data['masstxt_filter_products_button'] = $this->language->get('masstxt_filter_products_button');
		$this->data['masstxt_table_name'] = $this->language->get('masstxt_table_name');
		$this->data['masstxt_table_model'] = $this->language->get('masstxt_table_model');
		$this->data['masstxt_table_price'] = $this->language->get('masstxt_table_price');
		$this->data['masstxt_table_quantity'] = $this->language->get('masstxt_table_quantity');
		$this->data['masstxt_table_status'] = $this->language->get('masstxt_table_status');
		$this->data['masstxt_max_prod_pag1'] = $this->language->get('masstxt_max_prod_pag1');
		$this->data['masstxt_max_prod_pag2'] = $this->language->get('masstxt_max_prod_pag2');
		$this->data['masstxt_show_page_of1'] = $this->language->get('masstxt_show_page_of1');
		$this->data['masstxt_show_page_of2'] = $this->language->get('masstxt_show_page_of2');
		$this->data['masstxt_total_prod_res'] = $this->language->get('masstxt_total_prod_res');
		$this->data['masstxt_prod_sel_for_upd'] = $this->language->get('masstxt_prod_sel_for_upd');
		
		$this->data['masstxt_yes'] = $this->language->get('masstxt_yes');
		$this->data['masstxt_no'] = $this->language->get('masstxt_no');
		$this->data['masstxt_enabled'] = $this->language->get('masstxt_enabled');
		$this->data['masstxt_disabled'] = $this->language->get('masstxt_disabled');
		$this->data['masstxt_select_all'] = $this->language->get('masstxt_select_all');
		$this->data['masstxt_unselect_all'] = $this->language->get('masstxt_unselect_all');
		$this->data['masstxt_none'] = $this->language->get('masstxt_none');
		$this->data['masstxt_all'] = $this->language->get('masstxt_all');
		$this->data['masstxt_default'] = $this->language->get('masstxt_default');
		$this->data['masstxt_unselect_all_to_ignore'] = $this->language->get('masstxt_unselect_all_to_ignore');
		$this->data['masstxt_ignore_this'] = $this->language->get('masstxt_ignore_this');
		$this->data['masstxt_leave_empty_to_ignore'] = $this->language->get('masstxt_leave_empty_to_ignore');
		$this->data['masstxt_greater_than_or_equal'] = $this->language->get('masstxt_greater_than_or_equal');
		$this->data['masstxt_less_than_or_equal'] = $this->language->get('masstxt_less_than_or_equal');
		
		// updates
		$this->data['masstxt_p_options_updates'] = $this->language->get('masstxt_p_options_updates');
		$this->data['masstxt_load_existing_options'] = $this->language->get('masstxt_load_existing_options');
		$this->data['masstxt_name_autocomplete'] = $this->language->get('masstxt_name_autocomplete');
		$this->data['masstxt_model_autocomplete'] = $this->language->get('masstxt_model_autocomplete');
		$this->data['masstxt_new_options'] = $this->language->get('masstxt_new_options');
		$this->data['masstxt_options_update_mode'] = $this->language->get('masstxt_options_update_mode');
		$this->data['masstxt_upd_mode_o_upd_add'] = $this->language->get('masstxt_upd_mode_o_upd_add');
		$this->data['masstxt_upd_mode_o_upd'] = $this->language->get('masstxt_upd_mode_o_upd');
		$this->data['masstxt_upd_mode_o_add'] = $this->language->get('masstxt_upd_mode_o_add');
		$this->data['masstxt_upd_mode_o_del_add'] = $this->language->get('masstxt_upd_mode_o_del_add');
		$this->data['masstxt_upd_mode_o_del_opt_and_val'] = $this->language->get('masstxt_upd_mode_o_del_opt_and_val');
		$this->data['masstxt_upd_mode_o_del_val'] = $this->language->get('masstxt_upd_mode_o_del_val');
		$this->data['masstxt_upd_mode_o_del'] = $this->language->get('masstxt_upd_mode_o_del');
		$this->data['masstxt_upd_mode_o_del_help'] = $this->language->get('masstxt_upd_mode_o_del_help');
		$this->data['masstxt_options_values_update_mode'] = $this->language->get('masstxt_options_values_update_mode');
		$this->data['masstxt_upd_mode_v_rep_add'] = $this->language->get('masstxt_upd_mode_v_rep_add');
		$this->data['masstxt_upd_mode_v_rep'] = $this->language->get('masstxt_upd_mode_v_rep');

		$this->data['masstxt_options_quantity_update_mode'] = $this->language->get('masstxt_options_quantity_update_mode');
		$this->data['masstxt_options_price_update_mode'] = $this->language->get('masstxt_options_price_update_mode');
		$this->data['masstxt_options_points_update_mode'] = $this->language->get('masstxt_options_points_update_mode');
		$this->data['masstxt_options_wgt_update_mode'] = $this->language->get('masstxt_options_wgt_update_mode');

		$this->data['masstxt_addition'] = $this->language->get('masstxt_addition');
		$this->data['masstxt_subtraction'] = $this->language->get('masstxt_subtraction');
		$this->data['masstxt_multiplication'] = $this->language->get('masstxt_multiplication');
		$this->data['masstxt_replacement'] = $this->language->get('masstxt_replacement');
		$this->data['masstxt_no_update'] = $this->language->get('masstxt_no_update');
		
		$this->data['masstxt_example1'] = $this->language->get('masstxt_example1');

		$this->data['masstxt_mass_update_button'] = $this->language->get('masstxt_mass_update_button');
		$this->data['masstxt_mass_update_button_help'] = $this->language->get('masstxt_mass_update_button_help');
		$this->data['masstxt_mass_update_button_top1'] = $this->language->get('masstxt_mass_update_button_top1');
		$this->data['masstxt_mass_update_button_top2'] = $this->language->get('masstxt_mass_update_button_top2');
		$this->data['masstxt_mass_update_button_top3'] = $this->language->get('masstxt_mass_update_button_top3');
		

		if(version_compare(VERSION, '1.5.4.1', '>')) {
		$this->language->load('catalog/product');
		} else {
		$this->load->language('catalog/product');
		}
		
		$this->data['text_enabled'] = $this->language->get('text_enabled');
    	$this->data['text_disabled'] = $this->language->get('text_disabled');
    	$this->data['text_none'] = $this->language->get('text_none');
    	$this->data['text_yes'] = $this->language->get('text_yes');
    	$this->data['text_no'] = $this->language->get('text_no');
		$this->data['text_select_all'] = $this->language->get('text_select_all');
		$this->data['text_unselect_all'] = $this->language->get('text_unselect_all');
		$this->data['text_plus'] = $this->language->get('text_plus');
		$this->data['text_minus'] = $this->language->get('text_minus');
		$this->data['text_default'] = $this->language->get('text_default');
		$this->data['text_image_manager'] = $this->language->get('text_image_manager');
		$this->data['text_browse'] = $this->language->get('text_browse');
		$this->data['text_clear'] = $this->language->get('text_clear');
		$this->data['text_option'] = $this->language->get('text_option');
		$this->data['text_option_value'] = $this->language->get('text_option_value');
		$this->data['text_select'] = $this->language->get('text_select');
		$this->data['text_none'] = $this->language->get('text_none');
		$this->data['text_percent'] = $this->language->get('text_percent');
		$this->data['text_amount'] = $this->language->get('text_amount');

		$this->data['entry_name'] = $this->language->get('entry_name');
		$this->data['entry_meta_description'] = $this->language->get('entry_meta_description');
		$this->data['entry_meta_keyword'] = $this->language->get('entry_meta_keyword');
		$this->data['entry_description'] = $this->language->get('entry_description');
		$this->data['entry_store'] = $this->language->get('entry_store');
		$this->data['entry_keyword'] = $this->language->get('entry_keyword');
    	$this->data['entry_model'] = $this->language->get('entry_model');
		$this->data['entry_sku'] = $this->language->get('entry_sku');
		$this->data['entry_upc'] = $this->language->get('entry_upc');
		$this->data['entry_ean'] = $this->language->get('entry_ean');
		$this->data['entry_jan'] = $this->language->get('entry_jan');
		$this->data['entry_isbn'] = $this->language->get('entry_isbn');
		$this->data['entry_mpn'] = $this->language->get('entry_mpn');
		$this->data['entry_location'] = $this->language->get('entry_location');
		$this->data['entry_minimum'] = $this->language->get('entry_minimum');
		$this->data['entry_manufacturer'] = $this->language->get('entry_manufacturer');
    	$this->data['entry_shipping'] = $this->language->get('entry_shipping');
    	$this->data['entry_date_available'] = $this->language->get('entry_date_available');
    	$this->data['entry_quantity'] = $this->language->get('entry_quantity');
		$this->data['entry_stock_status'] = $this->language->get('entry_stock_status');
    	$this->data['entry_price'] = $this->language->get('entry_price');
		$this->data['entry_tax_class'] = $this->language->get('entry_tax_class');
		$this->data['entry_points'] = $this->language->get('entry_points');
		$this->data['entry_option_points'] = $this->language->get('entry_option_points');
		$this->data['entry_subtract'] = $this->language->get('entry_subtract');
    	$this->data['entry_weight_class'] = $this->language->get('entry_weight_class');
    	$this->data['entry_weight'] = $this->language->get('entry_weight');
		$this->data['entry_dimension'] = $this->language->get('entry_dimension');
		$this->data['entry_length'] = $this->language->get('entry_length');
    	$this->data['entry_image'] = $this->language->get('entry_image');
    	$this->data['entry_download'] = $this->language->get('entry_download');
    	$this->data['entry_category'] = $this->language->get('entry_category');
		$this->data['entry_related'] = $this->language->get('entry_related');
		$this->data['entry_attribute'] = $this->language->get('entry_attribute');
		$this->data['entry_text'] = $this->language->get('entry_text');
		$this->data['entry_option'] = $this->language->get('entry_option');
		$this->data['entry_option_value'] = $this->language->get('entry_option_value');
		$this->data['entry_required'] = $this->language->get('entry_required');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_customer_group'] = $this->language->get('entry_customer_group');
		$this->data['entry_date_start'] = $this->language->get('entry_date_start');
		$this->data['entry_date_end'] = $this->language->get('entry_date_end');
		$this->data['entry_priority'] = $this->language->get('entry_priority');
		$this->data['entry_tag'] = $this->language->get('entry_tag');
		$this->data['entry_customer_group'] = $this->language->get('entry_customer_group');
		$this->data['entry_reward'] = $this->language->get('entry_reward');
		$this->data['entry_layout'] = $this->language->get('entry_layout');
				
    	$this->data['button_save'] = $this->language->get('button_save');
    	$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_attribute'] = $this->language->get('button_add_attribute');
		$this->data['button_add_option'] = $this->language->get('button_add_option');
		$this->data['button_add_option_value'] = $this->language->get('button_add_option_value');
		$this->data['button_add_discount'] = $this->language->get('button_add_discount');
		$this->data['button_add_special'] = $this->language->get('button_add_special');
		$this->data['button_add_image'] = $this->language->get('button_add_image');
		$this->data['button_remove'] = $this->language->get('button_remove');
		
    	$this->data['tab_general'] = $this->language->get('tab_general');
    	$this->data['tab_data'] = $this->language->get('tab_data');
		$this->data['tab_attribute'] = $this->language->get('tab_attribute');
		$this->data['tab_option'] = $this->language->get('tab_option');		
		$this->data['tab_discount'] = $this->language->get('tab_discount');
		$this->data['tab_special'] = $this->language->get('tab_special');
    	$this->data['tab_image'] = $this->language->get('tab_image');		
		$this->data['tab_links'] = $this->language->get('tab_links');
		$this->data['tab_reward'] = $this->language->get('tab_reward');
		$this->data['tab_design'] = $this->language->get('tab_design');
		
		if(version_compare(VERSION, '1.5.4.1', '>')) {
		$this->language->load('catalog/option');
		} else {
		$this->load->language('catalog/option');
		}
		
		$this->data['text_choose'] = $this->language->get('text_choose');
		$this->data['text_select'] = $this->language->get('text_select');
		$this->data['text_radio'] = $this->language->get('text_radio');
		$this->data['text_checkbox'] = $this->language->get('text_checkbox');
		$this->data['text_image'] = $this->language->get('text_image');
		$this->data['text_input'] = $this->language->get('text_input');
		$this->data['text_text'] = $this->language->get('text_text');
		$this->data['text_textarea'] = $this->language->get('text_textarea');
		$this->data['text_file'] = $this->language->get('text_file');
		$this->data['text_date'] = $this->language->get('text_date');
		$this->data['text_datetime'] = $this->language->get('text_datetime');
		$this->data['text_time'] = $this->language->get('text_time');
		$this->data['text_image_manager'] = $this->language->get('text_image_manager');
		$this->data['text_browse'] = $this->language->get('text_browse');
		$this->data['text_clear'] = $this->language->get('text_clear');	
		
		$this->data['entry_name'] = $this->language->get('entry_name');
		$this->data['entry_type'] = $this->language->get('entry_type');
		$this->data['entry_value'] = $this->language->get('entry_value');
		$this->data['entry_image'] = $this->language->get('entry_image');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');

		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_option_value'] = $this->language->get('button_add_option_value');
		$this->data['button_remove'] = $this->language->get('button_remove');

		$this->data['tab_general'] = $this->language->get('tab_general');
		
				
		
		
		$this->document->setTitle($this->data['heading_title']);
		
		$this->load->model('catalog/category');
		
		$this->load->model('catalog/manufacturer');
		
		$this->load->model('localisation/tax_class');
		
		$this->load->model('localisation/stock_status');
		
		$this->load->model('localisation/language');
		
		$this->load->model('catalog/attribute');
		
		$this->load->model('setting/store');
		
		$this->load->model('sale/customer_group');
		
		if(version_compare(VERSION, '1.5.4.1', '>')) {
		$this->data['masstxt_p_filters'] = $this->language->get('masstxt_p_filters');
		$this->data['masstxt_p_filters_none'] = $this->language->get('masstxt_p_filters_none');
		
		$sql = "SELECT f.filter_id AS `filter_id`, fd.name AS `name`, fgd.name AS `group` FROM " . DB_PREFIX . "filter f 
		LEFT JOIN " . DB_PREFIX . "filter_description fd ON (f.filter_id = fd.filter_id) 
		LEFT JOIN " . DB_PREFIX . "filter_group_description fgd ON (f.filter_group_id = fgd.filter_group_id) 
		LEFT JOIN " . DB_PREFIX . "filter_group fg ON (f.filter_group_id = fg.filter_group_id) 
		WHERE fd.language_id = '" . (int)$this->config->get('config_language_id') . "' 
		AND fgd.language_id = '" . (int)$this->config->get('config_language_id') . "'";
		$sql .= " ORDER BY fg.sort_order, fgd.name, f.sort_order, fd.name";
		$query_pf = $this->db->query($sql);
		$this->data['p_filters'] = $query_pf->rows;

		if (isset($this->request->post['filters_ids'])) {
			$this->data['filters_ids'] = $this->request->post['filters_ids'];
		} else {
			$this->data['filters_ids'] = array();
		}
		}
		
		$this->data['customer_groups'] = $this->model_sale_customer_group->getCustomerGroups();
		
		$this->data['categories'] = $this->model_catalog_category->getCategories(0);
		if (isset($this->request->post['product_category'])) {
			$this->data['product_category'] = $this->request->post['product_category'];
		} else {
			$this->data['product_category'] = array();
		}
		
		$this->data['manufacturers'] = $this->model_catalog_manufacturer->getManufacturers();
		if (isset($this->request->post['manufacturer_ids'])) {
      			$this->data['manufacturer_ids'] = $this->request->post['manufacturer_ids'];
		} else {
      			$this->data['manufacturer_ids'] = array();
    		}
		
		$this->data['tax_classes'] = $this->model_localisation_tax_class->getTaxClasses();
		
		$this->data['stock_statuses'] = $this->model_localisation_stock_status->getStockStatuses();
		
		$this->data['languages'] = $this->model_localisation_language->getLanguages();
		
		$this->data['all_attributes'] = $this->model_catalog_attribute->getAttributes();
		
		$this->data['stores'] = $this->model_setting_store->getStores();
		
		// all options names + id-s for filter
		$query_all_options = $this->db->query("SELECT od.option_id, od.name FROM " . DB_PREFIX . "option_description od 
		WHERE od.language_id = '" . (int)$this->config->get('config_language_id') . "'
		ORDER BY od.name");
		$this->data['all_options'] = $query_all_options->rows;
		
		// all options values + id-s for filter
		$query_all_optval = $this->db->query("SELECT ovd.option_value_id, ovd.name AS ov_name, od.name AS o_name 
		FROM " . DB_PREFIX . "option_value_description ovd 
		LEFT JOIN " . DB_PREFIX . "option_description od ON (ovd.option_id = od.option_id) 
		WHERE ovd.language_id = '" . (int)$this->config->get('config_language_id') . "' GROUP BY ovd.option_value_id ORDER BY od.name, ovd.name");
		$this->data['all_optval'] = $query_all_optval->rows;
		
		///
		$this->load->model('catalog/option');
		
		if (isset($this->request->post['load_product_options']) AND isset($this->request->post['product_id_to_options'])) { // load options
			//$this->load->model('catalog/product');
			//$product_options = $this->model_catalog_product->getProductOptions($this->request->post['product_id_to_options']);	
		
		$product_option_data = array();
		
		$product_option_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option po LEFT JOIN `" . DB_PREFIX . "option` o ON (po.option_id = o.option_id) LEFT JOIN " . DB_PREFIX . "option_description od ON (o.option_id = od.option_id) WHERE po.product_id = '" . (int)$this->request->post['product_id_to_options'] . "' AND od.language_id = '" . (int)$this->config->get('config_language_id') . "'");
		
		foreach ($product_option_query->rows as $product_option) {
			if ($product_option['type'] == 'select' || $product_option['type'] == 'radio' || $product_option['type'] == 'checkbox' || $product_option['type'] == 'image') {
				$product_option_value_data = array();	
				
				$product_option_value_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option_value pov LEFT JOIN " . DB_PREFIX . "option_value ov ON (pov.option_value_id = ov.option_value_id) LEFT JOIN " . DB_PREFIX . "option_value_description ovd ON (ov.option_value_id = ovd.option_value_id) WHERE pov.product_option_id = '" . (int)$product_option['product_option_id'] . "' AND ovd.language_id = '" . (int)$this->config->get('config_language_id') . "'");
				
				foreach ($product_option_value_query->rows as $product_option_value) {
					$product_option_value_data[] = array(
						'product_option_value_id' => $product_option_value['product_option_value_id'],
						'option_value_id'         => $product_option_value['option_value_id'],
						'name'                    => $product_option_value['name'],
						'image'                   => $product_option_value['image'],
						'quantity'                => $product_option_value['quantity'],
						'subtract'                => $product_option_value['subtract'],
						'price'                   => $product_option_value['price'],
						'price_prefix'            => $product_option_value['price_prefix'],
						'points'                  => $product_option_value['points'],
						'points_prefix'           => $product_option_value['points_prefix'],						
						'weight'                  => $product_option_value['weight'],
						'weight_prefix'           => $product_option_value['weight_prefix']					
					);
				}
				
				$product_option_data[] = array(
					'product_option_id'    => $product_option['product_option_id'],
					'option_id'            => $product_option['option_id'],
					'name'                 => $product_option['name'],
					'type'                 => $product_option['type'],
					'product_option_value' => $product_option_value_data,
					'required'             => $product_option['required']
				);				
			} else {
				$product_option_data[] = array(
					'product_option_id' => $product_option['product_option_id'],
					'option_id'         => $product_option['option_id'],
					'name'              => $product_option['name'],
					'type'              => $product_option['type'],
					'option_value'      => $product_option['option_value'],
					'required'          => $product_option['required']
				);				
			}
		}	
		
		$product_options = $product_option_data;
		
		} elseif (isset($this->request->post['product_option'])) {
			$product_options = $this->request->post['product_option'];
		} else {
			$product_options = array();
		}			
		
		$this->data['product_options'] = array();
			
		foreach ($product_options as $product_option) {
			if ($product_option['type'] == 'select' || $product_option['type'] == 'radio' || $product_option['type'] == 'checkbox' || $product_option['type'] == 'image') {
				$product_option_value_data = array();
				
				if (isset($product_option['product_option_value'])) {
				foreach ($product_option['product_option_value'] as $product_option_value) {
					$product_option_value_data[] = array(
						'product_option_value_id' => $product_option_value['product_option_value_id'],
						'option_value_id'         => $product_option_value['option_value_id'],
						'quantity'                => $product_option_value['quantity'],
						'subtract'                => $product_option_value['subtract'],
						'price'                   => $product_option_value['price'],
						'price_prefix'            => $product_option_value['price_prefix'],
						'points'                  => $product_option_value['points'],
						'points_prefix'           => $product_option_value['points_prefix'],						
						'weight'                  => $product_option_value['weight'],
						'weight_prefix'           => $product_option_value['weight_prefix']	
					);						
				}
				}
				
				$this->data['product_options'][] = array(
					'product_option_id'    => $product_option['product_option_id'],
					'product_option_value' => $product_option_value_data,
					'option_id'            => $product_option['option_id'],
					'name'                 => $product_option['name'],
					'type'                 => $product_option['type'],
					'required'             => $product_option['required']
				);				
			} else {
				$this->data['product_options'][] = array(
					'product_option_id' => $product_option['product_option_id'],
					'option_id'         => $product_option['option_id'],
					'name'              => $product_option['name'],
					'type'              => $product_option['type'],
					'option_value'      => $product_option['option_value'],
					'required'          => $product_option['required']
				);				
			}
		}
		
		$this->data['option_values'] = array();
		
		foreach ($product_options as $product_option) {
			if ($product_option['type'] == 'select' || $product_option['type'] == 'radio' || $product_option['type'] == 'checkbox' || $product_option['type'] == 'image') {
				if (!isset($this->data['option_values'][$product_option['option_id']])) {
					$this->data['option_values'][$product_option['option_id']] = $this->model_catalog_option->getOptionValues($product_option['option_id']);
				}
			}
		}
		///
		
		////
		
		if (isset($this->request->post['price_mmarese'])) {
      			$this->data['price_mmarese'] = $this->request->post['price_mmarese'];
		} else {
      			$this->data['price_mmarese'] = '';
    		}

		if (isset($this->request->post['price_mmicse'])) {
      			$this->data['price_mmicse'] = $this->request->post['price_mmicse'];
		} else {
      			$this->data['price_mmicse'] = '';
    		}

		if (isset($this->request->post['d_cust_group_filter'])) {
      			$this->data['d_cust_group_filter'] = $this->request->post['d_cust_group_filter'];
		} else {
      			$this->data['d_cust_group_filter'] = 'any';
    		}
		
		if (isset($this->request->post['s_cust_group_filter'])) {
      			$this->data['s_cust_group_filter'] = $this->request->post['s_cust_group_filter'];
		} else {
      			$this->data['s_cust_group_filter'] = 'any';
    		}

		if (isset($this->request->post['d_price_mmarese'])) {
      			$this->data['d_price_mmarese'] = $this->request->post['d_price_mmarese'];
		} else {
      			$this->data['d_price_mmarese'] = '';
    		}

		if (isset($this->request->post['d_price_mmicse'])) {
      			$this->data['d_price_mmicse'] = $this->request->post['d_price_mmicse'];
		} else {
      			$this->data['d_price_mmicse'] = '';
    		}

		if (isset($this->request->post['s_price_mmarese'])) {
      			$this->data['s_price_mmarese'] = $this->request->post['s_price_mmarese'];
		} else {
      			$this->data['s_price_mmarese'] = '';
    		}

		if (isset($this->request->post['s_price_mmicse'])) {
      			$this->data['s_price_mmicse'] = $this->request->post['s_price_mmicse'];
		} else {
      			$this->data['s_price_mmicse'] = '';
    		}

		if (isset($this->request->post['tax_class_filter'])) {
      			$this->data['tax_class_filter'] = $this->request->post['tax_class_filter'];
		} else {
      			$this->data['tax_class_filter'] = 'any';
    		}

		if (isset($this->request->post['stock_mmarese'])) {
      			$this->data['stock_mmarese'] = $this->request->post['stock_mmarese'];
		} else {
      			$this->data['stock_mmarese'] = '';
    		}

		if (isset($this->request->post['stock_mmicse'])) {
      			$this->data['stock_mmicse'] = $this->request->post['stock_mmicse'];
		} else {
      			$this->data['stock_mmicse'] = '';
    		}

		if (isset($this->request->post['min_q_mmarese'])) {
      			$this->data['min_q_mmarese'] = $this->request->post['min_q_mmarese'];
		} else {
      			$this->data['min_q_mmarese'] = '';
    		}

		if (isset($this->request->post['min_q_mmicse'])) {
      			$this->data['min_q_mmicse'] = $this->request->post['min_q_mmicse'];
		} else {
      			$this->data['min_q_mmicse'] = '';
    		}

		if (isset($this->request->post['subtract_filter'])) {
      			$this->data['subtract_filter'] = $this->request->post['subtract_filter'];
		} else {
      			$this->data['subtract_filter'] = 'any';
    		}

		if (isset($this->request->post['stock_status_filter'])) {
      			$this->data['stock_status_filter'] = $this->request->post['stock_status_filter'];
		} else {
      			$this->data['stock_status_filter'] = 'any';
    		}

		if (isset($this->request->post['shipping_filter'])) {
      			$this->data['shipping_filter'] = $this->request->post['shipping_filter'];
		} else {
      			$this->data['shipping_filter'] = 'any';
    		}

		if (isset($this->request->post['date_mmarese'])) {
      			$this->data['date_mmarese'] = $this->request->post['date_mmarese'];
		} else {
      			$this->data['date_mmarese'] = '';
    		}

		if (isset($this->request->post['date_mmicse'])) {
      			$this->data['date_mmicse'] = $this->request->post['date_mmicse'];
		} else {
      			$this->data['date_mmicse'] = '';
    		}

		if (isset($this->request->post['date_added_mmarese'])) {
      			$this->data['date_added_mmarese'] = $this->request->post['date_added_mmarese'];
		} else {
      			$this->data['date_added_mmarese'] = '';
    		}

		if (isset($this->request->post['date_added_mmicse'])) {
      			$this->data['date_added_mmicse'] = $this->request->post['date_added_mmicse'];
		} else {
      			$this->data['date_added_mmicse'] = '';
    		}
    		
    		if (isset($this->request->post['date_modified_mmarese'])) {
      			$this->data['date_modified_mmarese'] = $this->request->post['date_modified_mmarese'];
		} else {
      			$this->data['date_modified_mmarese'] = '';
    		}

		if (isset($this->request->post['date_modified_mmicse'])) {
      			$this->data['date_modified_mmicse'] = $this->request->post['date_modified_mmicse'];
		} else {
      			$this->data['date_modified_mmicse'] = '';
    		}

		if (isset($this->request->post['prod_status'])) {
      			$this->data['prod_status'] = $this->request->post['prod_status'];
		} else {
      			$this->data['prod_status'] = 'any';
    		}

    		if (isset($this->request->post['store_filter'])) {
      			$this->data['store_filter'] = $this->request->post['store_filter'];
		} else {
      			$this->data['store_filter'] = 'any';
    		}

		if (isset($this->request->post['filter_attr'])) {
      			$this->data['filter_attr'] = $this->request->post['filter_attr'];
		} else {
      			$this->data['filter_attr'] = 'any';
    		}
    		
		if (isset($this->request->post['filter_opti'])) {
      			$this->data['filter_opti'] = $this->request->post['filter_opti'];
		} else {
      			$this->data['filter_opti'] = 'any';
    		}
    		
    		if (isset($this->request->post['filter_attr_val'])) {
      			$this->data['filter_attr_val'] = $this->request->post['filter_attr_val'];
		} else {
      			$this->data['filter_attr_val'] = '';
    		}
    		
    		if (isset($this->request->post['filter_opti_val'])) {
      			$this->data['filter_opti_val'] = $this->request->post['filter_opti_val'];
		} else {
      			$this->data['filter_opti_val'] = 'any';
    		}

    		if (isset($this->request->post['filter_name'])) {
      			$this->data['filter_name'] = $this->request->post['filter_name'];
		} else {
      			$this->data['filter_name'] = '';
    		}
    		
    		if (isset($this->request->post['filter_namex'])) {
      			$this->data['filter_namex'] = $this->request->post['filter_namex'];
		} else {
      			$this->data['filter_namex'] = '';
    		}

    		if (isset($this->request->post['filter_modelx'])) {
      			$this->data['filter_modelx'] = $this->request->post['filter_modelx'];
		} else {
      			$this->data['filter_modelx'] = '';
    		}
    		
     		if (isset($this->request->post['product_id_to_options'])) {
      			$this->data['product_id_to_options'] = $this->request->post['product_id_to_options'];
		} else {
      			$this->data['product_id_to_options'] = '';
    		}   		
    		
    		if (isset($this->request->post['filter_model'])) {
      			$this->data['filter_model'] = $this->request->post['filter_model'];
		} else {
      			$this->data['filter_model'] = '';
    		}
    		
    		if (isset($this->request->post['filter_tag'])) {
      			$this->data['filter_tag'] = $this->request->post['filter_tag'];
		} else {
      			$this->data['filter_tag'] = '';
    		}
    		
    		////
    		
    		if (isset($this->request->post['opt_upd_mode'])) {
      			$this->data['opt_upd_mode'] = $this->request->post['opt_upd_mode'];
		} else {
      			$this->data['opt_upd_mode'] = 'o_upd_add';
    		}

    		if (isset($this->request->post['val_upd_mode'])) {
      			$this->data['val_upd_mode'] = $this->request->post['val_upd_mode'];
		} else {
      			$this->data['val_upd_mode'] = 'v_rep_add';
    		}
    		
    		if (isset($this->request->post['qty_upd_mode'])) {
      			$this->data['qty_upd_mode'] = $this->request->post['qty_upd_mode'];
		} else {
      			$this->data['qty_upd_mode'] = 're';
    		}
    		
    		if (isset($this->request->post['price_upd_mode'])) {
      			$this->data['price_upd_mode'] = $this->request->post['price_upd_mode'];
		} else {
      			$this->data['price_upd_mode'] = 're';
    		}
    		
    		if (isset($this->request->post['points_upd_mode'])) {
      			$this->data['points_upd_mode'] = $this->request->post['points_upd_mode'];
		} else {
      			$this->data['points_upd_mode'] = 're';
    		}
    		
    		if (isset($this->request->post['wgt_upd_mode'])) {
      			$this->data['wgt_upd_mode'] = $this->request->post['wgt_upd_mode'];
		} else {
      			$this->data['wgt_upd_mode'] = 're';
    		}

    		////


if (isset($this->request->post['load_product_options'])) { /// load product option button

$this->session->data['success'] = $this->language->get('masstxt_succes_options_loaded');

} /// end load product option button


if (isset($this->request->post['mass_update'])) { /// update button

if ($this->user->hasPermission('modify', 'tool/masspoptiupd')) { /// modify permision

if (isset($this->request->post['selected'])) { /// avem produse selectate

if ($this->request->post['opt_upd_mode']=='o_del' OR (isset($this->request->post['product_option']))) { /// avem options update

if (isset($this->request->post['product_option'])) { $data['product_option']=$this->request->post['product_option']; }

foreach ($this->request->post['selected'] as $product_id) { /// scanare produse

if ($this->request->post['opt_upd_mode']=="o_upd_add" OR $this->request->post['opt_upd_mode']=="o_upd") { /// update mode (cu replace)

		if (isset($data['product_option'])) {
			
			foreach ($data['product_option'] as $product_option) {

			// find existing option:
			$query = $this->db->query("SELECT product_option_id FROM " . DB_PREFIX . "product_option WHERE product_id = '" . (int)$product_id . "' AND option_id = '" . (int)$product_option['option_id'] . "'");
			$existing_options = array();
			$existing_options = $query->rows;
			
			if (count($existing_options)>0) { // optiune existenta -> update
			
			foreach ($existing_options as $existing_opt) {
			
				if ($product_option['type'] == 'select' || $product_option['type'] == 'radio' || $product_option['type'] == 'checkbox' || $product_option['type'] == 'image') {
					$this->db->query("UPDATE " . DB_PREFIX . "product_option SET required = '" . (int)$product_option['required'] . "' WHERE product_option_id = '" . (int)$existing_opt['product_option_id'] . "'");
				
					$product_option_id = $existing_opt['product_option_id'];
					
				
					if (isset($product_option['product_option_value'])) {
						foreach ($product_option['product_option_value'] as $product_option_value) {
							
							
						// find existing value:
						$query = $this->db->query("SELECT product_option_value_id FROM " . DB_PREFIX . "product_option_value WHERE product_option_id = '" . (int)$product_option_id . "' AND product_id = '" . (int)$product_id . "' AND option_id = '" . (int)$product_option['option_id'] . "' AND option_value_id = '" . (int)$product_option_value['option_value_id'] . "'");
						$existing_values = array();
						$existing_values = $query->rows;
						
						if (count($existing_values)>0) { // valoare existenta -> update


switch ($this->request->post['qty_upd_mode']) {
    case "re":
        $quantity_sql=" quantity = '" . (int)$product_option_value['quantity'] . "',";
        break;
    case "mu":
        $quantity_sql=" quantity = (quantity * '" . (float)$product_option_value['quantity'] . "'),";
        break;
    case "ad":
        $quantity_sql=" quantity = (quantity + '" . (int)$product_option_value['quantity'] . "'),";
        break;
    case "su":
        $quantity_sql=" quantity = (quantity - '" . (int)$product_option_value['quantity'] . "'),";
        break;
    case "no":
        $quantity_sql="";
        break;
}
switch ($this->request->post['price_upd_mode']) {
    case "re":
        $price_sql=" price = '" . (float)$product_option_value['price'] . "',";
        break;
    case "mu":
        $price_sql=" price = (price * '" . (float)$product_option_value['price'] . "'),";
        break;
    case "ad":
        $price_sql=" price = (price + '" . (float)$product_option_value['price'] . "'),";
        break;
    case "su":
        $price_sql=" price = (price - '" . (float)$product_option_value['price'] . "'),";
        break;
    case "no":
        $price_sql="";
        break;
}
switch ($this->request->post['points_upd_mode']) {
    case "re":
        $points_sql=" points = '" . (int)$product_option_value['points'] . "',";
        break;
    case "mu":
        $points_sql=" points = (points * '" . (float)$product_option_value['points'] . "'),";
        break;
    case "ad":
        $points_sql=" points = (points + '" . (int)$product_option_value['points'] . "'),";
        break;
    case "su":
        $points_sql=" points = (points - '" . (int)$product_option_value['points'] . "'),";
        break;
    case "no":
        $points_sql="";
        break;
}
switch ($this->request->post['wgt_upd_mode']) {
    case "re":
        $weight_sql=" weight = '" . (float)$product_option_value['weight'] . "',";
        break;
    case "mu":
        $weight_sql=" weight = (weight * '" . (float)$product_option_value['weight'] . "'),";
        break;
    case "ad":
        $weight_sql=" weight = (weight + '" . (float)$product_option_value['weight'] . "'),";
        break;
    case "su":
        $weight_sql=" weight = (weight - '" . (float)$product_option_value['weight'] . "'),";
        break;
    case "no":
        $weight_sql="";
        break;
}

$this->db->query("UPDATE " . DB_PREFIX . "product_option_value SET".$quantity_sql." subtract = '" . (int)$product_option_value['subtract'] . "',".$price_sql." price_prefix = '" . $this->db->escape($product_option_value['price_prefix']) . "',".$points_sql." points_prefix = '" . $this->db->escape($product_option_value['points_prefix']) . "',".$weight_sql." weight_prefix = '" . $this->db->escape($product_option_value['weight_prefix']) . "' WHERE product_option_id = '" . (int)$product_option_id . "' AND product_id = '" . (int)$product_id . "' AND option_id = '" . (int)$product_option['option_id'] . "' AND option_value_id = '" . (int)$product_option_value['option_value_id'] . "'");

						} else { // valoare inexistenta -> insert
						if ($this->request->post['val_upd_mode']=="v_rep_add") { // only if set to add new
						
$this->db->query("INSERT INTO " . DB_PREFIX . "product_option_value SET product_option_value_id = '" . (int)$product_option_value['product_option_value_id'] . "', product_option_id = '" . (int)$product_option_id . "', product_id = '" . (int)$product_id . "', option_id = '" . (int)$product_option['option_id'] . "', option_value_id = '" . (int)$product_option_value['option_value_id'] . "', quantity = '" . (int)$product_option_value['quantity'] . "', subtract = '" . (int)$product_option_value['subtract'] . "', price = '" . (float)$product_option_value['price'] . "', price_prefix = '" . $this->db->escape($product_option_value['price_prefix']) . "', points = '" . (int)$product_option_value['points'] . "', points_prefix = '" . $this->db->escape($product_option_value['points_prefix']) . "', weight = '" . (float)$product_option_value['weight'] . "', weight_prefix = '" . $this->db->escape($product_option_value['weight_prefix']) . "'");
						}
						}
						
						}
					}
					
				} else { 
					$this->db->query("UPDATE " . DB_PREFIX . "product_option SET option_value = '" . $this->db->escape($product_option['option_value']) . "', required = '" . (int)$product_option['required'] . "' WHERE product_option_id = '" . (int)$existing_opt['product_option_id'] . "'");
				}

			} // end foreach optiuni existente
			
			
			} elseif ($this->request->post['opt_upd_mode']=="o_upd_add") { // optiune inexistenta -> insert (only if set to add new)
			
				if ($product_option['type'] == 'select' || $product_option['type'] == 'radio' || $product_option['type'] == 'checkbox' || $product_option['type'] == 'image') {
					$this->db->query("INSERT INTO " . DB_PREFIX . "product_option SET product_option_id = '" . (int)$product_option['product_option_id'] . "', product_id = '" . (int)$product_id . "', option_id = '" . (int)$product_option['option_id'] . "', required = '" . (int)$product_option['required'] . "'");
					$product_option_id = $this->db->getLastId();
				
					if (isset($product_option['product_option_value']) AND $this->request->post['val_upd_mode']=="v_rep_add") { // only if set to add new values
						foreach ($product_option['product_option_value'] as $product_option_value) {
$this->db->query("INSERT INTO " . DB_PREFIX . "product_option_value SET product_option_value_id = '" . (int)$product_option_value['product_option_value_id'] . "', product_option_id = '" . (int)$product_option_id . "', product_id = '" . (int)$product_id . "', option_id = '" . (int)$product_option['option_id'] . "', option_value_id = '" . (int)$product_option_value['option_value_id'] . "', quantity = '" . (int)$product_option_value['quantity'] . "', subtract = '" . (int)$product_option_value['subtract'] . "', price = '" . (float)$product_option_value['price'] . "', price_prefix = '" . $this->db->escape($product_option_value['price_prefix']) . "', points = '" . (int)$product_option_value['points'] . "', points_prefix = '" . $this->db->escape($product_option_value['points_prefix']) . "', weight = '" . (float)$product_option_value['weight'] . "', weight_prefix = '" . $this->db->escape($product_option_value['weight_prefix']) . "'");
						}
					}
				} else { 
					$this->db->query("INSERT INTO " . DB_PREFIX . "product_option SET product_option_id = '" . (int)$product_option['product_option_id'] . "', product_id = '" . (int)$product_id . "', option_id = '" . (int)$product_option['option_id'] . "', option_value = '" . $this->db->escape($product_option['option_value']) . "', required = '" . (int)$product_option['required'] . "'");
				}
					
			}
			}
		}

} else {

switch ($this->request->post['opt_upd_mode']) { /// update mode (fara replace)

    case "o_add": // keep old options and add new
		if (isset($data['product_option'])) {
			foreach ($data['product_option'] as $product_option) {
				if ($product_option['type'] == 'select' || $product_option['type'] == 'radio' || $product_option['type'] == 'checkbox' || $product_option['type'] == 'image') {
					$this->db->query("INSERT INTO " . DB_PREFIX . "product_option SET product_option_id = '" . (int)$product_option['product_option_id'] . "', product_id = '" . (int)$product_id . "', option_id = '" . (int)$product_option['option_id'] . "', required = '" . (int)$product_option['required'] . "'");
				
					$product_option_id = $this->db->getLastId();
				
					if (isset($product_option['product_option_value'])) {
						foreach ($product_option['product_option_value'] as $product_option_value) {
$this->db->query("INSERT INTO " . DB_PREFIX . "product_option_value SET product_option_value_id = '" . (int)$product_option_value['product_option_value_id'] . "', product_option_id = '" . (int)$product_option_id . "', product_id = '" . (int)$product_id . "', option_id = '" . (int)$product_option['option_id'] . "', option_value_id = '" . (int)$product_option_value['option_value_id'] . "', quantity = '" . (int)$product_option_value['quantity'] . "', subtract = '" . (int)$product_option_value['subtract'] . "', price = '" . (float)$product_option_value['price'] . "', price_prefix = '" . $this->db->escape($product_option_value['price_prefix']) . "', points = '" . (int)$product_option_value['points'] . "', points_prefix = '" . $this->db->escape($product_option_value['points_prefix']) . "', weight = '" . (float)$product_option_value['weight'] . "', weight_prefix = '" . $this->db->escape($product_option_value['weight_prefix']) . "'");
						}
					}
				} else { 
					$this->db->query("INSERT INTO " . DB_PREFIX . "product_option SET product_option_id = '" . (int)$product_option['product_option_id'] . "', product_id = '" . (int)$product_id . "', option_id = '" . (int)$product_option['option_id'] . "', option_value = '" . $this->db->escape($product_option['option_value']) . "', required = '" . (int)$product_option['required'] . "'");
				}					
			}
		}
        break;
    
    case "o_del_add": // remove old options and add new
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_option WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_option_value WHERE product_id = '" . (int)$product_id . "'");
		
		if (isset($data['product_option'])) {
			foreach ($data['product_option'] as $product_option) {
				if ($product_option['type'] == 'select' || $product_option['type'] == 'radio' || $product_option['type'] == 'checkbox' || $product_option['type'] == 'image') {
					$this->db->query("INSERT INTO " . DB_PREFIX . "product_option SET product_option_id = '" . (int)$product_option['product_option_id'] . "', product_id = '" . (int)$product_id . "', option_id = '" . (int)$product_option['option_id'] . "', required = '" . (int)$product_option['required'] . "'");
				
					$product_option_id = $this->db->getLastId();
				
					if (isset($product_option['product_option_value'])) {
						foreach ($product_option['product_option_value'] as $product_option_value) {
$this->db->query("INSERT INTO " . DB_PREFIX . "product_option_value SET product_option_value_id = '" . (int)$product_option_value['product_option_value_id'] . "', product_option_id = '" . (int)$product_option_id . "', product_id = '" . (int)$product_id . "', option_id = '" . (int)$product_option['option_id'] . "', option_value_id = '" . (int)$product_option_value['option_value_id'] . "', quantity = '" . (int)$product_option_value['quantity'] . "', subtract = '" . (int)$product_option_value['subtract'] . "', price = '" . (float)$product_option_value['price'] . "', price_prefix = '" . $this->db->escape($product_option_value['price_prefix']) . "', points = '" . (int)$product_option_value['points'] . "', points_prefix = '" . $this->db->escape($product_option_value['points_prefix']) . "', weight = '" . (float)$product_option_value['weight'] . "', weight_prefix = '" . $this->db->escape($product_option_value['weight_prefix']) . "'");
						}
					}
				} else { 
					$this->db->query("INSERT INTO " . DB_PREFIX . "product_option SET product_option_id = '" . (int)$product_option['product_option_id'] . "', product_id = '" . (int)$product_id . "', option_id = '" . (int)$product_option['option_id'] . "', option_value = '" . $this->db->escape($product_option['option_value']) . "', required = '" . (int)$product_option['required'] . "'");
				}					
			}
		}
        break;

    case "o_del_opt_and_val": // Remove existing found options and all its values (values for update does not matter)

		if (isset($data['product_option'])) {
			
			foreach ($data['product_option'] as $product_option) {

			// find existing option:
			$query = $this->db->query("SELECT product_option_id FROM " . DB_PREFIX . "product_option WHERE product_id = '" . (int)$product_id . "' AND option_id = '" . (int)$product_option['option_id'] . "'");
			$existing_options = array();
			$existing_options = $query->rows;

			if (count($existing_options)>0) { // avem optiuni existente
			
			// Remove existing option:
			$this->db->query("DELETE FROM " . DB_PREFIX . "product_option WHERE product_id = '" . (int)$product_id . "' AND option_id = '" . (int)$product_option['option_id'] . "'");
			
			foreach ($existing_options as $existing_opt) {
			
				if ($product_option['type'] == 'select' || $product_option['type'] == 'radio' || $product_option['type'] == 'checkbox' || $product_option['type'] == 'image') {
					$product_option_id = $existing_opt['product_option_id'];
					if (isset($product_option['product_option_value'])) {
						foreach ($product_option['product_option_value'] as $product_option_value) {
						// Remove all values for existing option:
						$this->db->query("DELETE FROM " . DB_PREFIX . "product_option_value WHERE product_option_id = '" . (int)$product_option_id . "' AND product_id = '" . (int)$product_id . "' AND option_id = '" . (int)$product_option['option_id'] . "'");
						}
					}
				}
			
			} // end foreach existing options
			
			} // end avem optiuni existente
			
			} // end foreach product_option
			
		}

        break;

    case "o_del_val": // Remove only existing found values (options will not be removed)

		if (isset($data['product_option'])) {
			
			foreach ($data['product_option'] as $product_option) {

			// find existing option:
			$query = $this->db->query("SELECT product_option_id FROM " . DB_PREFIX . "product_option WHERE product_id = '" . (int)$product_id . "' AND option_id = '" . (int)$product_option['option_id'] . "'");
			$existing_options = array();
			$existing_options = $query->rows;
			
			if (count($existing_options)>0) { // avem optiuni existente
			
			foreach ($existing_options as $existing_opt) {
			
				if ($product_option['type'] == 'select' || $product_option['type'] == 'radio' || $product_option['type'] == 'checkbox' || $product_option['type'] == 'image') {
					$product_option_id = $existing_opt['product_option_id'];
					if (isset($product_option['product_option_value'])) {
						foreach ($product_option['product_option_value'] as $product_option_value) {
						// Remove existing values:
						$this->db->query("DELETE FROM " . DB_PREFIX . "product_option_value WHERE product_option_id = '" . (int)$product_option_id . "' AND product_id = '" . (int)$product_id . "' AND option_id = '" . (int)$product_option['option_id'] . "' AND option_value_id = '" . (int)$product_option_value['option_value_id'] . "'");
						}
					}
				}
			
			} // end foreach existing options
			
			} // end avem optiuni existente
			
			} // end foreach product_option
			
		}

        break;

    case "o_del": // Just remove old options.
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_option WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_option_value WHERE product_id = '" . (int)$product_id . "'");
        break;
	
	} /// end switch

} /// end update mode

$this->db->query("UPDATE " . DB_PREFIX . "product p SET date_modified = NOW() WHERE product_id = '" . (int)$product_id . "'");

} /// end scanare produse

$this->cache->delete('product');

$this->session->data['success'] = $this->language->get('masstxt_succes_mass_update').count($this->request->post['selected']).$this->language->get('masstxt_succes_x_products_updated');

} else {  /// nu avem update

$this->session->data['error'] = $this->language->get('masstxt_error_nothing_set_for_update');

} /// end avem options update

} else {  /// nu avem produse selectate

$this->session->data['error'] = $this->language->get('masstxt_error_no_products_selected');

} /// end avem produse selectate

} else {

$this->session->data['error'] = $this->language->get('masstxt_error_permission');

} /// end modify permision

} /// end update button



$this->data['arr_lista_prod'] = array();

$prfx="";
$plus_join="";
$plus_where="";

if (isset($this->request->post['lista_prod']) OR isset($this->request->post['mass_update'])) { /// data filters

if (isset($this->request->post['product_category'])) { // categories
$plus_join=" LEFT JOIN " . DB_PREFIX . "product_to_category p2c ON (p.product_id = p2c.product_id)";
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where=$prfx."p2c.category_id IN ('" .implode("', '", $this->request->post['product_category']). "')";
}

if (isset($this->request->post['manufacturer_ids'])) { // manufacturers
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."p.manufacturer_id IN ('" .implode("', '", $this->request->post['manufacturer_ids']). "')";
}

if (isset($this->request->post['filters_ids'])) { // filters
$plus_join.=" LEFT JOIN " . DB_PREFIX . "product_filter prfil ON (p.product_id = prfil.product_id)";
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."prfil.filter_id IN ('" .implode("', '", $this->request->post['filters_ids']). "')";
}

if ($this->request->post['price_mmarese']!="") { // price greater than or equal to
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."p.price >= '" . (float)$this->request->post['price_mmarese'] . "'";
}

if ($this->request->post['price_mmicse']!="") { // price less than or equal to
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."p.price <= '" . (float)$this->request->post['price_mmicse'] . "'";
}

// discount price
if ($this->request->post['d_price_mmarese']!="" OR $this->request->post['d_price_mmicse']!="" OR $this->request->post['d_cust_group_filter']!="any") {
$plus_join.=" LEFT JOIN " . DB_PREFIX . "product_discount pdisc ON (p.product_id = pdisc.product_id)";
}
if ($this->request->post['d_cust_group_filter']!="any") { // cusomer group
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."pdisc.customer_group_id = '" . (int)$this->request->post['d_cust_group_filter'] . "'";
}
if ($this->request->post['d_price_mmarese']!="") { // greater than or equal to
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."pdisc.price >= '" . (float)$this->request->post['d_price_mmarese'] . "'";
}
if ($this->request->post['d_price_mmicse']!="") { // less than or equal to
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."pdisc.price <= '" . (float)$this->request->post['d_price_mmicse'] . "'";
}
//

// special price
if ($this->request->post['s_price_mmarese']!="" OR $this->request->post['s_price_mmicse']!="" OR $this->request->post['s_cust_group_filter']!="any") {
$plus_join.=" LEFT JOIN " . DB_PREFIX . "product_special pspec ON (p.product_id = pspec.product_id)";
}
if ($this->request->post['s_cust_group_filter']!="any") { // cusomer group
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."pspec.customer_group_id = '" . (int)$this->request->post['s_cust_group_filter'] . "'";
}
if ($this->request->post['s_price_mmarese']!="") { // greater than or equal to
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."pspec.price >= '" . (float)$this->request->post['s_price_mmarese'] . "'";
}
if ($this->request->post['s_price_mmicse']!="") { // less than or equal to
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."pspec.price <= '" . (float)$this->request->post['s_price_mmicse'] . "'";
}
//

if ($this->request->post['tax_class_filter']!="any") { // tax class
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."p.tax_class_id = '" . (int)$this->request->post['tax_class_filter'] . "'";
}

if ($this->request->post['stock_mmarese']!="") { // stock greater than or equal to
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."p.quantity >= '" . (int)$this->request->post['stock_mmarese'] . "'";
}

if ($this->request->post['stock_mmicse']!="") { // stock less than or equal to
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."p.quantity <= '" . (int)$this->request->post['stock_mmicse'] . "'";
}

if ($this->request->post['min_q_mmarese']!="") { // Minimum Quantity greater than or equal to
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."p.minimum >= '" . (int)$this->request->post['min_q_mmarese'] . "'";
}

if ($this->request->post['min_q_mmicse']!="") { // Minimum Quantity less than or equal to
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."p.minimum <= '" . (int)$this->request->post['min_q_mmicse'] . "'";
}

if ($this->request->post['stock_status_filter']!="any") { // Subtract Stock
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."p.stock_status_id = '" . (int)$this->request->post['stock_status_filter'] . "'";
}

if ($this->request->post['subtract_filter']!="any") { // Out Of Stock Status
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."p.subtract = '" . (int)$this->request->post['subtract_filter'] . "'";
}

if ($this->request->post['shipping_filter']!="any") { // Requires Shipping
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."p.shipping = '" . (int)$this->request->post['shipping_filter'] . "'";
}

if ($this->request->post['date_mmarese']!="") { // Date Available greater than or equal to
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."p.date_available >= '" . $this->db->escape($this->request->post['date_mmarese']) . "'";
}

if ($this->request->post['date_mmicse']!="") { // Date Available less than or equal to
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."p.date_available <= '" . $this->db->escape($this->request->post['date_mmicse']) . "'";
}

if ($this->request->post['date_added_mmarese']!="") { // Date added greater than or equal to
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."p.date_added >= '" . $this->db->escape($this->request->post['date_added_mmarese']) . "'";
}

if ($this->request->post['date_added_mmicse']!="") { // Date added less than or equal to
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."p.date_added <= '" . $this->db->escape($this->request->post['date_added_mmicse']) . "'";
}

if ($this->request->post['date_modified_mmarese']!="") { // Date modified greater than or equal to
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."p.date_modified >= '" . $this->db->escape($this->request->post['date_modified_mmarese']) . "'";
}

if ($this->request->post['date_modified_mmicse']!="") { // Date modified less than or equal to
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."p.date_modified <= '" . $this->db->escape($this->request->post['date_modified_mmicse']) . "'";
}

if ($this->request->post['prod_status']!="any") { // status
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."p.status = '" . (int)$this->request->post['prod_status'] . "'";
}

if ($this->request->post['store_filter']!="any") { // store
$plus_join.=" LEFT JOIN " . DB_PREFIX . "product_to_store pts ON (p.product_id = pts.product_id)";
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."pts.store_id = '" . (int)$this->request->post['store_filter'] . "'";
}

if ($this->request->post['filter_attr']!="any") { // attribute
$plus_join.=" LEFT JOIN " . DB_PREFIX . "product_attribute pattr ON (p.product_id = pattr.product_id)";
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."pattr.attribute_id = '" . (int)$this->request->post['filter_attr'] . "'";
}

if ($this->request->post['filter_opti']!="any") { // option
$plus_join.=" LEFT JOIN " . DB_PREFIX . "product_option po ON (p.product_id = po.product_id)";
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."po.option_id = '" . (int)$this->request->post['filter_opti'] . "'";
}

if ($this->request->post['filter_attr_val']!="") { // attribute value (text)
if ($this->request->post['filter_attr']=="any") { $plus_join.=" LEFT JOIN " . DB_PREFIX . "product_attribute pattr ON (p.product_id = pattr.product_id)"; }
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."pattr.text LIKE '%" . $this->db->escape($this->request->post['filter_attr_val']) . "%'";
}

if ($this->request->post['filter_opti_val']!="any") { // option value
$plus_join.=" LEFT JOIN " . DB_PREFIX . "product_option_value pov ON (p.product_id = pov.product_id)";
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."pov.option_value_id = '" . (int)$this->request->post['filter_opti_val'] . "'";
}

if ($this->request->post['filter_name']!="") { // part of name
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
if(version_compare(VERSION, '1.5.4.1', '>')) {
	$plus_where.=$prfx."pd.name LIKE '%" . $this->db->escape($this->request->post['filter_name']) . "%'";
	} elseif (version_compare(VERSION, '1.5.1.2', '>')) {
	$plus_where.=$prfx."LCASE(pd.name) LIKE '%" . $this->db->escape(utf8_strtolower($this->request->post['filter_name'])) . "%'";
	} else {
	$plus_where.=$prfx."LCASE(pd.name) LIKE '%" . $this->db->escape(strtolower($this->request->post['filter_name'])) . "%'";
	}
}

if ($this->request->post['filter_model']!="") { // part of model
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
if(version_compare(VERSION, '1.5.4.1', '>')) {
	$plus_where.=$prfx."p.model LIKE '%" . $this->db->escape($this->request->post['filter_model']) . "%'";
	} elseif (version_compare(VERSION, '1.5.1.2', '>')) {
	$plus_where.=$prfx."LCASE(p.model) LIKE '%" . $this->db->escape(utf8_strtolower($this->request->post['filter_model'])) . "%'";
	} else {
	$plus_where.=$prfx."LCASE(p.model) LIKE '%" . $this->db->escape(strtolower($this->request->post['filter_model'])) . "%'";
	}
}

if ($this->request->post['filter_tag']!="") { // tag
if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
if(version_compare(VERSION, '1.5.3.1', '>')) {
	$plus_where.=$prfx."LCASE(pd.tag) LIKE '%" . $this->db->escape(utf8_strtolower($this->request->post['filter_tag'])) . "%'";
	} else {
	$plus_join.=" LEFT JOIN " . DB_PREFIX . "product_tag ptag ON (p.product_id = ptag.product_id)";	
	$plus_where.=$prfx."LCASE(ptag.tag) LIKE '%" . $this->db->escape(utf8_strtolower($this->request->post['filter_tag'])) . "%'";
	}
}

} /// end data filters



if ($plus_where=="") { $prfx=" WHERE "; } else { $prfx=" AND "; }
$plus_where.=$prfx."pd.language_id = '" . (int)$this->config->get('config_language_id') . "'";

$final_query="SELECT p.product_id, p.model, p.price, p.quantity, p.status, pd.name FROM " . DB_PREFIX . "product p 
LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) 
".$plus_join.$plus_where." 
GROUP BY p.product_id 
ORDER BY pd.name ASC";


if (isset($this->request->post['max_prod_pag'])) {
  	$this->data['max_prod_pag'] = $this->request->post['max_prod_pag'];
	} else {
  	$this->data['max_prod_pag'] = 500; // defult max prod per pag
}
if (isset($this->request->post['curent_pag'])) {
  	$this->data['curent_pag'] = $this->request->post['curent_pag'];
	} else {
  	$this->data['curent_pag'] = 1;
}

$total_prod_query="SELECT COUNT(DISTINCT p.product_id) AS total FROM " . DB_PREFIX . "product p 
LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) 
".$plus_join.$plus_where;
$query = $this->db->query($total_prod_query);

$this->data['total_prod_filtered'] = $query->row['total'];

$this->data['total_pag'] = ceil($this->data['total_prod_filtered'] / $this->data['max_prod_pag']);

if ($this->data['curent_pag']>$this->data['total_pag']) { $this->data['curent_pag']=$this->data['total_pag']; }

if ($this->data['total_pag']>1) {
	$start_rec=($this->data['curent_pag']-1)*$this->data['max_prod_pag'];
	$plus_limit=" LIMIT " . (int)$start_rec . "," . (int)$this->data['max_prod_pag'];
	$final_query.=$plus_limit;
}

$query = $this->db->query($final_query);

$this->data['arr_lista_prod'] = $query->rows;


if (isset($this->request->post['lista_prod'])) { /// preview button

$this->session->data['success'] = $this->language->get('masstxt_succes_products_filtered');

} /// end preview button



		$this->data['token'] = $this->session->data['token']; ////
		
		if (isset($this->session->data['error'])) {
    		$this->data['error_warning'] = $this->session->data['error'];
    
			unset($this->session->data['error']);
 		} elseif (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		
		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
		
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}
		
  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
		'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),     		
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->data['heading_title'],
		'href'      => $this->url->link('tool/masspoptiupd', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->data['action'] = $this->url->link('tool/masspoptiupd', 'token=' . $this->session->data['token'], 'SSL');

		$this->template = 'tool/masspoptiupd.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
	}

}
?>
