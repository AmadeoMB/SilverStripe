<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\File;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\CheckboxSetField;

/**
 * Description
 * 
 * @package silverstripe
 * @subpackage mysite
 */
class VideoObject extends DataObject
{
    private static $db = [
        'Title' => 'Text',
        'Description' => 'Text'
    ];

    private static $many_many = [
        'VideoCategories' => VideoCategory::class
    ];

    private static $has_one = [
        'VideoSource' => File::class,
        'VideoPage' => VideoPage::class,
        'VideoThumbnail' => Image::class
    ];

    private static $owns = [
        'VideoSource'
    ];

    public function getCMSFields()
    {
        return new FieldList(
            TextField::create(
                'Title'               
            ),
            TextareaField::create(
                'Description'
            ),
            $video = UploadField::create(
                'VideoSource'
            ),
            UploadField::create(
                'VideoThumbnail'
            ),
            CheckboxSetField::create(
                'VideoCategories',
                'Categories',
                VideoCategory::get()
            )
        );
    }
}