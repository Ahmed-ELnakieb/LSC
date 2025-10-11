<?php 
    $rand__id = rand( 457788, 45785 );
?>
<div class="egx-faq-3-wrap">
    <div class="accordion" id="accordionOne<?php echo esc_attr( $rand__id );?>">
        <?php $i = 0; foreach($settings['faqs'] as $id => $item): $i++;
            $collapsed_tab   = ($id == 0) ? '' : 'collapsed';
            $area_expanded   = ($id == 0) ? 'true' : 'false';
            $active_show_bg  = ($id == 0) ? 'faq_active' : '';
        ?>
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button <?php echo esc_attr($collapsed_tab);?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo esc_attr( $rand__id );?>-<?php echo esc_attr($item['_id'] ); ?>" aria-expanded="<?php echo esc_attr($area_expanded);?>" aria-controls="collapseOne<?php echo esc_attr( $rand__id );?>-<?php echo esc_attr($item['_id'] ); ?>">
                <span><?php echo eergx_wp_kses($item['title'])?></span>
                <div class="icon">
                    <span class="up-icon">
                        <i class="fa-solid fa-angle-up"></i>
                    </span>
                </div>
            </button>
            </h2>
            <div id="collapseOne<?php echo esc_attr( $rand__id );?>-<?php echo esc_attr($item['_id'] ); ?>" class="accordion-collapse collapse <?php if($i === 1){ echo esc_attr('show');}?> " data-bs-parent="#accordionOne<?php echo esc_attr( $rand__id );?>">
                <div class="accordion-body">
                    <?php if(!empty($item['faq_img']['url'])):?>
                    <div class="main-img">
                        <img src="<?php echo esc_url($item['faq_img']['url']);?>" alt="<?php if(!empty($item['faq_img']['alt'])){ echo esc_attr($item['faq_img']['alt']);}?>">
                    </div>
                    <?php endif;?>
                    <div class="content">
                        <div class="cont-top">
                            <span class="icon">
                                <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </span>
                            <?php if(!empty($item['title'])):?>
                                <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($item['insid_title'])?></h5>
                            <?php endif;?>
                        </div>
                        <?php if(!empty($item['description'])):?>
                            <p class="egx-para-1 disc"><?php echo eergx_wp_kses($item['description'])?></p>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>