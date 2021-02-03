<?php

use SilverStripe\ORM\DataObject;


/**
 * Description
 * 
 * @package silverstripe
 * @subpackage mysite
 */
class LogStock extends DataObject
{
    private static $db = [
        'id_barang'=>'Int',
        'stock_before'=>'Int',
        'stock_after'=>'Int',
    ];

    /**
     * Defines summary fields commonly used in table columns
     * as a quick overview of the data for this dataobject
     * @var array
     */
    private static $summary_fields = [
        'id_barang' => 'ID Barang',
        'stock_before' => 'Stock Before',
        'stock_after' => 'Stock After',
    ];
}