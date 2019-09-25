<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 */

get_header(); ?>

<?php get_sidebar('primary-sidebar'); ?>

<!-- <div class="blog-header">
    <h1 class="blog-title"><?php bloginfo( 'name' ); ?></h1>
    <?php $description = get_bloginfo( 'description', 'display' ); ?>
    <?php if($description) { ?><p class="lead blog-description"><?php echo $description ?></p><?php } ?>
</div> -->

<!-- <img class="heroImage" src="images/banner.png" /> -->
<div class="orbit pageCarousel" role="region" data-orbit>
    
  <ul class="orbit-container">

  <?php
  $loop = new WP_Query( array(
      'post_type' => 'slider',
      'posts_per_page' => -1
    )
  );
  ?>

  <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

    <li class="orbit-slide is-active">
      <figure class="orbit-figure heroImage">
        <?php the_post_thumbnail( 'full', array('class' => 'orbit-image')); ?>
        <!-- <img class="orbit-image " src="images/banner01.jpg" alt="Space"> -->
      </figure>
    </li>

  <?php endwhile; wp_reset_query(); ?>

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