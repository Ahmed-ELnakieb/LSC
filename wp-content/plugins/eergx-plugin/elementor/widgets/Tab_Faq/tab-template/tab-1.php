<div class="egx-faq-1-wrap">
    <div class="egx-faq-1-left">
        <div class="faq-tab-btn-wrap bg-default" id="nav-tab" role="tablist" data-background="<?php echo esc_url($settings['faq_bg']['url']);?>">
            <?php
                foreach( $settings['tabs'] as $id => $item ) :
                $active = ($id == 0) ? 'active' : '';
                $aria_selected = ($id == 0) ? 'true' : 'false';

            ?>
            <button class="faq-btn <?php echo esc_attr($active); ?>" id="nav-are-tab<?php echo esc_attr($id); ?>" data-bs-toggle="tab" data-bs-target="#nav-are<?php echo esc_attr($id); ?>" type="button" role="tab" aria-controls="nav-are<?php echo esc_attr($id); ?>" aria-selected="true"><?php echo eergx_wp_kses($item['tab_title']);?></button>
            <?php endforeach;?>
        </div>

        <?php if(!empty($settings['description'])):?>
            <p class="egx-para-1 disc"><?php echo eergx_wp_kses($settings['description']);?></p>
        <?php endif;?>

        <div class="award">
            <span class="icon">
                <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
            </span>
            <h3 class="number"><span class="number"><?php echo eergx_wp_kses($settings['count']);?></span><?php if(!empty($settings['prefix'])){ echo esc_html($settings['prefix']);}?></h3>
            <?php if(!empty($settings['count_title'])):?>
                <span class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['count_title']);?></span>
            <?php endif;?>
        </div>
    </div>

    <div class="tab-content egx-faq-1-right" id="nav-tabContent">
        
        <?php
            $rand__id = rand( 457788, 45785 );
            foreach( $settings['tabs'] as $id => $item ) :
            $active = ($id == 0) ? 'show active' : '';
        ?>
        <div class="tab-pane fade <?php echo esc_attr($active); ?>" id="nav-are<?php echo esc_attr($id); ?>" role="tabpanel" aria-labelledby="nav-are-tab<?php echo esc_attr($id); ?>" tabindex="0">
            <div class="accordion" id="accordion<?php echo esc_attr( $rand__id );?>">
                <?php foreach($item['accordions'] as $ids => $faq):
                    $collapsed_tab = ($ids == 0) ? '' : 'collapsed';
                    $area_expanded = ($ids == 0) ? 'true' : 'false';
                    $active_show_tab = ($ids == 0) ? 'show' : '';    
                    $active_show_bg = ($ids == 0) ? 'faq_active' : '';    
                ?>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button <?php echo esc_attr($collapsed_tab);?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_attr( $rand__id );?>-<?php echo esc_attr($faq['_id'] ); ?>" aria-expanded="true" aria-controls="collapse<?php echo esc_attr( $rand__id );?>-<?php echo esc_attr($faq['_id'] ); ?>">
                            <?php if(!empty($faq['count'])):?>
                                <span class="number"><?php echo esc_html($faq['count']);?></span>
                            <?php endif;?>
                            <?php if(!empty($faq['title'])):?>
                                <span class="text"><?php echo eergx_wp_kses($faq['title'])?></span>
                            <?php endif;?>
                            <div class="icon">
                                <span class="plus">&#x002B;</span>
                                <span class="minus">&#x2212;</span>
                            </div>
                        </button>
                    </h2>
                    <div id="collapse<?php echo esc_attr( $rand__id );?>-<?php echo esc_attr($faq['_id'] ); ?>" class="accordion-collapse collapse <?php echo esc_attr($active_show_tab);?>" data-bs-parent="#accordion<?php echo esc_attr( $rand__id );?>">
                        <div class="accordion-body">
                            <p class="egx-para-1 disc"><?php echo eergx_wp_kses($faq['description'])?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
        <?php endforeach;?>
    </div>

</div>