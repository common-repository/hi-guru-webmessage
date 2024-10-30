<?php 
/**
 * @package  hi.guruWebMessagePlugin
 */
namespace Inc_Higuru\Api;
class Higuru_Settings_Api
{
	public $higuru_admin_pages = array();
	public $higuru_admin_sub_pages = array();

	public function higuru_register()
	{
		if ( ! empty($this->higuru_admin_pages) || ! empty($this->higuru_admin_sub_pages) ) {
			add_action( 'admin_menu', array( $this, 'higuru_add_menu' ) );
		}
	}

	public function higuru_add_admin_pages( array $higuru_admin_pages )
	{
		$this->higuru_admin_pages = $higuru_admin_pages;
		return $this;
	}

	public function higuru_add_admin_sub_pages( array $higuru_admin_sub_pages )
	{
		$this->higuru_admin_sub_pages = $higuru_admin_sub_pages;
		return $this;
	}

	public function higuru_add_menu()
	{
		foreach ( $this->higuru_admin_pages as $higuru_page ) {
			add_menu_page( $higuru_page['page_title'], $higuru_page['menu_title'], $higuru_page['capability'], $higuru_page['menu_slug'], $higuru_page['callback'], $higuru_page['icon_url'], $higuru_page['position'] );
		}

		foreach ( $this->higuru_admin_sub_pages as $higuru_page ) {
			add_submenu_page( $higuru_page['parent_slug'], $higuru_page['page_title'], $higuru_page['menu_title'], $higuru_page['capability'], $higuru_page['menu_slug'], $higuru_page['callback'] );
		}
	}
}