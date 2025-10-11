<div class="egx-project-4-wrap">
<?php foreach($settings['projects'] as $item):?>
    <div class="egx-project-4-card">
        <?php if(!empty($item['project_img']['url'])):?>
            <div class="card-img img-cover">
                <img src="<?php echo esc_url($item['project_img']['url']);?>" alt="<?php if(!empty($item['project_img']['alt'])){ echo esc_attr($item['project_img']['alt']);}?>">
            </div>
        <?php endif;?>
        <div class="content-bottom">
            <div class="content-wrap">
                <div class="content">
                    <a target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo esc_url($item['link']['url']);?>">
                        <img src="<?php echo esc_url($settings['arrow']['url']);?>" alt="<?php if(!empty($settings['arrow']['alt'])){ echo esc_attr($settings['arrow']['alt']);}?>">
                    </a>
                    <div class="title-wrap">
                        <?php if(!empty($item['category'])):?>
                            <span class="category"><?php echo eergx_wp_kses($item['category'])?></span>
                        <?php endif;?>
                        
                        <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($item['title'])?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</div>