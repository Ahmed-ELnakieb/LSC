<div class="egx-testimonial-5-wrap">
    <?php foreach($settings['testimonials'] as $item):?>
        <div class="egx-testimonial-5-card">
            <?php if(!empty($item['authore']['url'])):?>
                <div class="card-img img-cover">
                    <img src="<?php echo esc_url($item['authore']['url']);?>" alt="<?php if(!empty($item['authore']['alt'])){ echo esc_attr($item['authore']['alt']);}?>">
                </div>
            <?php endif;?>
            <div class="card-content">
                <blockquote><?php echo eergx_wp_kses($item['feedback'])?></blockquote>
                <div class="dot-wrap">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <h5 class="egx-heading-1 name"><?php echo eergx_wp_kses($item['name'])?></h5>
                <span class="designation"><?php echo eergx_wp_kses($item['designation'])?></span>
            </div>
        </div>
    <?php endforeach;?>
</div>