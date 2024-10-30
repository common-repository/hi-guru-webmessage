<?php
/**
 * @package  hi.guruWebMessagePlugin
 */
namespace Inc_Higuru\Base;

class Higuru_Uninstall
{
	public static function higuru_uninstall() {
		flush_rewrite_rules();
		Higuru_Options::clear_all_higuru_options();
	}
}