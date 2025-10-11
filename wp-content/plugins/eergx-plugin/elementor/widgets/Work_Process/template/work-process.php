<div class="egx-work-1-wrap">
    
    <div class="egx-work-1-item-wrap">
        <?php $i = 0; foreach($settings['process'] as $item): $i++?>
        <div class="egx-work-1-item">
            <?php if(!empty($item['count'])):?>
                <div class="point">
                    <?php if($i % 2 == 1):?>
                        <h5 class="egx-heading-1 number"><?php echo esc_html($item['count']);?></h5>
                    <?php endif;?>
                    <div class="line <?php if(!empty($item['custom_class'])){ echo esc_attr($item['custom_class']);}?>"></div>
                    <?php if($i % 2 == 0):?>
                        <h5 class="egx-heading-1 number"><?php echo esc_html($item['count']);?></h5>
                    <?php endif;?>
                </div>
            <?php endif;?>
            <div class="item-content">
                <?php if($i % 2 == 1):?>
                <div class="item-img img-cover">
                    <img src="<?php echo esc_url($item['image']['url']);?>" alt="<?php if(!empty($item['image']['alt'])){ echo esc_attr($item['image']['alt']);}else{esc_attr_e('Team Image', 'goyto-plugin');}?>">
                </div>
                <?php endif;?>
                <div class="item-right">
                    <?php if(!empty($item['title'])):?>
                        <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($item['title'])?></h5>
                    <?php endif;?>
                    <?php if(!empty($item['description'])):?>
                        <p class="egx-para-1 disc"><?php echo eergx_wp_kses($item['description'])?></p>
                        <?php endif;?>
                    <?php if(!empty($item['btn_label'])):?>
                    <div class="btn-wrap">
                        <a target="<?php echo esc_attr( $item['btn_link']['is_external'] ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( $item['btn_link']['nofollow'] ? 'nofollow' : '' ); ?>" href="<?php echo $item['btn_link']['url'] ? esc_url($item['btn_link']['url']) : ''; ?>" class="egx-btn-3 btn-outline work-btn">
                            <span class="btn-text"><?php echo esc_html($item['btn_label']);?></span>
                            <span class="btn-icon">
                                <svg class="icon" width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="1" y="1" width="30" height="30" rx="15" stroke-width="2"></rect>
                                    <path d="M11.8333 21C11.5833 21 11.4167 20.9167 11.25 20.75C10.9167 20.4167 10.9167 19.9167 11.25 19.5833L19.5833 11.25C19.9167 10.9167 20.4167 10.9167 20.75 11.25C21.0833 11.5833 21.0833 12.0833 20.75 12.4167L12.4167 20.75C12.25 20.9167 12.0833 21 11.8333 21Z"></path>
                                    <path d="M20.1663 20.1667C19.6663 20.1667 19.333 19.8333 19.333 19.3333V12.6667H12.6663C12.1663 12.6667 11.833 12.3333 11.833 11.8333C11.833 11.3333 12.1663 11 12.6663 11H20.1663C20.6663 11 20.9997 11.3333 20.9997 11.8333V19.3333C20.9997 19.8333 20.6663 20.1667 20.1663 20.1667Z"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                    <?php endif;?>
                </div>
                <?php if($i % 2 == 0):?>
                <div class="item-img img-cover">
                    <img src="<?php echo esc_url($item['image']['url']);?>" alt="<?php if(!empty($item['image']['alt'])){ echo esc_attr($item['image']['alt']);}else{esc_attr_e('Team Image', 'goyto-plugin');}?>">
                </div>
                <?php endif;?>
            </div>
        </div>
        <?php endforeach;?>
    </div>

</div>