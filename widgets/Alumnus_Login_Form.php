<?php 

if (! class_exists('Alumnus_Login_Form')) {
    class Alumnus_Login_Form extends WP_Widget {
        public function __construct() {
            $widget_options = array(
            'description' => 'Alumnus Login Form which can be placed anywhere'
            );
            parent::__construct( 'Alumnus_Login_Form', 'Alumnus Login Form', $widget_options);
        }
        public function widget( $args, $instance ) {
            if (isset($instance['title'])) {
                $title = apply_filters( 'widget_title', $instance['title'] );
            }
            echo $args['before_widget'];
        ?>
            <div class="grid-container">
                <div class="postTile">
              
              <?php if (isset($instance['title'])) { ?>
                  <div class="loginTile__title">
                      <div class="active">
                          <h2><?php echo $args['before_title'] . $title . $args['after_title']; ?></h2>
                      </div>
                  </div>
              <?php } ?>
              <?php require_once get_template_directory() . '/functions/alumnus_login.php' ?>
              <form name="loginForm" id="loginForm" method="POST" action="<?php echo esc_url( site_url( '/login' )) ?>">
                  <input type="text" placeholder="Username or Email Address" class="loginTile__input" name="log">
                  <input type="password" placeholder="Password" class="loginTile__input" name="pwd">
                  <div class="grid-x">
                      <div class="cell small-6 text-center">
                          <button type="reset" class="btn">Clear</button>
                      </div>
                      <div class="cell small-6 text-center">
                          <button type="submit" class="btn primaryButton">Login</button>
                      </div>
                  </div>
                  <input type="hidden" name="redirect_to" value="' . esc_url( site_url( '' )) .'">
                  <input type='hidden' name='submit' />
              </form>
              </div>
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