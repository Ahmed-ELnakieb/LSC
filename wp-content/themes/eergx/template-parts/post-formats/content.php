<?php 
if('standard' == get_post_format( get_the_ID() ) || 'image' == get_post_format( get_the_ID() ) ){
    get_template_part('template-parts/post-formats/standard');
}elseif('video' == get_post_format( get_the_ID() )){
    get_template_part('template-parts/post-formats/video');
}elseif('gallery' == get_post_format( get_the_ID() )){
    get_template_part('template-parts/post-formats/gallery');
}else{
    get_template_part('template-parts/post-formats/image');
}

?>