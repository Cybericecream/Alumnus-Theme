<?php 

    class Alumnus_Callender extends WP_Widget {
        public function __construct() {
            $widget_options = array(
            'description' => 'Alumnus Callender which can be placed anywhere'
            );
            parent::__construct( 'Alumnus_Callender', 'Alumnus Callender', $widget_options);
        }
        public function widget( $args, $instance ) {
            if (isset($instance['title'])) {
                $title = apply_filters( 'widget_title', $instance['title'] );
            }
            echo $args['before_widget'];
        ?>
            <?php if (isset($instance['title'])) { ?>
                <div class="loginTile__title">
                    <div class="active">
                        <h2><?php echo $title; ?></h2>
                    </div>
                </div>
            <?php } ?>
            <div class="eventCallender">
                <?php 

                $loop = new WP_Query( array(
                    'post_type' => 'events',
                    'posts_per_page' => 0
                )
                );
                
                $count = 1;
                
                while (  $count < $instance['amount'] && $loop->have_posts() ) : $loop->the_post() ?>
                    <div class="wrap-<?php echo $count; ?>">
                        <input type="radio" id="tab-<?php echo $count; ?>" name="tabs">
                        <label for="tab-<?php echo $count; ?>"><div><?php the_title(); ?></div><div class="cross"></div></label>
                        <div class="content">
                            <span><?php echo esc_attr( get_post_meta( get_the_ID(), 'hcf_published_date', true ) ); ?></span>
                            <p><?php echo esc_attr( get_post_meta( get_the_ID(), 'event_description', true ) ); ?></p>
                        </div>
                    </div>
                <?php 

                $count++;

                endwhile; wp_reset_query();?>
            </div>
        <?php
            echo $args['after_widget'];
        }

        public function form( $instance ) {
            if ( isset( $instance[ 'title' ] )) {
                $title = $instance[ 'title' ];
                $amount = $instance[ 'amount' ];
            }
            else {
                $title = __( 'New title', '' );
                $amount = __( 3, '' );
            }
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
                <label for="<?php echo $this->get_field_id( 'amount' ); ?>"><?php _e( 'Amount Displayed:' ); ?></label>
                <input class="" id="<?php echo $this->get_field_id( 'amount' ); ?>" name="<?php echo $this->get_field_name( 'amount' ); ?>" type="number" value="<?php echo esc_attr( $amount ); ?>" />
            </p>
            <?php
        }
    
        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['amount'] = ( ! empty( $new_instance['amount'] ) ) ? strip_tags( $new_instance['amount'] ) : '';
            return $instance;
        }
    }

