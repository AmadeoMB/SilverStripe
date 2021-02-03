<?php

use SilverStripe\Admin\ModelAdmin;

/**
 * Description
 * 
 * @package silverstripe
 * @subpackage mysite
 */
class CategoryAdmin extends ModelAdmin
{
    /**
     * Managed data objects for CMS
     * @var array
     */
    private static $managed_models = [
        ArticleCategory::class
    ];

    /**
     * URL Path for CMS
     * @var string
     */
    private static $url_segment = 'ArticleCategories';

    /**
     * Menu title for Left and Main CMS
     * @var string
     */
    private static $menu_title = 'ArticleCategories';

    
}