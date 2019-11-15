<?php 
/** 
* Template Name: Dashboard
*/ 

get_header(); ?>

<div class="outer">
  <div class="body grid-x">
    <div class="cell large-8 small-12 topPadding">
      <div class="grid-x grid-padding-x grid-padding-y">
        <?php
          $posts = get_posts( array(
            'post_type' => 'post',
            'posts_per_page' => 8
            )
          );
        ?>
        <?php 
          foreach ($posts as $post)
          { 
            $authorID = $post->post_author;
            if (has_post_thumbnail($post))
            { ?>
              <div class="cell small-12 userPost grid-x">
                <div class="cell small-12 grid-x">
                  <div class="cell txt large-7 small-12 large-order-1 small-order-2">
                    <div class="profile">
                      <div class="profileImage">
                        <?php echo get_avatar($authorID, 50); ?>
                      </div>
                      <h2><?php echo get_the_author_meta('display_name', $authorID); ?></h2>
                      <h3><?php echo $post->post_date; ?></h3>
                    </div>
                    <p><?php echo $post->post_content; ?></p>
                    <div class="cell large-5 small-12 large-order-2 small-order-1 boxImage">
                      <?php the_post_thumbnail('full') ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            } else { ?>
              <div class="cell small-12 userPost">
                <div class="grid-x">
                  <div class="cell small-12">
                    <div class="grid-x">
                      <div class="cell txt small-12">
                        <div class="profile">
                          <div class="profileImage">
                            <?php echo get_avatar($authorID, 50); ?>
                          </div>
                          <h2><?php echo get_the_author_meta('display_name', $authorID); ?></h2>
                          <h3><?php echo $post->post_date; ?></h3>
                          <div>
                            <p><?php echo $post->post_content; ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
        <?php
          } 
        ?>
      </div>
    </div>
    <div class="cell large-4 small-0 hide-for-small-only widgetHolder">
      <div class="grid-x">
        <?php if ( is_active_sidebar( 'dashboard_widget_area' ) ) : ?>
          <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
            <?php dynamic_sidebar( 'dashboard_widget_area' ); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>


<?php get_footer(); ?>