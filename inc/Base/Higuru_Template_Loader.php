<?php
/**
 * @package  hi.guruWebMessagePlugin
 */
namespace Inc_Higuru\Base;
use Inc_Higuru\Base\Higuru_Base_Controller;

class Higuru_Template_Loader extends Higuru_Base_Controller
{
    //parameter $templateName : Name of template file to display
    //parameter $params : Optional parameters you want to pass to template
    public static function higuru_load_template($template_name, $params=array())
    {
        ob_start();
        extract( $params );
        include(HIGURU_PLUGIN_DIRECTORY . 'templates/' . $template_name);
        ob_end_flush();
    }
}

// include(HIGURU_PLUGIN_DIRECTORY . 'templates/' . $template_name);
