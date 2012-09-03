/*
* Title                   : Thumbnail Gallery (WP NextGEN Gallery Template)
* Version                 : 1.2
* File                    : dopngtg.js
* File Version            : 1.0
* Created / Last Modified : 29 February 2012
* Author                  : Marius-Cristian Donea
* Copyright               : © 2012 Marius-Cristian Donea
* Website                 : http://www.mariuscristiandonea.com
* Description             : Thumbnail Gallery Front End Scripts.
*/

jQuery(document).ready(function(){
    jQuery('.DOPNextGENThumbnailGallery').each(function(){// Search for gallery containers.
        jQuery(this).DOPNextGENThumbnailGallery();
    });
});