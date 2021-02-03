<?php

use SilverStripe\Admin\ModelAdmin;


//this is conflict state make for training
class BarangAdmin extends ModelAdmin
{
    //this is conflict state make for training
    private static $managed_models = [
        BarangObject::class
    ];

    private static $url_segment = 'barang-admin';

    //this is conflict state make for training
    private static $menu_title = 'Barang Admin';

    
}