<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 */

get_header(); ?>

<?php
$args = array(
  'post_type'   => 'testimonials',
  'post_status' => 'publish',
  'tax_query'   => array(
  	array(
  		'taxonomy' => 'testimonial_service',
  		'field'    => 'slug',
  		'terms'    => 'diving'
  	)
  )
 );
 
$testimonials = new WP_Query( $args );
if( $testimonials->have_posts() ) :
?>
  <ul>
    <?php
      while( $testimonials->have_posts() ) :
        $testimonials->the_post();
        ?>
          <li><?php printf( '%1$s - %2$s', get_the_title(), get_the_content() );  ?></li>
        <?php
      endwhile;
      wp_reset_postdata();
    ?>
  </ul>
<?php
else :
  esc_html_e( 'No testimonials in the diving taxonomy!', 'text-domain' );
endif;
?>

<!-- <img class="heroImage" src="images/banner.png" /> -->
<div class="orbit pageCarousel" role="region" data-orbit>
    
  <ul class="orbit-container">

  <li class="orbit-slide is-active">
    <figure class="orbit-figure heroImage">
      <img class="orbit-image " src="images/banner01.jpg" alt="Space">
    </figure>
  </li>

  <li class="orbit-slide is-active">
    <figure class="orbit-figure heroImage">
      <img class="orbit-image " src="images/banner02.jpg" alt="Space">
    </figure>
  </li>

  <li class="orbit-slide is-active">
    <figure class="orbit-figure heroImage">
      <img class="orbit-image " src="images/banner03_1.jpg" alt="Space">
    </figure>
  </li>

  <li class="orbit-slide is-active">
    <figure class="orbit-figure heroImage">
      <img class="orbit-image " src="images/banner05_1.jpg" alt="Space">
    </figure>
  </li>
  <!-- More slides... -->
</ul>

<figcaption class="orbit-caption">

<div class="grid-x carousel-item">
  <div class="cell small-12 grid-x">
    <div class="cell medium-6 small-6">
      <h2 class="welcome">
        <span class="welcomeSub">Welcome.</span><br />
        North Metropolitan<br />
        <span class="uppercase">tafe</span> Alumni<br />
        <a href="signUp.php" class="uppercase primaryButton">sign-up</a>
      </h2>
    </div>

    <div class="cell medium-6 small-6">

    </div>
  </div>
</div>

</figcaption>

<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span> &#9664;&#xFE0E;</button>
<button class="orbit-next"><span class="show-for-sr">Next Slide</span> &#9654;&#xFE0E;</button>

</div>

<?php get_footer(); ?>