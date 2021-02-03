<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;


/**
 * Description
 * 
 * @package silverstripe
 * @subpackage mysite
 */
class BarangObject extends DataObject
{
    private static $db = [
        'Name' => 'Varchar(100)',
        'Stock' => 'Int',
        'Price' => 'Currency',
    ];

    private static $summary_fields = [
        'Name' => 'Name',
        'Stock' => 'Stock',
        'Price' => 'Price',
    ];

    private static $belongs_many_many = [
        'PesanObjects' => PesanObject::class
    ];

    public function getCMSFields()
    {
        return new FieldList(
            TextField::create(
                'Name'
            ),
            TextField::create(
                'Stock'
            ),
            TextField::create(
                'Price'
            ),
        );
    }
}