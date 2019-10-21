<?php
/* add new tab called "my custom tab" 
https://gist.github.com/ultimatemember/8cdaf61e7bd9de35512c
*/
/* First we need to extend main profile tabs */
add_filter('um_profile_tabs', 'add_custom_profile_tab', 2000 );
	function add_custom_profile_tab( $tabs ) {
	if ( is_user_logged_in() && get_current_user_id() == um_profile_id() && current_user_can('publish_posts') ) {
		$tabs['mycustomtab'] = array(
			'name' => 'Write',
			'icon' => 'um-faicon-edit',
		);
		}
		return $tabs;	
	}
/* Then we just have to add content to that tab using this action */
add_action('um_profile_content_mycustomtab_default', 'um_profile_content_mycustomtab_default');
function um_profile_content_mycustomtab_default( $args ) { ?>


	<h3>
		<?php _e('Write or share articles you find from around the web!') ?>
	</h3>
	<p>
		<?php _e( 'Write and publish your own articles on the Underground Network by hitting the button below, or share interesting stuff that you find from around the web by installing the bookmarklet below.' ); ?>
	</p>
	<h3>
		<?php _e( 'Publish original article' ); ?>
	</h3>
	<p>
		<a class="button-secondary" target="_blank" href="<?php echo htmlspecialchars( admin_url( 'press-this.php' ) ); ?>"><i class="um-faicon-edit" style="font-size: 20px;margin-right: 5px; position: relative; top: 2px;"></i><?php _e( 'Write  Article' ) ?>
		</a> 
	</p>
	<h3>
		<?php _e( 'To share an article from the web, install the bookmarklet' ); ?>
	</h3>
	<div class="toggle clearfix wp_shortcodes_toggle">
		<div class="wps_togglet">
			<span>Bookmarklet Instructions</span>
		</div>
		<div class="togglec clearfix" style="display: none;">
			<br>
			<form>
				<h3>
					<?php _e( 'Install The Bookmark' ); ?>
				</h3>
				<h4>
					<?php _e( 'Bookmarklet' ); ?>
				</h4>
				<p>
					<?php _e( 'Drag the bookmarklet below to your bookmarks bar. Then, when you&#8217;re on a page you want to share, simply &#8220;press&#8221; it. If you want, you can select some text on the website before pressing the bookmarklet, and that text will appear in your post.' ); ?>
				</p>
				<p class="pressthis-bookmarklet-wrapper">
					<a class="pressthis-bookmarklet button-drag" onclick="return false;" href="<?php echo htmlspecialchars( get_shortcut_link() ); ?>"><span><i class="um-faicon-edit" style="font-size: 20px;margin-right: 5px; position: relative; top: 2px;"></i><?php _e( 'Publish' ); ?></span></a> 
				</p>
				<p>
					<?php _e( 'If you can&#8217;t drag the bookmarklet to your bookmarks (on your mobile device), copy the following code and create a new bookmark. Paste the code into the new bookmark&#8217;s URL field.' ) ?>
				</p>
				<p>
					<textarea style="width: 90%; height: 10em; color: rgb(0, 102, 0); background-color: rgb(238, 255, 238); border: 2px solid rgb(102, 204, 102); padding: 2px; line-height: 1em; word-break: break-all; font-family: monospace; font-size: 16px; background-position: initial initial; background-repeat: initial initial;"><?php echo htmlspecialchars( get_shortcut_link() ); ?></textarea>
				</p>
			</form>
		</div>
	</div>
<?php } 