<?php

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

// Example - Admin side product mass edit
if ($mode == 'manage') {
	// Mode: admin product list & mass edit popup window where fields are selected

	$selected_fields = Tygh::$app['view']->getTemplateVars('selected_fields');
	
	$selected_fields[] = array(
		'name' => '[data][example_addon_flag]',
		'text' => __('example_addon')
	);

	Tygh::$app['view']->assign('selected_fields', $selected_fields);

} elseif ($mode == 'm_update') {
	// Mode: admin product mass edit page
	
	// CS-Cart v4.3.6 has new session handler
	if (version_compare(PRODUCT_VERSION, '4.3.6', '>=')) {
		$selected_fields = Tygh::$app['session']['selected_fields'];
	} else {
		$selected_fields = $_SESSION['selected_fields'];
	}

	$field_groups = Tygh::$app['view']->getTemplateVars('field_groups');
	$filled_groups = Tygh::$app['view']->getTemplateVars('filled_groups');
	$field_names = Tygh::$app['view']->getTemplateVars('field_names');
	

	if (!empty($selected_fields['data']['example_addon_flag'])) {
		$field_groups['C']['example_addon_flag'] = 'products_data';
		$filled_groups['C']['example_addon_flag'] = __('example_addon');
	}

	// Disable these unless field name matches lang var exactly. Found at controllers/backend/products.php  foreach ($fields2update as $k => $field)
	if (isset($field_names['example_addon_flag'])) {
		unset($field_names['example_addon_flag']);
	}

	Tygh::$app['view']->assign('field_groups', $field_groups);
	Tygh::$app['view']->assign('filled_groups', $filled_groups);
	Tygh::$app['view']->assign('field_names', $field_names);
}
// End Example