<?php 
/**
 * @package  hi.guruWebMessagePlugin
 */
namespace Inc_Higuru\Base;
use Inc_Higuru\Base\Higuru_Base_Controller;
/**
* 
*/
class Higuru_Enqueue extends Higuru_Base_Controller
{
	public function higuru_register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_higuru_enqueue'));
		add_action( 'wp_enqueue_scripts', array( $this, 'higuru_enqueue' ));
	}
	

	function admin_higuru_enqueue() {
		// style sheet
		 
		wp_enqueue_style( 'higuru_style', $this->higuru_plugin_url . '/assets/css/higurustyle.css' );
		
		// token validate
		
		wp_enqueue_script( 'higuru_script', $this->higuru_plugin_url . 'assets/js/higurutoken.js' );

}
	

	function higuru_enqueue() {
		
		//wp_enqueue_style
		
		$value = esc_attr(get_option( 'higuru_channel_uuid' ));

		if( $value!='') {
			
			//add if statement to check if the widget show setting is enabled
			
			if(HIGURU_ENVIRONMENT=='prod'){
				
				wp_enqueue_script( 'higuru_src', 'https://s3-eu-west-1.amazonaws.com/higuru-webchat/v1/higuru-webchat.min.js.gz' );
				
			}else{
				
				wp_enqueue_script( 'higuru_src', 'https://s3-eu-west-1.amazonaws.com/higuru-webchat-'.HIGURU_ENVIRONMENT.'/v1/higuru-webchat-'.HIGURU_ENVIRONMENT.'.min.js' );
			}
		
		       
				wp_enqueue_script( 'higuru_script', $this->higuru_plugin_url . 'assets/js/higuruscripts.js' );

		}
	}
}
