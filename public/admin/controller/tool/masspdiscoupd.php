<?php 
class ControllerToolmasspdiscoupd extends Controller { 
	private $error = array();
	
	public function index() {

		if(version_compare(VERSION, '1.5.4.1', '>')) {
		$this->language->load('tool/masspdiscoupd');
		} else {
    		$this->load->language('tool/masspdiscoupd');
		}
		
		
		$this->document->addStyle('view/template/tool/masspdiscoupd.css');

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
		$this->data['masstxt_p_updates'] = $this->language->get('masstxt_p_updates');
		$this->data['masstxt_upd_help1'] = $this->language->get('masstxt_upd_help1');
		$this->data['masstxt_upd_discount'] = $this->language->get('masstxt_upd_discount');
		$this->data['masstxt_upd_set_new_discounts'] = $this->language->get('masstxt_upd_set_new_discounts');
		$this->data['masstxt_upd_customer_group'] = $this->language->get('masstxt_upd_customer_group');
		$this->data['masstxt_upd_quantity'] = $this->language->get('masstxt_upd_quantity');
		$this->data['masstxt_upd_priority'] = $this->language->get('masstxt_upd_priority');
		$this->data['masstxt_upd_price_type'] = $this->language->get('masstxt_upd_price_type');
		$this->data['masstxt_upd_date_start'] = $this->language->get('masstxt_upd_date_start');
		$this->data['masstxt_upd_date_end'] = $this->language->get('masstxt_upd_date_end');
		$this->data['masstxt_upd_flat'] = $this->language->get('masstxt_upd_flat');
		$this->data['masstxt_upd_subtraction_price'] = $this->language->get('masstxt_upd_subtraction_price');
		$this->data['masstxt_upd_percentage_price'] = $this->language->get('masstxt_upd_percentage_price');
		$this->data['masstxt_remove'] = $this->language->get('masstxt_remove');
		$this->data['masstxt_upd_add_discount'] = $this->language->get('masstxt_upd_add_discount');
		$this->data['masstxt_update_mode'] = $this->language->get('masstxt_update_mode');
		$this->data['masstxt_upd_mode_discount_ad'] = $this->language->get('masstxt_upd_mode_discount_ad');
		$this->data['masstxt_upd_mode_discount_ad_help'] = $this->language->get('masstxt_upd_mode_discount_ad_help');
		$this->data['masstxt_upd_mode_discount_re'] = $this->language->get('masstxt_upd_mode_discount_re');
		$this->data['masstxt_upd_mode_discount_re_help'] = $this->language->get('masstxt_upd_mode_discount_re_help');
		$this->data['masstxt_upd_special'] = $this->language->get('masstxt_upd_special');
		$this->data['masstxt_upd_set_new_special'] = $this->language->get('masstxt_upd_set_new_special');
		$this->data['masstxt_upd_add_special'] = $this->language->get('masstxt_upd_add_special');
		$this->data['masstxt_upd_mode_special_ad'] = $this->language->get('masstxt_upd_mode_special_ad');
		$this->data['masstxt_upd_mode_special_ad_help'] = $this->language->get('masstxt_upd_mode_special_ad_help');
		$this->data['masstxt_upd_mode_special_re'] = $this->language->get('masstxt_upd_mode_special_re');
		$this->data['masstxt_upd_mode_special_re_help'] = $this->language->get('masstxt_upd_mode_special_re_help');
		$this->data['masstxt_mass_update_button'] = $this->language->get('masstxt_mass_update_button');
		$this->data['masstxt_mass_update_button_help'] = $this->language->get('masstxt_mass_update_button_help');
		$this->data['masstxt_mass_update_button_top1'] = $this->language->get('masstxt_mass_update_button_top1');
		$this->data['masstxt_mass_update_button_top2'] = $this->language->get('masstxt_mass_update_button_top2');
		$this->data['masstxt_mass_update_button_top3'] = $this->language->get('masstxt_mass_update_button_top3');
		
		
		
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
    		
		
		if (isset($this->request->post['product_discount'])) {
			$this->data['product_discounts'] = $this->request->post['product_discount'];
		} else {
			$this->data['product_discounts'] = array();
		}

		if (isset($this->request->post['product_special'])) {
			$this->data['product_specials'] = $this->request->post['product_special'];
		} else {
			$this->data['product_specials'] = array();
		}

    		if (isset($this->request->post['upd_mode'])) {
      			$this->data['upd_mode'] = $this->request->post['upd_mode'];
		} else {
      			$this->data['upd_mode'] = 'ad';
    		}

    		if (isset($this->request->post['upd_mode2'])) {
      			$this->data['upd_mode2'] = $this->request->post['upd_mode2'];
		} else {
      			$this->data['upd_mode2'] = 'ad';
    		}

    		////



if (isset($this->request->post['mass_update'])) { /// update button

if ($this->user->hasPermission('modify', 'tool/masspdiscoupd')) { /// modify permision

if (isset($this->request->post['selected'])) { /// avem produse selectate

if (!isset($this->request->post['product_discount']) AND $this->request->post['upd_mode']=="ad" AND !isset($this->request->post['product_special']) AND $this->request->post['upd_mode2']=="ad") { /// nu avem update

$this->session->data['error'] = $this->language->get('masstxt_error_nothing_set_for_update');

} else { /// avem update

foreach ($this->request->post['selected'] as $product_id) { /// scanare produse

if ($this->request->post['upd_mode']=="re") { // remove old discounts
$this->db->query("DELETE FROM " . DB_PREFIX . "product_discount WHERE product_id = '" . (int)$product_id . "'");
}
if (isset($this->request->post['product_discount'])) { // add new discounts
	foreach ($this->request->post['product_discount'] as $product_discount) {
	
	switch ($product_discount['price_mode']) { /// calcul price
	case "flat": // flat price
	$discount_price=$product_discount['price'];
        break;
	case "sub": // Subtraction of base price
	$query = $this->db->query("SELECT price FROM " . DB_PREFIX . "product WHERE product_id = '" . (int)$product_id . "'");
	$base_price=$query->row;
	$discount_price=(float)$base_price['price'] - (float)$product_discount['price'];
        break;
	case "per": // percentage of base price
	$query = $this->db->query("SELECT price FROM " . DB_PREFIX . "product WHERE product_id = '" . (int)$product_id . "'");
	$base_price=$query->row;
	$discount_price=(float)$base_price['price'] *(1- (float)$product_discount['price'] / 100);
        break;
	} /// end calcul price

	$this->db->query("INSERT INTO " . DB_PREFIX . "product_discount SET product_id = '" . (int)$product_id . "', customer_group_id = '" . (int)$product_discount['customer_group_id'] . "', quantity = '" . (int)$product_discount['quantity'] . "', priority = '" . (int)$product_discount['priority'] . "', price = '" . (float)$discount_price . "', date_start = '" . $this->db->escape($product_discount['date_start']) . "', date_end = '" . $this->db->escape($product_discount['date_end']) . "'");
	}
}

if ($this->request->post['upd_mode2']=="re") { // remove old specials
$this->db->query("DELETE FROM " . DB_PREFIX . "product_special WHERE product_id = '" . (int)$product_id . "'");
}
if (isset($this->request->post['product_special'])) { // add new specials
	foreach ($this->request->post['product_special'] as $product_special) {

	switch ($product_special['price_mode']) { /// calcul price
	case "flat": // flat price
	$special_price=$product_special['price'];
        break;
	case "sub": // Subtraction of base price
	$query = $this->db->query("SELECT price FROM " . DB_PREFIX . "product WHERE product_id = '" . (int)$product_id . "'");
	$base_price=$query->row;
	$special_price=(float)$base_price['price'] - (float)$product_special['price'];
        break;
	case "per": // percentage of base price
	$query = $this->db->query("SELECT price FROM " . DB_PREFIX . "product WHERE product_id = '" . (int)$product_id . "'");
	$base_price=$query->row;
	$special_price=(float)$base_price['price'] *(1- (float)$product_special['price'] / 100);
        break;
	} /// end calcul price

	$this->db->query("INSERT INTO " . DB_PREFIX . "product_special SET product_id = '" . (int)$product_id . "', customer_group_id = '" . (int)$product_special['customer_group_id'] . "', priority = '" . (int)$product_special['priority'] . "', price = '" . (float)$special_price . "', date_start = '" . $this->db->escape($product_special['date_start']) . "', date_end = '" . $this->db->escape($product_special['date_end']) . "'");
	}
}

$this->db->query("UPDATE " . DB_PREFIX . "product p SET date_modified = NOW() WHERE product_id = '" . (int)$product_id . "'");

} /// end scanare produse

$this->cache->delete('product');

$this->session->data['success'] = $this->language->get('masstxt_succes_mass_update');

} /// end nu avem update

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
		'href'      => $this->url->link('tool/masspdiscoupd', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->data['action'] = $this->url->link('tool/masspdiscoupd', 'token=' . $this->session->data['token'], 'SSL');

		$this->template = 'tool/masspdiscoupd.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
	}

}
?>
