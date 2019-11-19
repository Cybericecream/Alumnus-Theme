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
    <div class="cell large-6 small-6">
      <h2 class="welcome">
        <span class="welcomeSub">Welcome.</span><br />
        <span class="uppercase">tafe</span> Alumni<br />
        <a href="signUp.php" class="uppercase primaryButton">sign-up</a>
      </h2>
    </div>
  </div>
</div>

</figcaption>

<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span> &#9664;&#xFE0E;</button>
<button class="orbit-next"><span class="show-for-sr">Next Slide</span> &#9654;&#xFE0E;</button>

</div>

<div class="outer">
  <div class="body grid-x">
    <div class="cell large-8 small-12 grid-x grid-padding-x grid-padding-y">
      <div class="cell small-12">
      <?php if ( true == get_theme_mod( 'static_index_toggle', true ) ) : ?>
        <h2><?php echo get_theme_mod( 'index_title', 'h2 ' ); ?></h2>
        <p><?php echo get_theme_mod( 'index_paragraph', 'p ' ); ?></p>
      <?php endif; ?>       
      </div>

      <?php
      $loop = new WP_Query( array(
          'post_type' => 'post',
          'posts_per_page' => -1
        )
      );
      ?>

      <?php while ( $count < get_theme_mod( 'index_post_list', '5' ) && $loop->have_posts() ) : $loop->the_post(); ?>

      <?php if ( has_post_thumbnail() ) { ?>

        <div class="cell small-12 userPost grid-x">
            <div class="cell small-12 grid-x">
              <div class="cell txt large-7 small-12 large-order-1 small-order-2">

                  <div class="profile">
                   <div class="profileImage">
                    <!-- <img src="users/profile/1.jpg"/> -->
                    <?php echo get_avatar( get_the_author_meta('ID'), 50); ?>
                  </div>
                  <h2><?php the_author(); ?></h2>
                  <h3><?php the_date(); ?></h3>
                </div>
                  <p><?php the_content(); ?></p>
                </div>
                <div class="cell large-5 small-12 large-order-2 small-order-1 postImage">
                  <?php the_post_thumbnail( 'full' ); ?>
                </div>
              </div>
            </div>

      <?php 
          }else{ 
      ?>
      
      <div class="cell small-12 userPost grid-x">
            <div class="cell small-12 grid-x">
              <div class="cell txt small-12">

                  <div class="profile">
                  <div class="profileImage">
                    <!-- <img src="users/profile/1.jpg"/> -->
                    <?php echo get_avatar( get_the_author_meta('ID'), 50); ?>
                  </div>
                  <h2><?php the_author(); ?></h2>
                  <h3><?php the_date(); ?></h3>
                </div>
                  <p><?php the_content(); ?></p>
                </div>
              </div>
            </div>

      <?php
      } 

      $count++;
      
      endwhile; wp_reset_query(); ?>

    </div>
    <div class="cell large-4 small-0 hide-for-small-only hide-for-medium-only widgetHolder grid-x">

    <?php if ( is_active_sidebar( 'index_widget_area' ) ) : ?>
      <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
        <?php dynamic_sidebar( 'index_widget_area' ); ?>
      </div>
    <?php endif; ?>

    </div>
  </div>

</div>


<?php get_footer(); ?>