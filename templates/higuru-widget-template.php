<?php 

    $value = esc_attr(get_option( 'higuru_channel_uuid' ));
    $storedChannel_uuid = $value;
    if($value!=''){

?>
    <input type="hidden" id="higuru_token" value="<?php echo $value ?>" />
    <body onload="higuru_widget_init();enableTokenbutton();">

<?php 
    }


?>
