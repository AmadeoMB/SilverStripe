<?php

use SilverStripe\Admin\ModelAdmin;


/**
 * Description
 * 
 * @package silverstripe
 * @subpackage mysite
 */
class VideoCategoriesAdmin extends ModelAdmin
{
    /**
     * Managed data objects for CMS
     * @var array
     */
    private static $managed_models = [
        VideoCategory::class
    ];

    /**
     * URL Path for CMS
     * @var string
     */
    private static $url_segment = 'video-categories';

    /**
     * Menu title for Left and Main CMS
     * @var string
     */
    private static $menu_title = 'Video Categories';

    
}