<?php
/**
 * @package  hi.guru-web-message
 */
namespace Inc_Higuru\Base;

use Inc_Higuru\Base\Higuru_Base_Controller;

class Higuru_Dashboard extends Higuru_Base_Controller
{
  
    public function higuru_token_add(){
       
        $channel_selector = new Higuru_Channel_Set();
      
		if(isset( $_POST['higuru_token'])){
			
            $selected_channel_uuid=sanitize_text_field($_POST['higuru_token']);
			
			$channel_selector->higuru_set_channel($selected_channel_uuid);
        }
    
        //Add error handling (WP_Error;)
    }

    public function higuru_display_dashboard_form() {
        Higuru_Template_Loader::higuru_load_template( 'higuru-dashboard-template.php', array( null ) );
    }

}

