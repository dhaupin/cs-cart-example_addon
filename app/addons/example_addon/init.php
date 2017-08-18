<?php

if (!defined('BOOTSTRAP')) { die('Access denied'); }

fn_register_hooks(
	'get_products',
	'pre_get_cart_product_data',
	'get_product_fields',
	'global_update_products'
);