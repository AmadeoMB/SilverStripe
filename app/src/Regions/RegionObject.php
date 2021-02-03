<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Versioned\Versioned;


/**
 * Description
 * 
 * @package silverstripe
 * @subpackage mysite
 */
class RegionObject extends DataObject
{
    private static $db = [
        'Title' => 'Varchar',
        'Description' => 'Text',
    ];

    private static $has_one = [
        'Photo' => Image::class,
        'RegionPage' => RegionPage::class
    ];

    private static $owns = [
        'Photo',
    ];

    public function getCMSFields()
    {
        $fields = FieldList::create(
            TextField::create('Title'),
            TextareaField::create('Description'),
            $uploader = UploadField::create('Photo')
        );

        $uploader->setFolderName('Region/Photos');
        $uploader->getValidator()->setAllowedExtensions(['png','gif','jpeg','jpg']);

        return $fields;
    }
}