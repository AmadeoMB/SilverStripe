<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TextField;
use SilverStripe\Assets\Image;

class Gallery extends DataObject 
{
    private static $db = [
        'Description' => 'Varchar(255)',
        'Title' => 'Varchar(255)'
    ];

    private static $has_one = [
        'Page' => 'Page'
    ];

    private static $has_many = [
        'Images' => Image::class
    ];

    private static $owns = [
        'Images'
    ];

    public function getCMSFields()
    {
        $fields = FieldList::create( 
            array(
            	$uploader = UploadField::create('Images'),
            	$Description = TextField::create('Description'),
            	$Title = TextField::create('Title')
        	)
        );
        
        $uploader->getValidator()->setAllowedExtensions(['png','gif','jpeg','jpg']);
        $uploader->setUploadEnabled(false);
        return $fields;
    }
}
