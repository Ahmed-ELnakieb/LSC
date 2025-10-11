<?php 
    $this->add_render_attribute( 'title', 'class', 'elementor-gt-heading egx-section-title-1 egx-split-text-2 egx-split-text-2-ani' );

    if ( ! empty( $settings['btn_link']['url'] ) ) {
        $this->add_link_attributes( 'btn_link', $settings['btn_link'] );
    }
?>
<div class="egx-energy-2-wrap">
    <div class="egx-energy-2-left">
        <?php if(!empty($settings['image']['url'])):?>
            <div class="main-img">
                <img src="<?php echo esc_url($settings['image']['url']);?>" alt="<?php if(!empty($settings['image']['alt'])){ echo esc_attr($settings['image']['alt']);}?>">
            </div>
        <?php endif;?>
        <div class="rated">
            <span class="icon">
                <i class="fa-solid fa-star"></i>
            </span>
            <?php if(!empty($settings['tag_line'])):?>
                <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['tag_line'])?></h5>
            <?php endif;?>
        </div>
    </div>
    <div class="egx-energy-2-right">
        <?php if(!empty($settings['subtitle'])):?>
            <h5 class="egx-subtitle-1">
                <?php if(!empty($settings['sub_title_icon']['url'])):?>
                    <img src="<?php echo esc_url($settings['sub_title_icon']['url']);?>" alt="<?php if(!empty($settings['sub_title_icon']['alt'])){ echo esc_attr($settings['sub_title_icon']['alt']);}?>">
                <?php endif;?>
                <span class="gradient"><?php echo eergx_wp_kses($settings['subtitle'])?></span>
            </h5>
        <?php endif;?>
        <?php printf('<%1$s %2$s>%3$s</%1$s>',
        tag_escape($settings['title_tag']),
            $this->get_render_attribute_string('title'),
            $settings['title']
        ); ?>
        <?php if(!empty($settings['description'])):?>
            <p class="egx-para-1 disc elementor-gt-desc"><?php echo eergx_wp_kses($settings['description'])?></p>
        <?php endif;?>
        <div class="content">
            <div class="content-left">
                <?php foreach($settings['bars'] as $item):?>
                    <div class="item">
                        <h5 class="egx-heading-1 title"><?php echo esc_html($item['title']);?></h5>
                        <?php if(!empty($item['imgs']['url'])):?>
                            <span class="icon">
                                <img src="<?php echo esc_url($item['imgs']['url']);?>" alt="<?php if(!empty($item['imgs']['alt'])){ echo esc_attr($item['imgs']['alt']);}?>">
                            </span>
                        <?php endif;?>
                    </div>
                <?php endforeach;?>


            </div>
            <div class="content-right">
                <?php if(!empty($settings['block_title']) || !empty($settings['block_desc'])):?>
                    <div class="topper">
                        <span class="subtitle"><?php echo eergx_wp_kses($settings['block_title'])?></span>
                        <h5 class="egx-heading-1 title"><?php echo eergx_wp_kses($settings['block_desc'])?></h5>
                    </div>
                <?php endif;?>
                <ul>
                    <?php foreach($settings['lists'] as $item):?>
                    <li>
                        <span class="icon"><i class="fa-solid fa-circle-check"></i></span>
                        <span class="list-text"><?php echo eergx_wp_kses($item['title'])?></span>
                    </li>
                   <?php endforeach;?>
                </ul>
                <?php if(!empty($settings['btn_label'])):?>
                    <div class="btn-wrap">
                        <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="egx-btn-2 hover-black-btn">
                            <span class="btn-text"><?php echo eergx_wp_kses($settings['btn_label'])?></span>
                            <span class="btn-icon">
                                <i class="fa-solid fa-arrow-right"></i>
                            </span>
                        </a>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>