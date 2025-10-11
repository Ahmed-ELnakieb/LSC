<?php 
    if ( ! empty( $settings['btn_link']['url'] ) ) {
        $this->add_link_attributes( 'btn_link', $settings['btn_link'] );
    }
?>
<div class="prthalign">
    <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="egx-btn-2 hover-black-btn">
        <span class="btn-text"><?php echo eergx_wp_kses($settings['btn_label']);?></span>
        <span class="btn-icon">
            <i class="fa-solid fa-arrow-right"></i>
        </span>
    </a>
</div>
