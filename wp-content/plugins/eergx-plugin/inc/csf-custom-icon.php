<?php 
if( ! function_exists( 'eergx_csf_custom_icon' ) ) {

    function eergx_csf_custom_icon( $icons ) {
    
        // Adding new icons
        $icons[]  = array(
          'title' => 'eergx Flaticon',
          'icons' => array(
            "flaticon-arrow-point-to-down",
            "flaticon-phone-call",
            "flaticon-checked",
            "flaticon-idea",
            "flaticon-quote",
            "flaticon-map",
            "flaticon-like",
            "flaticon-shopping-cart",
            "flaticon-rocket",
            "flaticon-trophy",
            "flaticon-coding",
            "flaticon-cup",
            "flaticon-call",
            "flaticon-solution",
            "flaticon-magnifying-glass",
            "flaticon-member",
            "flaticon-more",
            "flaticon-medal",
            "flaticon-live-chat",
            "flaticon-graphic-design",
            "flaticon-right-arrows",
            "flaticon-follower",
            "flaticon-top-right",
            "flaticon-trophy-1",
            "flaticon-play",
            "flaticon-maintenance",
            "flaticon-achievement",
            "flaticon-add",
           "flaticon2-play-button","flaticon2-apple-logo","flaticon2-blocks-with-angled-cuts","flaticon2-home-page","flaticon2-angle-arrow-pointing-to-right","flaticon2-media-play-symbol","flaticon2-calendar","flaticon2-play-arrow","flaticon2-chat-bubbles-with-ellipsis","flaticon2-arrow-pointing-to-right","flaticon2-telephone","flaticon2-big-anchor","flaticon2-security","flaticon2-plus-symbol","flaticon2-right-arrow","flaticon2-left-arrow","flaticon2-email","flaticon2-magnifying-glass","flaticon2-user","flaticon2-money-bag","flaticon2-dollar-symbol","flaticon2-garbage","flaticon2-next","flaticon2-placeholder","flaticon2-heart","flaticon2-settings","flaticon2-like","flaticon2-avatar","flaticon2-share","flaticon2-house","flaticon2-cancel","flaticon2-headphones","flaticon2-phone-call","flaticon2-shopping-cart","flaticon2-envelope","flaticon2-menu","flaticon2-menu-1","flaticon2-multiply","flaticon2-stopwatch","flaticon2-search","flaticon2-unlink","flaticon2-list","flaticon2-left-quote","flaticon2-right-quote","flaticon2-wifi","flaticon2-paper-plane","flaticon2-pdf","flaticon2-edit","flaticon2-eye","flaticon2-placeholder-1","flaticon2-settings-1","flaticon2-chat","flaticon2-home","flaticon2-megaphone","flaticon2-padlock","flaticon2-message","flaticon2-playstore","flaticon2-down-arrow","flaticon2-next-1","flaticon2-secure-shield","flaticon2-trophy","flaticon2-maps-and-flags","flaticon2-bar-chart","flaticon2-right","flaticon2-call","flaticon2-play-button-1","flaticon2-search-1","flaticon2-call-1","flaticon2-hand-shake","flaticon2-map","flaticon2-user-1","flaticon2-checked","flaticon2-briefcase","flaticon2-eye-1","flaticon2-like-1","flaticon2-down-arrow-1","flaticon2-up-arrow","flaticon2-left-arrow-1","flaticon2-right-arrow-1","flaticon2-list-1","flaticon2-email-1","flaticon2-quote","flaticon2-menu-2","flaticon2-clock","flaticon2-full-screen","flaticon2-reply-all","flaticon2-megaphone-1","flaticon2-music-note","flaticon2-iphone","flaticon2-link","flaticon2-star","flaticon2-wall-clock","flaticon2-line-chart","flaticon2-quote-1","flaticon2-play","flaticon2-instagram","flaticon2-pinterest","flaticon2-twitter","flaticon2-whatsapp","flaticon2-phone-call-1","flaticon2-cancel-1","flaticon2-connection","flaticon2-law","flaticon2-plus","flaticon2-trophy-1","flaticon2-placeholder-2","flaticon2-heart-1","flaticon2-calendar-1","flaticon2-email-2","flaticon2-support","flaticon2-left-arrow-2","flaticon2-check","flaticon2-down-arrow-2","flaticon2-time","flaticon2-next-2","flaticon2-shopping-bag","flaticon2-loupe","flaticon2-briefcase-1","flaticon2-light-bulb","flaticon2-planet-earth","flaticon2-headphones-1","flaticon2-conversation","flaticon2-check-1","flaticon2-call-2","flaticon2-portfolio","flaticon2-user-2","flaticon2-mouse","flaticon2-phone","flaticon2-trophy-2","flaticon2-video-camera","flaticon2-shield","flaticon2-shopping-cart-1","flaticon2-pen","flaticon2-squares","flaticon2-web-programming","flaticon2-share-1","flaticon2-folder","flaticon2-youtube","flaticon2-group","flaticon2-high-signal","flaticon2-policy","flaticon2-clock-1","flaticon2-arrows","flaticon2-handshake","flaticon2-download","flaticon2-menu-3","flaticon2-creative-design","flaticon2-tag","flaticon2-bubble-chat","flaticon2-quote-2","flaticon2-quote-3","flaticon2-envelope-1","flaticon2-send","flaticon2-right-arrow-2","flaticon2-down-arrow-3","flaticon2-checked-1","flaticon2-settings-2","flaticon2-shopping-cart-2","flaticon2-pinterest-1","flaticon2-document","flaticon2-notepad","flaticon2-clock-2","flaticon2-book","flaticon2-placard","flaticon2-deal","flaticon2-idea","flaticon2-shopping-basket","flaticon2-email-3","flaticon2-double-check","flaticon2-digital-learning","flaticon2-gear","flaticon2-right-1","flaticon2-red-carpet","flaticon2-red-carpet-1","flaticon2-minus","flaticon2-bag","flaticon2-training","flaticon2-padlock-1","flaticon2-lamp","flaticon2-atom","flaticon2-thumbs-up","flaticon2-bulb","flaticon2-inspiration","flaticon2-menu-4","flaticon2-calendar-2","flaticon2-trophy-3","flaticon2-add-to-cart","flaticon2-play-1","flaticon2-poinsettia","flaticon2-tik-tok","flaticon2-heart-2","flaticon2-conversation-1","flaticon2-briefcase-2","flaticon2-atom-1","flaticon2-facebook","flaticon2-behance","flaticon2-target","flaticon2-reload","flaticon2-pdf-1","flaticon2-calendar-3","flaticon2-placeholder-3","flaticon2-people","flaticon2-tourist","flaticon2-smile","flaticon2-clock-3","flaticon2-linkedin","flaticon2-party","flaticon2-location","flaticon2-telephone-1","flaticon2-red-carpet-2","flaticon2-youtube-1","flaticon2-instagram-1","flaticon2-hamburger","flaticon2-countries","flaticon2-mic","flaticon2-creative-mind","flaticon2-voice","flaticon2-leader","flaticon2-cloud-download"
          )
        );
    
        // Move custom icons to top of the list.
        $icons = array_reverse( $icons );
    
        return $icons;
    
      }
      add_filter( 'csf_field_icon_add_icons', 'eergx_csf_custom_icon' );
    }