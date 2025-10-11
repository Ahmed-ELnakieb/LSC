<div class="egx-testimonial-3-area">
    <div class="swiper-container egx_testimonial_3_active">
        <div class="swiper-wrapper">
            <?php foreach($settings['testimonials'] as $item):?>
                <div class="swiper-slide">
                    <div class="egx-testimonial-3-item">
                        <div class="item-left">
                            <?php if(!empty($item['authore_1']['url'])):?>
                                <div class="main-img img-cover">
                                    <img src="<?php echo esc_url($item['authore_1']['url']);?>" alt="<?php if(!empty($item['authore_1']['alt'])){ echo esc_attr($item['authore_1']['alt']);}?>">
                                </div>
                            <?php endif;?>
                            <?php if(!empty($item['quote']['url'])):?>
                                <div class="quote">
                                    <img src="<?php echo esc_url($item['quote']['url']);?>" alt="<?php if(!empty($item['quote']['alt'])){ echo esc_attr($item['quote']['alt']);}?>">
                                </div>
                            <?php endif;?>
                        </div>
                        <div class="item-right">
                            <?php if(!empty($item['title'])):?>
                                <span class="subtitle"><?php echo eergx_wp_kses($item['title'])?></span>
                            <?php endif;?>
                            <?php if(!empty($item['feedback'])):?>
                            <blockquote class="egx-heading-1">
                                <?php echo eergx_wp_kses($item['feedback'])?>
                            </blockquote><?php endif;?>
                            <div class="user">

                                <?php if(!empty($item['authore_2']['url'])):?>
                                    <div class="user-img">
                                        <img src="<?php echo esc_url($item['authore_2']['url']);?>" alt="<?php if(!empty($item['authore_2']['alt'])){ echo esc_attr($item['authore_2']['alt']);}?>">
                                    </div>
                                <?php endif;?>
                                <div>
                                    <?php if(!empty($item['name'])):?>
                                    <h5 class="egx-heading-1 name"><?php echo eergx_wp_kses($item['name'])?></h5>
                                    <?php endif;?>
                                    <div class="rating">
                                        <?php for($i = 0; $i < $item['rating']; $i++):?>
                                            <i class="fa-solid fa-star"></i>
                                        <?php endfor;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>

        <div class="navigator">
            <div class="egx-test-3-prev">
                <i class="fa-solid fa-arrow-left"></i>
            </div>
            <div class="egx-test-3-next">
                <i class="fa-solid fa-arrow-right"></i>
            </div>
        </div>
    </div>
</div>