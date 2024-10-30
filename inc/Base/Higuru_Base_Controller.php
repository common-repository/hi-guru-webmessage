<?php 
/**
 * @package  hi.guruWebMessagePlugin
 */
namespace Inc_Higuru\Base;

class Higuru_Base_Controller
{
	public $higuru_plugin_path;
	public $higuru_plugin_url;
	public $higuru_plugin;
	
	public function __construct() {
		$this->higuru_plugin_path = plugin_dir_path( dirname(dirname( __FILE__)));
		$this->higuru_plugin_url = plugin_dir_url( dirname(dirname( __FILE__)) );
		$this->higuru_plugin = plugin_basename( dirname( dirname(dirname( __FILE__) ))) . '/hi.guru-web-message.php';
	}
}