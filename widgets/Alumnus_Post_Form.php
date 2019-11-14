<?php 

if (! class_exists('Alumnus_Post_Form')) {
    class Alumnus_Post_Form extends WP_Widget {
        public function __construct() {
            $widget_options = array(
            'description' => 'Alumnus Post Form which can be placed anywhere'
            );
            parent::__construct( 'Alumnus_Post_Form', 'Alumnus Post Form', $widget_options);
        }
        public function widget( $args, $instance ) {
            if (isset($instance['title'])) {
                $title = apply_filters( 'widget_title', $instance['title'] );
            }
            echo $args['before_widget'];
        ?>
            <div class="grid-container">

            <?php if (isset($instance['title'])) { ?>
                  <div class="loginTile__title">
                      <div class="active">
                          <h2><?php echo $args['before_title'] . $title . $args['after_title']; ?></h2>
                      </div>
                  </div>
              <?php } ?>
            
              <?php require_once get_template_directory() . '/functions/dashboard/alumnus_create_post.php'; ?>
              <form name="createPost" id="createPost" method="POST" action="<?php echo esc_url( site_url( '/new-post' )) ?>" enctype="application/x-www-form-urlencoded">
                <textarea name="content" row="3" placeholder="What's On Your Mind?"></textarea>
                <input name="image" type="file">

                  <!-- <input type="hidden" name="redirect_to" value="' . esc_url( site_url( '' )) .'"> -->
                  <input type='submit' name='submit' value="Post" />
              </form>
            </div>
        <?php
            echo $args['after_widget'];
        }

        public function form( $instance ) {
            if ( isset( $instance[ 'title' ] )) {
                $title = $instance[ 'title' ];
            }
            else {
                $title = __( 'New title', '' );
            }
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <?php
        }
      
        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            return $instance;
        }
    }
}