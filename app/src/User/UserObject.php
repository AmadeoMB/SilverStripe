<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\OptionsetField;
use SilverStripe\Forms\DateField;



/**
 * Description
 * 
 * @package silverstripe
 * @subpackage mysite
 */
class UserObject extends DataObject
{
    private static $db = [
        'Deleted' => 'Date',
        'Name' => 'Varchar(100)',
        'Address' => 'Varchar(255)',
        'Gender' => 'Varchar(1)',
        'Date_Birth' => 'Date',
    ];

    private static $summary_fields = [
        'Name' => 'Name',
        'Address' => 'Address',
        'Gender' => 'Gender',
        'Date_Birth' => 'Date Birth',
        'Created' => 'Created At',
        'LastEdited' => 'Updated At',
        'Deleted' => 'Deleted At',
    ];

    public function getCMSFields()
    {
        return new FieldList(
            TextField::create(
                'Name'               
            ),
            TextField::create(
                'Address'               
            ),
            DateField::create(
                'Date_Birth',
                'Birth Date'
            ),
            OptionsetField::create(
                'Gender',
                'Gender',
                ['L', 'P']
            )
        );
    }
}