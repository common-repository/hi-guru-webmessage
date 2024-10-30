<?php
/**
 * @package  hi.guruWebMessagePlugin
 */
namespace Inc_Higuru\Base;
use Inc_Higuru\Base\Higuru_Base_Controller;
class higuru_Web_Message_Widget extends Higuru_Base_Controller
{
	public function higuru_register() 
	{
		add_action('wp_head', array($this, 'higuru_add_webMessage_widget'));
	}
	public function higuru_add_webMessage_widget(){
		return require_once( "$this->higuru_plugin_path/templates/higuru-widget-template.php" );
	}
}
