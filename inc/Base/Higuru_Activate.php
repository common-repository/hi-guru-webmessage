<?php
/**
 * @package  hi.guruWebMessagePlugin
 */
namespace Inc_Higuru\Base;
class Higuru_Activate
{
	public static function higuru_activate() {
		flush_rewrite_rules();
	}
}