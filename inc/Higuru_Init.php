<?php
/**
 * @package  hi.guruWebMessagePlugin
 */

namespace Inc_Higuru;
final class Higuru_Init

{
	/**
	 * Store all the classes inside an array
	 * @return array Full list of classes
	 */

	public static function higuru_get_services() 
	{
		return [
			Pages\Higuru_Admin::class,
			Base\Higuru_Settings_Links::class,
			Base\Higuru_Enqueue::class,
			Base\higuru_Web_Message_Widget::class
		];
	}
	/**
	 * Loop through the classes, initialize them, 
	 * and call the register() method if it exists
	 * @return
	 */
	public static function higuru_register_services() 
	{
		foreach ( self::higuru_get_services() as $class ) {
			$service = self::higuru_instantiate( $class );
			if ( method_exists( $service, 'higuru_register' ) ) {
				$service->higuru_register();
			}
		}
	}
	/**
	 * Initialize the class
	 * @param  class $class    class from the services array
	 * @return class instance  new instance of the class
	 */
	private static function higuru_instantiate( $class )
	{
		$service = new $class();
		return $service;
	}
}
