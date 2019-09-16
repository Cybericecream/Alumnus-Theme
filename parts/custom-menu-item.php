<?php
/**
 * @package Custom_menu_admin
 * @version 1.0
 */
/*
Plugin Name: Custom menu admin
Plugin URI: http://wordpress.org/extend/plugins/#
Description: This is an example plugin
Author: Carlo Daniele
Version: 1.0
Author URI: http://carlodaniele.it/en/
*/
/**
 * Add menu meta box
 *
 * @param object $object The meta box object
 * @link https://developer.wordpress.org/reference/functions/add_meta_box/
 */
function custom_add_menu_meta_box( $object ) {
	add_meta_box( 'custom-menu-metabox', __( 'Font Awesome' ), 'custom_menu_meta_box', 'nav-menus', 'side', 'default' );
	return $object;
}
add_filter( 'nav_menu_meta_box_object', 'custom_add_menu_meta_box', 10, 1);
/**
 * Displays a metabox for authors menu item.
 *
 * @global int|string $nav_menu_selected_id (id, name or slug) of the currently-selected menu
 *
 * @link https://core.trac.wordpress.org/browser/tags/4.5/src/wp-admin/includes/nav-menu.php
 * @link https://core.trac.wordpress.org/browser/tags/4.5/src/wp-admin/includes/class-walker-nav-menu-edit.php
 * @link https://core.trac.wordpress.org/browser/tags/4.5/src/wp-admin/includes/class-walker-nav-menu-checklist.php
 */
function custom_menu_meta_box(){
	global $nav_menu_selected_id;

	?>
	<div id="authorarchive" class="categorydiv">
		
		<div id="" class="">
                <p id="menu-item-url-wrap" class="wp-clearfix">
                    <label class="howto" for="custom-menu-item-url">Font Awesome</label>
                    <input id="custom-menu-item-url" name="menu-item[-19][menu-item-url]" type="text" class="code menu-item-textbox" value="fab fa-wordpress">
                </p>
		</div><!-- /.tabs-panel -->

		<p class="button-controls wp-clearfix">
			<span class="add-to-menu">
				<input type="submit"<?php wp_nav_menu_disabled_check( $nav_menu_selected_id ); ?> class="button-secondary submit-add-to-menu right" value="<?php esc_attr_e('Add to Menu'); ?>" name="add-authorarchive-menu-item" id="submit-authorarchive" />
				<span class="spinner"></span>
			</span>
		</p>

	</div><!-- /.categorydiv -->
<?php
}