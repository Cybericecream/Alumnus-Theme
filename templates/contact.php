<?php
/**
* Template Name: Contact
*/
ob_start();
get_header();
global $post;

?>
	<!-- Custom Registration functionality -->
	<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
<!-- 	<div class="form-background-image" style="background: url('<?php //echo $backgroundImg[0]; ?>') no-repeat;"> -->
		<div class="body">
				<div class="aboutHero">
					<img src="<?php echo $backgroundImg[0]; ?>" />
				</div>
			<div class="grid-container">
				<div class="grid-x aboutContent">
						<div class="cell small-12">
							<div class="grid-x">
							<div class="cell large-5 small-12 ">
								<img src="<?php echo esc_url( get_theme_mod( 'contact_image' ) ); ?>">  
							</div>
							<div class="cell large-7 small-12 widgetBlock aboutText">
								<h2><?php echo $post->post_title; ?></h2>
								<p><?php echo $post->post_content; ?></p>
								<?php if ( is_active_sidebar( 'test_area' ) ) : ?>
									<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
										<?php dynamic_sidebar( 'test_area' ); ?>
									</div>
								<?php endif; ?>
								<?php if ( is_active_sidebar( 'contact_widget_area' ) ) : ?>
								<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
									<?php dynamic_sidebar( 'contact_widget_area' ); ?>
								</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
<?php get_footer(); ?>