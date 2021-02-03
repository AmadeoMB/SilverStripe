<?php

use SilverStripe\Admin\ModelAdmin;


/**
 * Description
 * 
 * @package silverstripe
 * @subpackage mysite
 */
class BarangAdmin extends ModelAdmin
{
    /**
     * Managed data objects for CMS
     * @var array
     */
    private static $managed_models = [
        BarangObject::class
    ];

    /**
     * URL Path for CMS
     * @var string
     */
    private static $url_segment = 'barang-admin';

    /**
     * Menu title for Left and Main CMS
     * @var string
     */
    private static $menu_title = 'Barang Admin';

    
}