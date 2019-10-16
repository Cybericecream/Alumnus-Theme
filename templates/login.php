<?php 
/** 
* Template Name: Login
*/ 
ob_start();
get_header();
?>
	<!-- Custom Login functionality -->
	<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
	<div class="form-background-image " style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat;">
	<div class="grid-x">
		

	<div class="cell large-4 large-offset-4 medium-6 medium-offset-3 small-10 small-offset-1 main-form first widgetBlock">
    <div class="grid-x grid-padding-x">
        <div class="main-form__title cell small-12 grid-x text-center">
          <div class="cell small-6 ">
            <a href="/register"><h2 class="unselected uppercase">Register</h2></a>
          </div>
          <div class="cell small-6 active">
          <h2 class="highlight uppercase">Log-in</h2>
          </div>
        </div>
        <div class="main-form__body cell small-12">
			<?php the_widget( 'Alumnus_Login_Form' ); ?> 
        </div>
        <div class="cell small-12 already text-center">
          <p>Not Registered up? Register <a class="highlight" href="/register"><u>here</u></a></p>
        </div>
      </div>
    </div>
</div>
	  </div>

<?php get_footer(); ?>

