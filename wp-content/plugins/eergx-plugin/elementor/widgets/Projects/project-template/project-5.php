<div class="egx-project-3-wrap">
    <?php foreach($settings['projects'] as $item):?>
        <div class="egx-project-3-card active">
            <?php if(!empty($item['project_img']['url'])):?>
                <div class="card-img img-cover">
                    <img src="<?php echo esc_url($item['project_img']['url']);?>" alt="<?php if(!empty($item['project_img']['alt'])){ echo esc_attr($item['project_img']['alt']);}?>">
                </div>
            <?php endif;?>
            <div class="card-content">
                <span class="icon">
                    <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </span>
                <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($item['title'])?></h5>
                <div class="link-wrap">
                    <a target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo esc_url($item['link']['url']);?>" class="link">
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>