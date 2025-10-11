<?php 
    if ( ! empty( $settings['btn_link']['url'] ) ) {
        $this->add_link_attributes( 'btn_link', $settings['btn_link'] );
    }
?>
<div class="prthalign">
    <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="egx-btn-1">
        <span class="btn-text" data-back="<?php echo eergx_wp_kses($settings['btn_label']);?>" data-front="<?php echo eergx_wp_kses($settings['btn_label']);?>"></span>
    </a>
</div>
