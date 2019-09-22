<?php
/** 
* Template Name: Register
*/ 
ob_start();
get_header();
?>
	<!-- Custom Registration functionality -->
	<?php require_once dirname(__FILE__) . '\..\functions\register.php'; ?>
	<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>    
	<div class="form-background-image" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat;">
		<?php the_widget( 'Alumnus_Register_Form' ); ?>
	</div> 
<?php get_footer(); ?>