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
class VideoCategory extends DataObject
{
    private static $db = [
        'Title' => 'Text'
    ];

    private static $belongs_many_many = [
        'VideoObjects' => VideoObject::class
    ];

    public function getCMSFields()
    {
        return new FieldList(
            TextField::create(
                'Title'
            )
        );
    }
}