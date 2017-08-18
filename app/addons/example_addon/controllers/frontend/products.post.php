<?php

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

// Example - Product controller in catalog
if ($mode == 'view' || $mode == 'quick_view') {
	// Mode: catalog side product views
	
	if ($product['example_addon_flag'] == 'Y') {
		// if this product has an example flag, code can run here or pass goodies to the product page
	}
}
// End Example