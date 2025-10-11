<div class="egx-services-3-wrap">
    <!-- card -->
    <?php foreach($settings['services'] as $item):?>
        <div class="egx-services-3-card wow fadeInUp" <?php if(!empty($item['anims'])):?> data-wow-delay="<?php echo esc_attr($item['anims']);?>" <?php endif;?>>
            <?php if(!empty($item['service_img']['url'])):?>
                <div class="card-top">
                    <div class="card-img img-cover">
                        <img src="<?php echo esc_url($item['service_img']['url']);?>" alt="<?php if(!empty($item['service_img']['alt'])){ echo esc_attr($item['service_img']['alt']);}?>">
                    </div>
                    <div class="card-img img-cover">
                        <img src="<?php echo esc_url($item['service_img']['url']);?>" alt="<?php if(!empty($item['service_img']['alt'])){ echo esc_attr($item['service_img']['alt']);}?>">
                    </div>
                </div>
            <?php endif;?>
            <div class="card-content">
                <div class="top">
                    <span class="icon">
                        <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </span>
                    <h4 class="egx-heading-1 title">
                        <a target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo esc_url($item['link']['url']);?>"><?php echo eergx_wp_kses($item['title'])?></a>
                    </h4>
                </div>
                <?php if(!empty($item['description'])):?>
                <p class="egx-para-1 disc"><?php echo eergx_wp_kses($item['description'])?></p>
                <?php endif;?>
            </div>
        </div>
    <?php endforeach;?>
</div>