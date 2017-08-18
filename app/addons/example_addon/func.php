<?php

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

// @PRODUCT - Returns example_addon_flag
function fn_example_addon_enabled($product_id) {
	return db_get_field("SELECT `example_addon_flag` FROM ?:products WHERE `product_id` = ?s", $product_id);
}

// @PRODUCT - Sets example_addon_flag
function fn_example_addon_update($product_id, $product_data) {
	if (!empty($product_data['example_addon_flag'])) {
		db_query("UPDATE ?:products SET `example_addon_flag` = ?s WHERE `product_id` = ?s", $product_data['example_addon_flag'], $product_id);
	}
}

// @PRODUCTS - Adds example_addon_flag condition
function fn_example_addon_get_products($params, $fields, $sortings, &$condition, $join, $sorting, $group_by) {
	if (!empty($params['example_addon_flag'])) {
		$condition .= db_quote(" AND example_addon_flag = 'Y'");
	}
}

// @CART - Add quote condition to product query
// @WARN - this does not make field available to calculate_cart_items hook via fn_example_addon_calculate_cart_items()
function fn_example_addon_pre_get_cart_product_data($hash, $product, $skip_promotion, $cart, $auth, $promotion_amount, &$fields, $join) {
	$fields[] = '?:products.example_addon_flag';
}

// Example - Admin product global edit
// @GLOBAL EDIT - Hook in fields
function fn_example_addon_global_update_products($table, $field, $value, $type, $msg, $update_data) {
	$product_ids = $update_data['product_ids'] ? $update_data['product_ids'] : db_get_fields("SELECT product_id FROM ?:products");

	foreach ($product_ids as $product_id) {			
		fn_example_addon_update($product_id, $update_data);
	}
}

// @GLOBAL EDIT - Hook in fields
function fn_example_addon_get_product_fields($fields) {
	$fields[] = array(
		'name' => '[data][example_addon_flag]',
		'text' => __('example_addon')
	);
}
// End Example

// Example - DB install/uninstall routines
function fn_example_addon_install() {
	db_query("ALTER TABLE ?:products ADD `example_addon_flag` char(1) NOT NULL");
}

function fn_example_addon_uninstall() {
	if (Registry::get('addons.example_addon.example_del') == 'Y') {
		db_query("ALTER TABLE ?:products DROP COLUMN `example_addon_flag`;");
	}
}
// End Example
