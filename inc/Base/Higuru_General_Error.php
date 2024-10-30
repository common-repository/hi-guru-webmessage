<?php
/**
 * @package  hi.guruWebMessagePlugin
 */
namespace Inc_Higuru\Base;
use Inc_Higuru\Base\Higuru_Base_Controller;

class Higuru_General_Error extends Higuru_Base_Controller
{
    public function higuru_display_error_page() {
        Higuru_Template_Loader::higuru_load_template( 'higuru-general-error-template.php',array(null));
    }

 }
