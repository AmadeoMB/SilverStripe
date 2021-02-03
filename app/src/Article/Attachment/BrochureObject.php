<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\File;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldList;

/**
 * Description
 * 
 * @package silverstripe
 * @subpackage mysite
 */
class BrochureObject extends DataObject
{
    private static $has_one = [
        'BrochureSource' => File::class,
        'ArticlePage' => ArticlePage::class
    ];

    private static $owns = [
        'BrochureSource'
    ];

    public function getCMSFields()
    {
        $fields = new FieldList(
            $brochures = UploadField::create(
                'BrochureSource'
            )->setFolderName('Article/Brochure')
        );

        $brochures->getValidator()->setAllowedExtensions(array('doc', 'docx', 'pdf'));

        return $fields;
    }
}