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
    //this is conflict state make for training
    private static $managed_models = [
        LogStock::class
    ];
    //this is conflict state make for training
    private static $url_segment = 'log-stock';

    /**
     * Menu title for Left and Main CMS
     * @var string
     */
    private static $menu_title = 'Log Stock Conflict';   
}