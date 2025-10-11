<?php 

//Recent Posts
class eergx_Recent_Product extends WP_Widget{
    /** constructor */
    public function __construct()
    {
        parent::__construct( /* Base ID */'eergx_Recent_Product', /* Name */esc_html__('Offer Product', 'eergx-tools'), array( 'description' => esc_html__('Show the Recent Posts', 'eergx-tools')));
    }


    /** @see WP_Widget::widget */
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        echo wp_kses_post($before_widget); ?>
		
		<div class="news-widget">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <!-- Footer Column -->
                <?php $query_string = array('showposts'=>$instance['number']);
					if ($instance['cat']) {
						$query_string['tax_query'] = array(array('taxonomy' => 'product_cat','field' => 'id','terms' => (array)$instance['cat']));
					}
					$this->posts($query_string); 
				?>
        </div>
        
        <?php echo wp_kses_post($after_widget);
    }


    /** @see WP_Widget::update */
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = $new_instance['number'];
        $instance['cat'] = $new_instance['cat'];

        return $instance;
    }

    /** @see WP_Widget::form */
    public function form($instance)
    {
        $title = ($instance) ? esc_attr($instance['title']) : esc_html__('Recent Post', 'eergx-tools');
        $number = ($instance) ? esc_attr($instance['number']) : 3;
        $cat = ($instance) ? esc_attr($instance['cat']) : ''; ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'eergx-tools'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'eergx-tools'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'eergx-tools'); ?></label>
            <?php wp_dropdown_categories(array('show_option_all'=>esc_html__('All Categories', 'eergx-tools'), 'taxonomy' => 'category', 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat'))); ?>
        </p>

        <?php
    }

    public function posts($query_string){
        ?>

    <ul class="widget-product">
            <!-- Title -->
            <?php
                $args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => 5,
                    'ignore_sticky_posts' => true,
                    'post_status'         => 'publish',
                    'suppress_filters'    => false,
                    'meta_query'     => array(
                        'relation' => 'OR',
                        array(
                            'key'           => '_sale_price',
                            'value'         => 0,
                            'compare'       => '>',
                            'type'          => 'numeric'
                        ),
                        array(
                            'key'           => '_min_variation_sale_price',
                            'value'         => 0,
                            'compare'       => '>',
                            'type'          => 'numeric'
                        )
                    )
                );

                $query = new WP_Query($args);
                if ($query->have_posts()):
                global $post;
                $iten_number = 0;
                while ($query->have_posts()): $query->the_post();
                $iten_number++;
                $post_thumbnail_id = get_post_thumbnail_id($post->ID);
                $post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id); 
                $product = wc_get_product( get_the_ID() );
                $product = wc_get_product(get_the_ID());
            ?>
            <li class="widget-product__item">
                <div class="thumb"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><img src="<?php echo esc_url($post_thumbnail_url); ?>" alt=""></a></div>
                <div class="content">                                     
                    <h3><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php echo wp_trim_words( get_the_title(), 8, '.' );?></a></h3>                    
                    <?php echo wp_kses_post($product->get_price_html()); ?>  
                    <?php 
                        $rating  = $product->get_average_rating();
                        $count   = $product->get_rating_count();
                        echo wc_get_rating_html( $rating, $count );
                    ?>
                </div>
            </li>
            <?php endwhile; ?>
            <?php endif;
            wp_reset_postdata();?>  
    </ul> 
 <?php           
    }
}