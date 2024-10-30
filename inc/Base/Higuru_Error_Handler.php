<?php 
/**
 * @package  hi.guruWebMessagePlugin
 */
namespace Inc_Higuru\Base;
use Inc_Higuru\Base\Higuru_Base_Controller;
use WP_Error;

class Higuru_Error_Handler extends Higuru_Base_Controller{

    public function higuru_is_error($response){
        $response_code= wp_remote_retrieve_response_code($response);

        if ($response_code!=200 && $response_code!=201){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function higuru_process_error_response($response)
    {
        $response_code= wp_remote_retrieve_response_code($response);
        switch ($response_code) {
            case 200:
                return new WP_Error( '200', 'No error' );
                break;
            case 201:
                return new WP_Error( '201', 'Created. No error' );
                break;
            case 401:
                Higuru_Options::clear_all_higuru_session_options();
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="0">' ;
            return new WP_Error( '401', 'Session Expired. Please log in again' );
                break;
            case 403:
                return new WP_Error( '403', 'Email or password incorrect. Please try again' );
                break;
            case 422:
                Higuru_Options::clear_higuru_settings_options();
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="0">' ;
                return new WP_Error( '422', 'Unprocessable entity' );
                break;
            case 500:
                Higuru_Options::clear_higuru_settings_options();
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="0">' ;
                return new WP_Error( '500', 'Server Error. Please try again later' );
                break;
            default:
                Higuru_Options::clear_higuru_settings_options();
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="0">' ;
                return new WP_Error( $response_code, 'An error has occured' );
        }
    }
}