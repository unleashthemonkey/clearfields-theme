<?php
/*
* Title                   : Thumbnail Gallery (WP NextGEN Gallery Template)
* Version                 : 1.2
* File                    : gallery-dop-thumbnail-gallery.js
* File Version            : 1.2
* Created / Last Modified : 20 June 2012
* Author                  : Marius-Cristian Donea
* Copyright               : © 2012 Marius-Cristian Donea
* Website                 : http://www.mariuscristiandonea.com
* Description             : NextGen Gallery Template.
*/

    if (!defined ('ABSPATH')) die ('No direct access allowed'); 
    
    // Register Styles.
    wp_register_style('DOPNGTG_JScrollPaneStyle', get_template_directory_uri().'/nggallery/libraries/gui/css/jquery.jscrollpane.css');
    wp_register_style('DOPNGTG_NextGENThumbnailGalleryStyle', get_template_directory_uri().'/nggallery/assets/gui/css/jquery.dop.NextGENThumbnailGallery.css');
    // Register JavaScript.
    wp_register_script('DOPNGTG_MouseWheelJS', get_template_directory_uri().'/nggallery/libraries/js/jquery.mousewheel.js', array('jquery'));
    wp_register_script('DOPNGTG_JScrollPaneJS', get_template_directory_uri().'/nggallery/libraries/js/jquery.jscrollpane.min.js', array('jquery'));
    wp_register_script('DOPNGTG_NextGENThumbnailGalleryJS', get_template_directory_uri().'/nggallery/assets/js/jquery.dop.NextGENThumbnailGallery.js', array('jquery'));
    wp_register_script('DOPNGTG_DOPNGTGJS', get_template_directory_uri().'/nggallery/assets/js/dopngtg.js', array('jquery'));

    // Enqueue Styles.
    wp_enqueue_style('DOPNGTG_JScrollPaneStyle');
    wp_enqueue_style('DOPNGTG_NextGENThumbnailGalleryStyle');
   
    // Enqueue JavaScript.
    if (!wp_script_is('jquery', 'queue')){
        wp_enqueue_script('jquery');
    }
    wp_enqueue_script('DOPNGTG_MouseWheelJS');
    wp_enqueue_script('DOPNGTG_JScrollPaneJS');
    wp_enqueue_script('DOPNGTG_NextGENThumbnailGalleryJS');
    wp_enqueue_script('DOPNGTG_DOPNGTGJS');
        
    if (!empty ($gallery)){                
?>
<script type="text/JavaScript">
<!--    
    var DOPNextGENThumbnailGallerySettings<?php echo $gallery->ID;?> = {
        "Width": 900, // Width (value in pixels). Default value: 900. Set the width of the gallery.
        "Height": 600, // Height (value in pixels). Default value: 600. Set the height of the gallery.
        "BgColor": "ffffff", // Background Color (color hex code). Default value: f1f1f1. Set gallery backgrund color.
        "BgAlpha": 100, // Background Alpha (value from 0 to 100). Default value: 100. Set gallery alpha.
        "ImagesOrder": "normal", // Images Order (normal, random). Default value: normal. Set images order.
        "ResponsiveEnabled": "true", // Responsive Enabled (true, false). Default value: true. Enable responsive layout.
        "ThumbnailsPosition": "top", // Thumbnails Position (top, right, bottom, left). Default value: bottom. Set the position of the thumbnails in the gallery.
        "ThumbnailsOverImage": "true", // Thumbnails Over Image (true, false). Default value: false. If the value is true the thumbnails will be displayed over the big image.
        "ThumbnailsBgColor": "000000", // Thumbnails Background Color (color hex code). Default value: f1f1f1. Set the color for the thumbnails background.
        "ThumbnailsBgAlpha": 50, // Thumbnails Background Alpha (value from 0 to 100). Default value: 100. Set the transparancy for the thumbnails background.
        "ThumbnailsSpacing": 10, // Thumbnails Background Alpha (value from 0 to 100). Default value: 100. Set the transparancy for the thumbnails background.
        "ThumbnailsPaddingTop": 10, // Thumbnails Padding Top (value in pixels). Default value: 0. Set the top padding for the thumbnails.
        "ThumbnailsPaddingRight": 10, // Thumbnails Padding Right (value in pixels). Default value: 5. Set the right padding for the thumbnails.
        "ThumbnailsPaddingBottom": 10, // Thumbnails Padding Bottom (value in pixels). Default value: 5. Set the bottom padding for the thumbnails.
        "ThumbnailsPaddingLeft": 10, // Thumbnails Padding Left (value in pixels). Default value: 5. Set the left padding for the thumbnails.
        "ThumbnailsNavigation": "mouse", // Thumbnails Navigation Type (mouse, arrows). Default value: mouse. Set the thumbnails navigation type.
        "ThumbnailsNavigationPrev": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/ThumbnailsPrev.png", // Thumbnails Navigation Previous Button Image (path to image). Upload the image for thumbnails navigation's previous button.
        "ThumbnailsNavigationPrevHover": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/ThumbnailsPrevHover.png", // Thumbnails Navigation Previous Button Hover Image (path to image). Upload the image for thumbnails navigation's previous hover button.
        "ThumbnailsNavigationNext": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/ThumbnailsNext.png", // Thumbnails Navigation Next Button Image (path to image). Upload the image for thumbnails navigation's next button.
        "ThumbnailsNavigationNextHover": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/ThumbnailsNextHover.png", // Thumbnails Navigation Next Button Hover Image (path to image). Upload the image for thumbnails navigation's next hover button.
        "ThumbnailLoader": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/ThumbnailLoader.gif", // Thumbnail Loader (path to image). Set the loader for the thumbnails.
        "ThumbnailWidth": 100, // Thumbnail Width (the size in pixels). Default value: 60. Set the width of a thumbnail.
        "ThumbnailHeight": 100, // Thumbnail Height (the size in pixels). Default value: 60. Set the height of a thumbnail.
        "ThumbnailAlpha": 50, // Thumbnail Alpha (value from 0 to 100). Default value: 50. Set the transparancy of a thumbnail.
        "ThumbnailAlphaHover": 100, // Thumbnail Alpha Hover (value from 0 to 100). Default value: 100. Set the transparancy of a thumbnail when hover.
        "ThumbnailAlphaSelected": 100, // Thumbnail Alpha Selected (value from 0 to 100). Default value: 100. Set the transparancy of a thumbnail when selected.
        "ThumbnailBgColor": "000000", // Thumbnail Background Color (color hex code). Default value: f1f1f1. Set the color of a thumbnail's background.
        "ThumbnailBgColorHover": "ffffff", // Thumbnail Background Color Hover (color hex code). Default value: 000000. Set the color of a thumbnail's background when hover.
        "ThumbnailBgColorSelected": "ffffff", // Thumbnail Background Color Selected (color hex code). Default value: 000000. Set the color of a thumbnail's background when selected.
        "ThumbnailBorderSize": 2, // Thumbnail Border Size (value in pixels). Default value: 2. Set the size of a thumbnail's border.
        "ThumbnailBorderColor": "000000", // Thumbnail Border Color (color hex code). Default value: f1f1f1. Set the color of a thumbnail's border.
        "ThumbnailBorderColorHover": "ffffff", // Thumbnail Border Color Hover (color hex code). Default value: 000000. Set the color of a thumbnail's border when hover.
        "ThumbnailBorderColorSelected": "ffffff", // Thumbnail Border Color Selected (color hex code). Default value: 000000. Set the color of a thumbnail's border when selected.
        "ThumbnailPaddingTop": 0, // Thumbnail Padding Top (value in pixels). Default value: 0. Set top padding value of a thumbnail.
        "ThumbnailPaddingRight": 0, // Thumbnail Padding Right (value in pixels). Default value: 0. Set right padding value of a thumbnail.
        "ThumbnailPaddingBottom": 0, // Thumbnail Padding Bottom (value in pixels). Default value: 0. Set bottom padding value of a thumbnail.
        "ThumbnailPaddingLeft": 0, // Thumbnail Padding Left (value in pixels). Default value: 0. Set left padding value of a thumbnail.
        "ImageLoader": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/ImageLoader.gif", // Image Loader (path to image). Set the loader for the big image.
        "ImageBgColor": "ffffff", // Image Background Color (color hex code). Default value: afafaf. Set the color for the image background.
        "ImageBgAlpha": 100, // Image Background Alpha (value from 0 to 100). Default value: 100. Set the transparancy for the image background.
        "ImageDisplayType": "full", // Image Display Type (fit, full). Default value: fit. Set image display type. The fit value will display the all image. The full value will display the image on the all stage, padding and margin values will not be taken into consideration.
        "ImageDisplayTime": 1000, // Image Display Time (time in miliseconds). Default value: 1000. Set image display duration.
        "ImageMarginTop": 0, // Image Margin Top (value in pixels). Default value: 20. Set top margin value for the image.
        "ImageMarginRight": 0, // Image Margin Right (value in pixels). Default value: 20. Set right margin value for the image.
        "ImageMarginBottom": 0, // Image Margin Bottom (value in pixels). Default value: 20. Set bottom margin value for the image.
        "ImageMarginLeft": 5, // Image Margin Left (value in pixels). Default value: 20. Set top left value for the image.
        "ImagePaddingTop": 5, // Image Padding Top (value in pixels). Default value: 5. Set top padding value for the image.
        "ImagePaddingRight": 5, // Image Padding Right (value in pixels). Default value: 5. Set right padding value for the image.
        "ImagePaddingBottom": 5, // Image Padding Bottom (value in pixels). Default value: 5. Set bottom padding value for the image.
        "ImagePaddingLeft": 5, // Image Padding Left (value in pixels). Default value: 5. Set left padding value for the image.
        "NavigationEnabled": "true", // Enable Navigation (true, false). Default value: true. Enable navigation buttons.
        "NavigationPrev": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/Prev.png", // Navigation Previous Button Image (path to image). Upload the image for navigation's previous button.
        "NavigationPrevHover": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/PrevHover.png", // Navigation Previous Button Hover Image (path to image). Upload the image for navigation's previous hover button.
        "NavigationNext": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/Next.png", // Navigation Next Button Image (path to image). Upload the image for navigation's next button.
        "NavigationNextHover": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/NextHover.png", // Navigation Next Button Hover Image (path to image). Upload the image for navigation's next hover button.
        "NavigationLightbox": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/Lightbox.png", // Navigation Lightbox Button Image (path to image). Upload the image for navigation's lightbox button.
        "NavigationLightboxHover": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/LightboxHover.png", // Navigation Lightbox Button Hover Image (path to image). Upload the image for navigation's lightbox hover button.
        "NavigationTouchDeviceSwipeEnabled": "true", // Swipe Navigation Enabled (true, false). Default value: true. Enable swipe navigation on touch devices.
        "CaptionWidth": 450, // Caption Width (value in pixels). Default value: 900. Set caption width.
        "CaptionHeight": 200, // Caption Height (value in pixels). Default value: 75. Set caption height.
        "CaptionTitleColor": "000000", // Caption Title Color (color hex code). Default value: 000000. Set caption title color.
        "CaptionTextColor": "000000", // Caption Text Color (color hex code). Default value: 000000. Set caption text color.
        "CaptionBgColor": "ffffff", // Caption Background Color (color hex code). Default value: ffffff. Set caption background color.
        "CaptionBgAlpha": 50, // Caption Background Alpha (value from 0 to 100). Default value: 50. Set caption alpha color.
        "CaptionPosition": "bottom-left", // Caption Position (top, right, bottom, left, top-left, top-right, bottom-left, bottom-right). Default value: bottom. Set caption position.
        "CaptionScrollScrubColor": "777777", // Caption Scroll Scrub Color (color hex code). Default value: 777777. Set scroll scrub color.
        "CaptionScrollBgColor": "e0e0e0", // Caption Scroll Background Color (color hex code). Default value: e0e0e0. Set scroll background color.
        "CaptionMarginTop": 0, // Caption Margin Top (value in pixels). Default value: 0. Set caption top margin.
        "CaptionMarginRight": 10, // Caption Margin Right (value in pixels). Default value: 0. Set caption right margin.
        "CaptionMarginBottom": 10, // Caption Margin Bottom (value in pixels). Default value: 0. Set caption bottom margin.
        "CaptionMarginLeft": 10, // Caption Margin Left (value in pixels). Default value: 0. Set caption left margin.
        "CaptionPaddingTop": 10, // Caption Padding Top (value in pixels). Default value: 10. Set caption top padding.
        "CaptionPaddingRight": 10, // Caption Padding Right (value in pixels). Default value: 10. Set caption right padding.
        "CaptionPaddingBottom": 10, // Caption Padding Bottom (value in pixels). Default value: 10. Set caption bottom padding.
        "CaptionPaddingLeft": 10, // Caption Padding Left (value in pixels). Default value: 10. Set caption left padding.
        "LightboxEnabled": "false", // Enable Lightbox (true, false). Default value: true. Enable the lightbox.
        "LightboxWindowColor": "000000", // Lightbox Window Color (color hex code). Default value: 000000. Set the color for the lightbox window.
        "LightboxWindowAlpha": 80, // Lightbox Window Alpha (value from 0 to 100). Default value: 80. Set the transparancy for the lightbox window.
        "LightboxLoader": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/LightboxLoader.gif", // Lightbox Loader (path to image). Set the loader for the lightbox image.
        "LightboxBgColor": "000000", // Lightbox Background Color (color hex code). Default value: 000000. Set the color for the lightbox background.
        "LightboxBgAlpha": 100, // Lightbox Background Alpha (value from 0 to 100). Default value: 100. Set the transparancy for the lightbox background.
        "LightboxMarginTop": 70, // Lightbox Margin Top (value in pixels). Default value: 70. Set top margin value for the lightbox.
        "LightboxMarginRight": 70, // Lightbox Margin Right (value in pixels). Default value: 70. Set right margin value for the lightbox.
        "LightboxMarginBottom": 70, // Lightbox Margin Bottom (value in pixels). Default value: 70. Set bottom margin value for the lightbox.
        "LightboxMarginLeft": 70, // Lightbox Margin Left (value in pixels). Default value: 70. Set top left value for the lightbox.
        "LightboxPaddingTop": 10, // Lightbox Padding Top (value in pixels). Default value: 10. Set top padding value for the lightbox.
        "LightboxPaddingRight": 10, // Lightbox Padding Right (value in pixels). Default value: 10. Set right padding value for the lightbox.
        "LightboxPaddingBottom": 10, // Lightbox Padding Bottom (value in pixels). Default value: 10. Set bottom padding value for the lightbox.
        "LightboxPaddingLeft": 10, // Lightbox Padding Left (value in pixels). Default value: 10. Set left padding value for the lightbox.
        "LightboxNavigationPrev": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/LightboxPrev.png", // Lightbox Navigation Previous Button Image (path to image). Upload the image for lightbox navigation's previous button.
        "LightboxNavigationPrevHover": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/LightboxPrevHover.png", // Lightbox Navigation Previous Button Hover Image (path to image). Upload the image for lightbox navigation's previous hover button.
        "LightboxNavigationNext": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/LightboxNext.png", // Lightbox Navigation Next Button Image (path to image). Upload the image for lightbox navigation's next button.
        "LightboxNavigationNextHover": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/LightboxNextHover.png", // Lightbox Navigation Next Button Hover Image (path to image). Upload the image for lightbox navigation's next hover button.
        "LightboxNavigationClose": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/LightboxClose.png", // Lightbox Navigation Close Button Image (path to image). Upload the image for lightbox navigation's close button.
        "LightboxNavigationCloseHover": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/LightboxCloseHover.png", // Lightbox Navigation Close Button Hover Image (path to image). Upload the image for lightbox navigation's close hover button.
        "LightboxNavigationInfoBgColor": "000000", // Lightbox Navigation Info Background Color (color hex code). Default value: 000000. Set the color for the lightbox info background.
        "LightboxNavigationInfoTextColor": "dddddd", // Lightbox Navigation Info Text Color (color hex code). Default value: dddddd. Set the color for the lightbox info text.
        "LightboxNavigationTouchDeviceSwipeEnabled": "true", // Swipe Lightbox Navigation Enabled (true, false). Default value: true. Enable swipe lightbox navigation on touch devices.
        "SocialShareEnabled": "false", // Social Share Enabled (true, false). Default value: true. Enable AddThis Social Share.
        "SocialShare": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/SocialShare.png", // Social Share Button Image (path to image). Upload the image for social share button.
        "SocialShareLightbox": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/SocialShareLightbox.png", // Lightbox Social Share Button Image (path to image). Upload the image for lightbox social share button.
        "TooltipEnabled": "true", // Tooltip Enabled (true, false). Default value: false. Enable the tooltip. The gallery item needs to have a title for tooltip to work.
        "TooltipBgColor": "ffffff", // Tooltip Background Color (color hex code). Default value: ffffff. Set tooltip background color.
        "TooltipStrokeColor": "000000", // Tooltip Stroke Color (color hex code). Default value: 000000. Set tooltip stroke color.
        "TooltipTextColor": "000000", // Tooltip Text Color (color hex code). Default value: 000000. Set tooltip text color.
        "Slideshow": "true", // Slideshow (true, false). Default value: false. Enable or disable the slideshow.
        "SlideshowTime": 5000, // Slideshow Time (time in miliseconds). Default: 5000. How much time an image stays until it passes to the next one.
        "SlideshowAutostart": "true", // Slideshow Autostart (true, false). Default: true. Set it to true if you want the slideshow to start after imediatly after gallery is displayed.
        "SlideshowLoop": "true", // Slideshow Loop (true, false). Default: true. Set it to false if you want the slideshow to stop when it reaches the last image.
        "SlideshowPlay": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/Play.png", // Slideshow Play Button Image (path to image). Upload the image for slideshow's play button.
        "SlideshowPlayHover": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/PlayHover.png", // Slideshow Play Button Hover Image (path to image). Upload the image for slideshow's play hover button.
        "SlideshowPause": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/Pause.png", // Slideshow Pause Button Image (path to image). Upload the image for slideshow's pause button.
        "SlideshowPauseHover": "<?php echo get_template_directory_uri()?>/nggallery/assets/gui/images/PauseHover.png", // Slideshow Pause Button Hover Image (path to image). Upload the image for slideshow's pause hover button.
        "AutoHide": "true", // Auto Hide Thumbnails and Buttons (true, false). Default: false. Hide the thumbnails and buttons and display them when you hover the gallery.
        "AutoHideTime": 3000 // Auto Hide Time (time in miliseconds). Default: 2000. Set the time after which the thumbnails and buttons hide.
    },        
    DOPNextGENThumbnailGalleryContent<?php echo $gallery->ID; ?> = [    
<?php
        $i = 0;
    
        foreach ($images as $image):
            $i++;
            echo '{"Image": "'.$image->imageURL.'",'.
                  '"Thumb": "'.$image->thumbURL.'",'.
                  '"CaptionTitle": \''.($image->alttext == ' ' ? '':preg_replace('`\'`', "&#39;", $image->alttext)).'\','.
                  '"CaptionText": \''.($image->description == ' ' ? '':preg_replace('`\'`', "&#39;", preg_replace('`[\r\n]`', "<br />", html_entity_decode(stripslashes($image->description))))).'\','.
                  '"Media": \''.preg_replace('`[\r\n]`', "", stripslashes($image->ngg_custom_fields['Media'])).'\','.
                  '"LightboxMedia": \''.preg_replace('`[\r\n]`', "", stripslashes($image->ngg_custom_fields['LightboxMedia'])).'\'}';
            if ($i != count($images)){        
                echo ',';
            }
        endforeach;
?>           
    ];  
//-->    
</script>
<div class="DOPNextGENThumbnailGallery" id="DOPNextGENThumbnailGallery<?php echo $gallery->ID; ?>"></div>  
<?php
    }
?>