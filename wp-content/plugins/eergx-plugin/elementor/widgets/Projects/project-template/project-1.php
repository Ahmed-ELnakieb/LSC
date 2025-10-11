<div class="egx-project-1-wrap">
    <?php if(!empty($settings['info'])):?>
        <div class="top-content">
            <span><?php echo eergx_wp_kses($settings['info'])?></span>
            <span> * <?php echo eergx_wp_kses($settings['info'])?></span>
            <span> * <?php echo eergx_wp_kses($settings['info'])?></span>
        </div>
    <?php endif;?>
    <?php foreach($settings['projects'] as $item):?>
        <div class="egx-project-1-card">
            <?php if(!empty($item['project_img']['url'])):?>
            <div class="main-img img-cover">
                <img src="<?php echo esc_url($item['project_img']['url']);?>" alt="<?php if(!empty($item['project_img']['alt'])){ echo esc_attr($item['project_img']['alt']);}?>">
            </div>
            <?php endif;?>
            <div class="card-content">
                <a target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo esc_url($item['link']['url']);?>">
                    <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($item['title'])?></h5>
                    <span class="icon">
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </a>
                <div class="divider"></div>
            </div>
        </div>
    <?php endforeach;?>

</div>