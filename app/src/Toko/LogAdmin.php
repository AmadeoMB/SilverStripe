<?php

use SilverStripe\Admin\ModelAdmin;


/**
 * Description
 * 
 * @package silverstripe
 * @subpackage mysite
 */
class LogAdmin extends ModelAdmin
{
    /**
     * Managed data objects for CMS
     * @var array
     */
    private static $managed_models = [
        LogStock::class
    ];

    /**
     * URL Path for CMS
     * @var string
     */
    private static $url_segment = 'log-stock';

    /**
     * Menu title for Left and Main CMS
     * @var string
     */
    private static $menu_title = 'Log Stock';

    
}