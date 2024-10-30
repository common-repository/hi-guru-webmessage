<?php
/**
 * @package  hi.guruWebMessagePlugin
 */
namespace Inc_Higuru\Base;
use Inc_Higuru\Base\Higuru_Base_Controller;

class Higuru_Channel_Set extends Higuru_Base_Controller
{
    public function higuru_set_channel($channel_uuid){
        update_option( Higuru_Options::HIGURU_OPTION_CHANNEL_UUID, $channel_uuid );
    }

    //maybe add function to add display variable
}
