<?php
/**
 * @package  hi.guruWebMessagePlugin
 */
namespace Inc_Higuru\Base;

class Higuru_Deactivate
{
	public static function higuru_deactivate() {
		flush_rewrite_rules();
		Higuru_Options::clear_all_higuru_options();
	}
}