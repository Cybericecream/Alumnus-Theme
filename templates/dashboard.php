<?php 
/** 
* Template Name: Dashboard
*/ 

get_header(); ?>

<div class="outer">
  <div class="body grid-x">
    <div class="cell medium-8 small-12 grid-x grid-padding-x grid-padding-y">

      <?php
      $loop = new WP_Query( array(
          'post_type' => 'post',
          'posts_per_page' => -1
        )
      );
      ?>

      <?php while ( $count < 8 && $loop->have_posts() ) : $loop->the_post(); ?>

      <?php if ( has_post_thumbnail() ) { ?>

        <div class="cell small-12 userPost grid-x">
            <div class="cell small-12 grid-x">
			<? [fep_submission_form]?>
              <div class="cell txt medium-7 small-12 medium-order-1 small-order-2">

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
                <div class="cell medium-5 small-12 medium-order-2 small-order-1 postImage">
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
    <div class="cell medium-4 small-0 hide-for-small-only widgetHolder grid-x">

    <?php if ( is_active_sidebar( 'dashboard_widget_area' ) ) : ?>
      <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
        <?php dynamic_sidebar( 'dashboard_widget_area' ); ?>
      </div>
    <?php endif; ?>

    </div>
  </div>

</div>

<?php get_footer(); ?>