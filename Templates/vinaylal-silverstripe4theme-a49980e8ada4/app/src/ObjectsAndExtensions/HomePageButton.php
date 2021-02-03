<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

class HomePageButton extends DataObject 
{
    private static $db = [
      'LinkText' => 'Varchar(255)',
      'Link' => 'Varchar(255)'
    ];

    private static $has_one = [
        'Page' => Page::class,
    ];

    private static $summary_fields = [
        'Link' => ''
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields = FieldList::create( 
            array(
            	$Name = TextField::create('LinkText'),
                $ExternalLink = TextField::create('Link')
        	)
        );

        return $fields;
    }
}
