<?php

use SilverStripe\Admin\ModelAdmin;


/**
 * Description
 * 
 * @package silverstripe
 * @subpackage mysite
 */
class PesanAdmin extends ModelAdmin
{
    /**
     * Managed data objects for CMS
     * @var array
     */
    private static $managed_models = [
        PesanObject::class
    ];

    /**
     * URL Path for CMS
     * @var string
     */
    private static $url_segment = 'pesan-admin';

    /**
     * Menu title for Left and Main CMS
     * @var string
     */
    private static $menu_title = 'Pesan Admin';

    
}