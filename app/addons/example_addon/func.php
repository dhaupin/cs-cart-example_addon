<?php
use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

function fn_example_addon_install() {
	db_query("ALTER TABLE `?:products` ADD `example_addon_flag` char(1) NOT NULL");
}
function fn_example_addon_uninstall() {
	if (Registry::get('addons.example_addon.example_del') == 'Y') {
		db_query("ALTER TABLE ?:products DROP COLUMN `example_addon_flag`;");
	}
}