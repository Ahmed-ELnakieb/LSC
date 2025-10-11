<?php 
    $this->add_render_attribute( 'title', 'class', 'elementor-gt-heading egx-section-title-2 egx-split-text-2 egx-split-text-2-ani' );
?>
<div class="egx-testimonial-4-wrap">
    <div class="testimonial-left">
        <div class="title-wrap">
        <?php if(!empty($settings['subtitle'])):?>
            <h5 class="egx-subtitle-2 egx-class-add">
                <div class="bubble-left">
                    <span class="bubble-1"></span>
                    <span class="bubble-2"></span>
                    <span class="bubble-3"></span>
                    <span class="bubble-4"></span>
                </div>
                <?php echo eergx_wp_kses($settings['subtitle'])?>
                <div class="bubble-right">
                    <span class="bubble-1"></span>
                    <span class="bubble-2"></span>
                    <span class="bubble-3"></span>
                    <span class="bubble-4"></span>
                </div>
            </h5>
        <?php endif;?>
        <?php printf('<%1$s %2$s>%3$s</%1$s>',
            tag_escape($settings['title_tag']),
            $this->get_render_attribute_string('title'),
            $settings['title']
        ); ?>
        </div>

        <!-- preview slider -->
        <div class="egx-testimonial-4-preview">
            <div class="egx-t4-pargination"></div>
            <div class="swiper-container fix egx_t4_preview_active">
                <div class="swiper-wrapper">

                    
                    <?php foreach($settings['testimonials'] as $item):?>
                        <div class="swiper-slide">
                            <div class="preview-item bg-default" data-background="<?php echo esc_url($settings['thumb_img']['url']);?>">
                                <img src="<?php echo esc_url($item['authore_th']['url']);?>" alt="<?php if(!empty($item['authore_th']['alt'])){ echo esc_attr($item['authore_th']['alt']);}?>">
                            </div>
                        </div>
                    <?php endforeach;?>

                </div>
            </div>
        </div>

    </div>

    <div class="testimonial-right">
    <!-- slider -->
    <div class="swiper-container fix egx_testimonial_4_active">
        <div class="swiper-wrapper">
            <?php foreach($settings['testimonials'] as $item):?>
                <div class="swiper-slide">
                    <div class="egx-testimonial-4-item">
                        <div class="main-img-wrap bg-default" data-background="<?php echo esc_url($settings['bg_img']['url']);?>">
                            <?php if(!empty($item['quote']['url'])):?>
                                <div class="quote">
                                    <img src="<?php echo esc_url($item['quote']['url']);?>" alt="<?php if(!empty($item['quote']['alt'])){ echo esc_attr($item['quote']['alt']);}?>">
                                </div>
                            <?php endif;?>

                            <?php if(!empty($item['authore']['url'])):?>
                            <div class="main-img">
                                <img src="<?php echo esc_url($item['authore']['url']);?>" alt="<?php if(!empty($item['authore']['alt'])){ echo esc_attr($item['authore']['alt']);}?>">
                            </div>
                            <?php endif;?>

                        </div>
                        <div class="content">

                            <div class="rating">
                            <?php for($i = 0; $i < $item['rating']; $i++):?>
                                <i class="fa-solid fa-star"></i>
                            <?php endfor;?>
                            </div>
                            <?php if(!empty($item['feedback'])):?>
                            <blockquote>
                            <span>“</span>
                                <?php echo eergx_wp_kses($item['feedback'])?>
                                <span>”</span>
                            </blockquote>
                            <?php endif;?>

                            <div class="divider"></div>
                            
                            <h5 class="egx-heading-1 name"><?php echo eergx_wp_kses($item['name'])?></h5>
                            <?php if(!empty($item['designation'])):?>
                                <span class="designation"><?php echo eergx_wp_kses($item['designation'])?></span>
                            <?php endif;?>

                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
</div>