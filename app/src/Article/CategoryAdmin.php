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
    private static $managed_models = [
        ArticleCategory::class
    ];

    private static $url_segment = 'ArticleCategories';
    private static $menu_title = 'ArticleCategories';

    
}