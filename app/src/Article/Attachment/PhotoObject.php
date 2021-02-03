<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldList;

/**
 * Description
 * 
 * @package silverstripe
 * @subpackage mysite
 */
class PhotoObject extends DataObject
{
    private static $has_one = [
        'PhotoSource' => Image::class,
        'ArticlePage' => ArticlePage::class
    ];

    private static $owns = [
        'PhotoSource'
    ];

    public function getCMSFields()
    {
        $fields = new FieldList(
            $photo = UploadField::create(
                'PhotoSource'
            )
            ->setFolderName('Article/Photos')
        );

        $photo->getValidator()->setAllowedExtensions(array('jpg'));
        
        return $fields;
    }
}