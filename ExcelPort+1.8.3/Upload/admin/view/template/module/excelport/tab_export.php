<?php if (!empty($openstock_installed)) : ?>
<div class="success"><?php echo $openstock_installed; ?></div>
<?php endif; ?>
<?php if (!empty($optionsboost_installed)) : ?>
<div class="success"><?php echo $optionsboost_installed; ?></div>
<?php endif; ?>
<table class="form">
    <tr>
        <td>
            <div class="question"><?php echo $text_question_data; ?> <a id="filter_popover" rel="popover" data-toggle="popover" data-content="<?php echo $text_toggle_filter; ?>" class="btn<?php echo !empty($data['ExcelPort']['Export']['Filter']) ? ' active' : ''; ?>"><i class="icon-filter"></i></a></div>
            <input type="hidden" id="toggle_filter" name="ExcelPort[Export][Filter]" value="<?php echo !empty($data['ExcelPort']['Export']['Filter']) ? '1' : '0'; ?>">
            <div class="option">
            	<input id="DataTypeProductsOption" type="radio" name="ExcelPort[Export][DataType]" value="Products" <?php echo (empty($data['ExcelPort']['Export']['DataType']) || $data['ExcelPort']['Export']['DataType'] == 'Products') ? 'checked="checked"' : ''; ?> /><label for="DataTypeProductsOption"><?php echo $text_datatype_option_products; ?></label>
            </div>
            <div class="dataTypeFilter" data-type="Products">
            	<table>
                	<thead>
                    	<tr>
                        	<td colspan="2">
                            	<?php echo $text_conjunction; ?> <select name="ExcelPort[Export][Filters][Products][Conjunction]" class="conjunctionSelect">
                                	<option value="OR">OR</option>
                                    <option value="AND"<?php echo (!empty($data['ExcelPort']['Export']['Filters']['Products']['Conjunction']) && $data['ExcelPort']['Export']['Filters']['Products']['Conjunction'] == 'AND') ? ' selected="selected"' : ''; ?>>AND</option>
                            	</select> <a data-toggle="tooltip" title="<?php echo $help_conjunction; ?>"><i class="icon-info-sign"></i></a>
                            </td>
                        </tr>
                    </thead>
                	<tbody>
                    	
                    </tbody>
                    <tfoot>
                    	<tr>
                        	<td></td>
                            <td class="right"><a class="btn btn-success addCondition"><i class="icon-plus icon-white"></i> <?php echo $button_add_condition; ?></a></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="option">
            	<input id="DataTypeCategoriesOption" type="radio" name="ExcelPort[Export][DataType]" value="Categories" <?php echo (!empty($data['ExcelPort']['Export']['DataType']) && $data['ExcelPort']['Export']['DataType'] == 'Categories') ? 'checked="checked"' : ''; ?> /><label for="DataTypeCategoriesOption"><?php echo $text_datatype_option_categories; ?></label>
            </div>
            <div class="dataTypeFilter" data-type="Categories">
            	<table>
                	<thead>
                    	<tr>
                        	<td colspan="2">
                            	<?php echo $text_conjunction; ?> <select name="ExcelPort[Export][Filters][Categories][Conjunction]" class="conjunctionSelect">
                                	<option value="OR">OR</option>
                                    <option value="AND"<?php echo (!empty($data['ExcelPort']['Export']['Filters']['Categories']['Conjunction']) && $data['ExcelPort']['Export']['Filters']['Categories']['Conjunction'] == 'AND') ? ' selected="selected"' : ''; ?>>AND</option>
                            	</select> <a data-toggle="tooltip" title="<?php echo $help_conjunction; ?>"><i class="icon-info-sign"></i></a>
                            </td>
                        </tr>
                    </thead>
                	<tbody>
                    	
                    </tbody>
                    <tfoot>
                    	<tr>
                        	<td></td>
                            <td class="right"><a class="btn btn-success addCondition"><i class="icon-plus icon-white"></i> <?php echo $button_add_condition; ?></a></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="option">
            	<input id="DataTypeOptionsOption" type="radio" name="ExcelPort[Export][DataType]" value="Options" <?php echo (!empty($data['ExcelPort']['Export']['DataType']) && $data['ExcelPort']['Export']['DataType'] == 'Options') ? 'checked="checked"' : ''; ?> /><label for="DataTypeOptionsOption"><?php echo $text_datatype_option_options; ?></label>
            </div>
            <div class="dataTypeFilter" data-type="Options">
            	<table>
                	<thead>
                    	<tr>
                        	<td colspan="2">
                            	<?php echo $text_conjunction; ?> <select name="ExcelPort[Export][Filters][Options][Conjunction]" class="conjunctionSelect">
                                	<option value="OR">OR</option>
                                    <option value="AND"<?php echo (!empty($data['ExcelPort']['Export']['Filters']['Options']['Conjunction']) && $data['ExcelPort']['Export']['Filters']['Options']['Conjunction'] == 'AND') ? ' selected="selected"' : ''; ?>>AND</option>
                            	</select> <a data-toggle="tooltip" title="<?php echo $help_conjunction; ?>"><i class="icon-info-sign"></i></a>
                            </td>
                        </tr>
                    </thead>
                	<tbody>
                    	
                    </tbody>
                    <tfoot>
                    	<tr>
                        	<td></td>
                            <td class="right"><a class="btn btn-success addCondition"><i class="icon-plus icon-white"></i> <?php echo $button_add_condition; ?></a></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="option">
            	<input id="DataTypeAttributesOption" type="radio" name="ExcelPort[Export][DataType]" value="Attributes" <?php echo (!empty($data['ExcelPort']['Export']['DataType']) && $data['ExcelPort']['Export']['DataType'] == 'Attributes') ? 'checked="checked"' : ''; ?> /><label for="DataTypeAttributesOption"><?php echo $text_datatype_option_attributes; ?></label>
            </div>
        	<div class="dataTypeFilter" data-type="Attributes">
            	<table>
                	<thead>
                    	<tr>
                        	<td colspan="2">
                            	<?php echo $text_conjunction; ?> <select name="ExcelPort[Export][Filters][Attributes][Conjunction]" class="conjunctionSelect">
                                	<option value="OR">OR</option>
                                    <option value="AND"<?php echo (!empty($data['ExcelPort']['Export']['Filters']['Attributes']['Conjunction']) && $data['ExcelPort']['Export']['Filters']['Attributes']['Conjunction'] == 'AND') ? ' selected="selected"' : ''; ?>>AND</option>
                            	</select> <a data-toggle="tooltip" title="<?php echo $help_conjunction; ?>"><i class="icon-info-sign"></i></a>
                            </td>
                        </tr>
                    </thead>
                	<tbody>
                    	
                    </tbody>
                    <tfoot>
                    	<tr>
                        	<td></td>
                            <td class="right"><a class="btn btn-success addCondition"><i class="icon-plus icon-white"></i> <?php echo $button_add_condition; ?></a></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="option">
            	<input id="DataTypeCustomersOption" type="radio" name="ExcelPort[Export][DataType]" value="Customers" <?php echo (empty($data['ExcelPort']['Export']['DataType']) || $data['ExcelPort']['Export']['DataType'] == 'Customers') ? 'checked="checked"' : ''; ?> /><label for="DataTypeCustomersOption"><?php echo $text_datatype_option_customers; ?></label>
            </div>
            <div class="dataTypeFilter" data-type="Customers">
            	<table>
                	<thead>
                    	<tr>
                        	<td colspan="2">
                            	<?php echo $text_conjunction; ?> <select name="ExcelPort[Export][Filters][Customers][Conjunction]" class="conjunctionSelect">
                                	<option value="OR">OR</option>
                                    <option value="AND"<?php echo (!empty($data['ExcelPort']['Export']['Filters']['Customers']['Conjunction']) && $data['ExcelPort']['Export']['Filters']['Customers']['Conjunction'] == 'AND') ? ' selected="selected"' : ''; ?>>AND</option>
                            	</select> <a data-toggle="tooltip" title="<?php echo $help_conjunction; ?>"><i class="icon-info-sign"></i></a>
                            </td>
                        </tr>
                    </thead>
                	<tbody>
                    	
                    </tbody>
                    <tfoot>
                    	<tr>
                        	<td></td>
                            <td class="right"><a class="btn btn-success addCondition"><i class="icon-plus icon-white"></i> <?php echo $button_add_condition; ?></a></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="option">
            	<input id="DataTypeCustomerGroupsOption" type="radio" name="ExcelPort[Export][DataType]" value="CustomerGroups" <?php echo (empty($data['ExcelPort']['Export']['DataType']) || $data['ExcelPort']['Export']['DataType'] == 'CustomerGroups') ? 'checked="checked"' : ''; ?> /><label for="DataTypeCustomerGroupsOption"><?php echo $text_datatype_option_customer_groups; ?></label>
            </div>
            <div class="dataTypeFilter" data-type="CustomerGroups">
            	<table>
                	<thead>
                    	<tr>
                        	<td colspan="2">
                            	<?php echo $text_conjunction; ?> <select name="ExcelPort[Export][Filters][CustomerGroups][Conjunction]" class="conjunctionSelect">
                                	<option value="OR">OR</option>
                                    <option value="AND"<?php echo (!empty($data['ExcelPort']['Export']['Filters']['CustomerGroups']['Conjunction']) && $data['ExcelPort']['Export']['Filters']['CustomerGroups']['Conjunction'] == 'AND') ? ' selected="selected"' : ''; ?>>AND</option>
                            	</select> <a data-toggle="tooltip" title="<?php echo $help_conjunction; ?>"><i class="icon-info-sign"></i></a>
                            </td>
                        </tr>
                    </thead>
                	<tbody>
                    	
                    </tbody>
                    <tfoot>
                    	<tr>
                        	<td></td>
                            <td class="right"><a class="btn btn-success addCondition"><i class="icon-plus icon-white"></i> <?php echo $button_add_condition; ?></a></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="option">
            	<input id="DataTypeOrdersOption" type="radio" name="ExcelPort[Export][DataType]" value="Orders" <?php echo (empty($data['ExcelPort']['Export']['DataType']) || $data['ExcelPort']['Export']['DataType'] == 'Orders') ? 'checked="checked"' : ''; ?> /><label for="DataTypeOrdersOption"><?php echo $text_datatype_option_orders; ?></label>
            </div>
            <div class="dataTypeFilter" data-type="Orders">
            	<table>
                	<thead>
                    	<tr>
                        	<td colspan="2">
                            	<?php echo $text_conjunction; ?> <select name="ExcelPort[Export][Filters][Orders][Conjunction]" class="conjunctionSelect">
                                	<option value="OR">OR</option>
                                    <option value="AND"<?php echo (!empty($data['ExcelPort']['Export']['Filters']['Orders']['Conjunction']) && $data['ExcelPort']['Export']['Filters']['Orders']['Conjunction'] == 'AND') ? ' selected="selected"' : ''; ?>>AND</option>
                            	</select> <a data-toggle="tooltip" title="<?php echo $help_conjunction; ?>"><i class="icon-info-sign"></i></a>
                            </td>
                        </tr>
                    </thead>
                	<tbody>
                    	
                    </tbody>
                    <tfoot>
                    	<tr>
                        	<td></td>
                            <td class="right"><a class="btn btn-success addCondition"><i class="icon-plus icon-white"></i> <?php echo $button_add_condition; ?></a></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div data-depends-on="#DataTypeProductsOption, #DataTypeCategoriesOption, #DataTypeCustomersOption" class="question"><?php echo $text_question_store; ?></div>
            <div data-depends-on="#DataTypeProductsOption, #DataTypeCategoriesOption, #DataTypeCustomersOption" class="option">
            	<input id="Store0Option" type="radio" name="ExcelPort[Export][Store]" value="0"<?php echo empty($data['ExcelPort']['Export']['Store']) ? ' checked="checked"' : '';?> /><label for="Store0Option"><?php echo $this->config->get('config_name') . $this->language->get('text_default'); ?></label>
            </div>
            <?php foreach ($stores as $store) : ?>
            <div data-depends-on="#DataTypeProductsOption, #DataTypeCategoriesOption, #DataTypeCustomersOption" class="option">
            	<input id="Store<?php echo $store['store_id']; ?>Option" type="radio" name="ExcelPort[Export][Store]" value="<?php echo $store['store_id']; ?>" <?php echo !empty($data['ExcelPort']['Export']['Store']) && $data['ExcelPort']['Export']['Store'] == $store['store_id'] ? ' checked="checked"' : '';?>/><label for="Store<?php echo $store['store_id']; ?>Option"><?php echo $store['name']; ?></label>
            </div>
            <?php endforeach; ?>
       
            <div data-depends-on="#DataTypeProductsOption, #DataTypeCategoriesOption, #DataTypeOptionsOption, #DataTypeAttributesOption, #DataTypeCustomersOption, #DataTypeCustomerGroupsOption" class="question"><?php echo $text_question_language; ?></div>
            <?php foreach ($languages as $index => $language) : ?>
            <div data-depends-on="#DataTypeProductsOption, #DataTypeCategoriesOption, #DataTypeOptionsOption, #DataTypeAttributesOption, #DataTypeCustomersOption, #DataTypeCustomerGroupsOption" class="option">
            	<input id="Language<?php echo $language['language_id']; ?>Option" type="radio" name="ExcelPort[Export][Language]" value="<?php echo $language['language_id']; ?>"<?php echo $index == 0 && empty($data['ExcelPort']['Export']['Language']) ? ' checked="checked"' : (!empty($data['ExcelPort']['Export']['Language']) && $data['ExcelPort']['Export']['Language'] == $language['language_id'] ? ' checked="checked"' : ''); ?> /><label for="Language<?php echo $language['language_id']; ?>Option"><?php echo $language['name']; ?></label>
            </div>
            <?php endforeach; ?>
            
            <div class="question" data-depends-on="#DataTypeProductsOption"><input type="checkbox" name="ExcelPort[Export][QuickExport]" <?php echo !empty($data['ExcelPort']['Export']['QuickExport']) ? ' checked="checked"' : ''; ?> value="1" id="checkboxQuickExport" /><label for="checkboxQuickExport"><?php echo $text_question_type_export; ?></label></div>
        </td>  
    </tr>
    <tr>
        <td>
        	<div>
        		<a data-action="export" class="continueAction ExcelPortSubmitButton"><?php echo $button_export; ?></a>
            </div>
			<div class="help"><strong><?php echo $text_note; ?></strong> <?php echo $text_supported_in_oc1541; ?> <a class='needMoreSize' href="javascript:void(0)"><?php echo $text_learn_to_increase; ?></a></div>
        </td>  
    </tr>
</table>