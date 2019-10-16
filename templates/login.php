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
		

	<div class="cell medium-4 medium-offset-4 small-10 small-offset-1 main-form first grid-x widgetBlock">
        <div class="main-form__title cell small-12 grid-x text-center">
          <div class="cell small-6 ">
            <a href="signUp.php"><h2>Sign-up</h2></a>
          </div>
          <div class="cell small-6 active">
            <a href="logIn.php"><h2>Log-in</h2></a>
          </div>
        </div>
        <div class="main-form__body cell small-12">
			<?php the_widget( 'Alumnus_Login_Form' ); ?> 
        </div>
        <div class="cell small-12 already text-center">
          <p>Not Signed up? Sign up <a href="signUp.php">here</a></p>
        </div>
      </div>
	  </div>
	  </div>

<?php get_footer(); ?>

