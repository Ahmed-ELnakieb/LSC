<div class="egx-contact-5-imgs">

    <?php if(!empty($settings['image']['url'])):?>
        <div class="left-img fix image-pllx">
            <img src="<?php echo esc_url($settings['image']['url']);?>" alt="<?php if(!empty($settings['image']['alt'])){ echo esc_attr($settings['image']['alt']);}?>">
        </div>
    <?php endif;?>
    
    <div class="right-img-wrap">

        <?php if(!empty($settings['image2']['url'])):?>
            <div class="img-1 fix image-pllx">
                <img src="<?php echo esc_url($settings['image2']['url']);?>" alt="<?php if(!empty($settings['image2']['alt'])){ echo esc_attr($settings['image2']['alt']);}?>">
            </div>
        <?php endif;?>

        <?php if(!empty($settings['image3']['url'])):?>
            <div class="img-2 fix image-pllx">
                <img src="<?php echo esc_url($settings['image3']['url']);?>" alt="<?php if(!empty($settings['image3']['alt'])){ echo esc_attr($settings['image3']['alt']);}?>">
            </div>
        <?php endif;?>

    </div>
</div>