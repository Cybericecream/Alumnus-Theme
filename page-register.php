<?php

get_header(); ?>

<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>    
	<div class="form-background-image" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat;">
		<?php the_widget( 'Alumnus_Register_Form' ); ?>
	</div> 
<?php get_footer(); ?>