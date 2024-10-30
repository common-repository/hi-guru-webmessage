<?php
/**
 * @package  hi.guruWebMessagePlugin
 */
namespace Inc_Higuru\Base;
use Inc_Higuru\Base\Higuru_Base_Controller;
class Higuru_Settings_Links extends Higuru_Base_Controller
{
	public function higuru_register() 
	{
		add_filter( "plugin_action_links_$this->higuru_plugin", array( $this, 'higuru_settings_link' ) );
	}
	public function higuru_settings_link( $links ) 
	{
		$higuru_settings_link = '<a href="admin.php?page=higuru_webmessage_plugin"></a>';
		array_push( $links, $higuru_settings_link );
		return $links;
	}
}
