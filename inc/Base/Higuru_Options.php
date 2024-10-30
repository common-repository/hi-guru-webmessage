<?php
/**
 * @package  hi.guruWebMessagePlugin
 */
namespace Inc_Higuru\Base;

class Higuru_Options
{
    const HIGURU_OPTION_CHANNEL_UUID = 'higuru_channel_uuid';
 
    //Add websdk display variable here

    //add logic to clear websdk show token variable

    public static function clear_all_higuru_options(){
        delete_option( Higuru_Options::HIGURU_OPTION_CHANNEL_UUID );
    }

    public static function clear_all_higuru_session_options(){
        delete_option( Higuru_Options::HIGURU_OPTION_CHANNEL_UUID );
    }
    
    public static function clear_higuru_settings_options(){
        delete_option( Higuru_Options::HIGURU_OPTION_CHANNEL_UUID );
    }

}