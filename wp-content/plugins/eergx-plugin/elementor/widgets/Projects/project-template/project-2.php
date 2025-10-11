<div class="egx-project-2-area">
    <div class="project-button-group">
        <button class="filter-button is-checked" data-filter="*"><span><?php esc_html_e('All', 'eergx-plugin') ?></span></button>
        <?php foreach($settings['filters'] as $item):?>
            <button class="filter-button" data-filter=".<?php echo esc_attr($item['filter_id']);?>"><span><?php echo esc_html($item['filter_cat']);?></span></button>
        <?php endforeach;?>
    </div>
    <div class="egx-project-2-wrap grid" data-isotope="{ &quot;masonry&quot;: { &quot;columnWidth&quot;: 0 } }">

        <div class="grid-sizer"></div>
        <?php foreach($settings['projects'] as $item):?>
            <a target="<?php echo esc_attr( $item['link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo esc_url($item['link']['url']);?>" class="egx-project-2-card grid-item img-cover <?php echo esc_attr($item['filter_id']);?>" data-category="energy eco">
                <?php if(!empty($item['project_img']['url'])):?>
                    <img src="<?php echo esc_url($item['project_img']['url']);?>" alt="<?php if(!empty($item['project_img']['alt'])){ echo esc_attr($item['project_img']['alt']);}?>">
                <?php endif;?>
                <div class="card-cont">
                    <span class="icon">
                        <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </span>
                    <h5 class="egx-heading-1 title"><?php echo esc_html($item['title']);?></h5>
                </div>
            </a>
        <?php endforeach;?>
    </div>
</div>
