<?php
/** 
* Template Name: Register
*/ 
ob_start();
get_header();
?>
	<!-- Custom Registration functionality -->
	<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>    
	<div class="form-background-image" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat;">
		
		<div class="grid-x">
		

		<div class="cell large-4 large-offset-4 large-6 large-offset-3 small-10 small-offset-1 main-form first widgetBlock">
		<div class="grid-x grid-padding-x">
		<div class="main-form__title cell small-12 grid-x text-center">
          <div class="cell small-6 ">
            <h2 class="highlight uppercase">Register</h2>
          </div>
          <div class="cell small-6 active">
          <a href="/login"><h2 class="unselected uppercase">Log-in</h2></a>
          </div>
        </div>
			<div class="main-form__body cell small-12">
				<?php the_widget( 'Alumnus_Register_Form' ); ?>
			</div>
		  </div>
		</div>
	</div>
		  </div>
<?php get_footer(); ?>