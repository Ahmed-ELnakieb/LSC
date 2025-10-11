<?php 
    $rand__id = rand( 457788, 45785 );
?>
<div class="egx-faq-2-wrap">
    <div class="content">
        <div class="accordion" id="accordion<?php echo esc_attr( $rand__id );?>">
            <?php foreach($settings['faqs'] as $id => $item):
                $collapsed_tab   = ($id == 0) ? '' : 'collapsed';
                $area_expanded   = ($id == 0) ? 'true' : 'false';
                $active_show_tab = ($id == 0) ? 'show' : '';
                $active_show_bg  = ($id == 0) ? 'faq_active' : '';
            ?>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button <?php echo esc_attr($collapsed_tab);?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_attr( $rand__id );?>-<?php echo esc_attr($item['_id'] ); ?>" aria-expanded="<?php echo esc_attr($area_expanded);?>" aria-controls="collapse<?php echo esc_attr( $rand__id );?>-<?php echo esc_attr($item['_id'] ); ?>">
                    <?php if(!empty($item['count'])):?>
                        <span class="number"><span><?php echo esc_html($item['count']);?></span></span>
                    <?php endif;?>
                    <span class="text"><?php echo eergx_wp_kses($item['title']);?></span>
                    <div class="icon">
                        <span class="up-icon">
                            <i class="fa-solid fa-angle-up"></i>
                        </span>
                        <span class="down-icon">
                            <i class="fa-solid fa-angle-down"></i>
                        </span>
                    </div>
                </button>
                </h2>
                <div id="collapse<?php echo esc_attr( $rand__id );?>-<?php echo esc_attr($item['_id'] ); ?>" class="accordion-collapse collapse <?php echo esc_attr($active_show_tab);?>" data-bs-parent="#accordion<?php echo esc_attr( $rand__id );?>">
                    <div class="accordion-body">
                        <p class="egx-para-1 disc"><?php echo eergx_wp_kses($item['description']);?></p>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
