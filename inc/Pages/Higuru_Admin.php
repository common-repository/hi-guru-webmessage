<?php 
/**
 * @package  hi.guruWebMessagePlugin
 */
namespace Inc_Higuru\Pages;
use Inc_Higuru\Api\Higuru_Settings_Api;
use Inc_Higuru\Base\Higuru_Base_Controller;
use Inc_Higuru\Base\Higuru_Dashboard;
use Inc_Higuru\Base\Higuru_General_Error;
/**
* 
*/
class Higuru_Admin extends Higuru_Base_Controller
{
	private $settings;
	private $higuru_admin_pages = array();
	private $higuru_admin_sub_pages = array();

	private $is_token_valid=FALSE;

	public function higuru_register() 
	{
		$this->settings = new Higuru_Settings_Api();
		$this->higuru_set_pages();
		$this->settings->higuru_add_admin_pages( $this->higuru_admin_pages )->higuru_add_admin_sub_pages($this->higuru_admin_sub_pages)->higuru_register();
	}

	public function higuru_set_pages()
	{
		$this->higuru_admin_pages = array(
			array(
				'page_title' => 'hi.guru WebMessage Plugin', 
				'menu_title' => 'hi.guru WebMessage', 
				'capability' => 'manage_options', 
				'menu_slug'  => 'higuru_webmessage_plugin', 
				'callback'   => array( &$this, 'higuru_dashboard_config' ), 
				'icon_url'   => $this->higuru_plugin_url.'assets/images/hi.guru_wordpress_icon.svg', 
				'position'   => 110
			)
		);
		
/* Reserved for future development 
 * 
  $this->higuru_admin_sub_pages = array(
			array(
				'parent_slug' => 'higuru_webmessage_plugin', 
				'page_title'  => 'Settings', 
				'menu_title'  => 'Settings', 
				'capability'  => 'manage_options', 
				'menu_slug'   => 'higuru_settings',
			)
		);
*/	
	}

	public function higuru_settings(){
		?>
		<div class="wrap">
		<?php

		$error = new Higuru_General_Error();
		$dashboard = new Higuru_Dashboard();

		$value = esc_attr(get_option( 'higuru_channel_uuid' ));
		if( $value!=''){
			$this->is_token_valid=TRUE;
		}

		//check condition (display error or settings page)
		

		if ( $this->is_token_valid ) {
			//currently will just show dashboard - Should add new settings page to display
			
			$dashboard->higuru_display_dashboard_form();
		}else{
			//Shows page to notify user that token is not set
			
			$error->higuru_display_token_not_set_form();
		}

}

	public function higuru_dashboard_config()
	{
		$dashboard = new Higuru_Dashboard();

		?>
		<div class="wrap">
		<?php

		if ( $this->is_token_valid ) {
			$dashboard->higuru_display_logged_in_form();
		}else{
			$dashboard->higuru_display_dashboard_form();
		}
		
		if(isset($_POST['higuru_login_updated'])){
			
				$higuru_login_updated = sanitize_text_field($_POST['higuru_login_updated']);
		
			if($_POST['higuru_login_updated'] == 'login' ){
				$this->higuru_handle_dashboard_form();
			}
		}
	}

	public function higuru_handle_dashboard_form() {
		$token_set = new Higuru_Dashboard();
		
		if(
			! isset( $_POST['higuru_form'] ) ||
			! wp_verify_nonce( $_POST['higuru_form'], 'higuru_update' ) ||
			! sanitize_text_field( $_POST['higuru_form'], 'higuru_update' )
		){ ?>
			<div class="error">
			   <p>Sorry, your nonce was not correct. Please try again.</p>
			</div> <?php
			exit;
		} else {
			
			// Handle form data

			// In future version do verification for the token here by validating the token with our backend
			
			// By validating token with our back end we will avoid the situation where the websdk is not shown if the user entered an invalid token

			// If we in future maybe validate token with backend we should sanitise the token before backend validation
		
			$token_set_result=$token_set->higuru_token_add();
			
			if(is_wp_error( $token_set_result)){
				
				preg_match('/^[a-z0-9]{8}[\-]{1}[a-z0-9]{4}[\-]{1}[a-z0-9]{4}[\-]{1}[a-z0-9]{4}[\-]{1}[a-z0-9]{12}/', $input_line, $output_array);
				
				$this->is_token_valid;
				
				if($token_set_result->get_error_code()==403){
					?>
					<div class="error">
						<p>Your token is invalid. Please try again</p>
					</div> 
					<?php
				}else{
					?>
					<div class="error">
					<?php
					echo $token_set_result->get_error_code();
					?>
						<p>Whoops! An error has occured. Please try again</p>
					</div> 
					<?php
				}
			}else{
				$this->is_token_valid=TRUE;
				?>
				<div class="updated">
					<p>Your token was successfully added!</p>
				</div> 
				<?php
				echo '<META HTTP-EQUIV="REFRESH" CONTENT="0">' ;
			}
		}

	}

}