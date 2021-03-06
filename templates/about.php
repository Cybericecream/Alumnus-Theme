<?php
/**
* Template Name: About
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
							<div class="cell large-5 small-12 hide-for-small-only hide-for-medium-only">
								<img src="<?php echo esc_url( get_theme_mod( 'about_image' ) ); ?>">  
							</div>
							<div class="cell large-7 small-12 widgetBlock aboutText">
								<h2><?php echo $post->post_title; ?></h2>
								<p><?php echo $post->post_content; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
<?php get_footer(); ?>
