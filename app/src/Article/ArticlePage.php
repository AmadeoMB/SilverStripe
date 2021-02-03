<?php

use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldComponent;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\Assets\Image;
use SilverStripe\Assets\File;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\DateField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;

/**
 * Description
 * 
 * @package silverstripe
 * @subpackage mysite
 */
class ArticlePage extends Page
{
    private static $db = [
        'Date' => 'Date',
        'Teaser' => 'Text',
        'Author' => 'Varchar(100)'
    ];

    private static $many_many = [
        'ArticleCategories' => ArticleCategory::class,
    ];

    private static $has_many = [
        'PhotoObjects' => PhotoObject::class,
        'BrochureObjects' => BrochureObject::class
    ];

    public function varDump()
    {
        return $this->Author;
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Main', DateField::create('Date','Date of article'), 'Content');   
        $fields->addFieldToTab(
            'Root.Main', 
            TextareaField::create('Teaser')->setDescription('This is the summary that appears on the article list page.'),
            'Content'
        );
        $fields->addFieldToTab('Root.Categories', CheckboxSetField::create(
            'Categories',
            'Selected categories',
            ArticleCategory::get()
        ));
        $fields->addFieldToTab('Root.Main', TextField::create('Author','Author of article'), 'Content');
        $fields->addFieldToTab('Root.Attachments', 
            GridField::create(
                'PhotoObjects',
                'Photos',
                $this->PhotoObjects(),
                GridFieldConfig_RecordEditor::create()
            )
        );
        $fields->addFieldToTab('Root.Attachments', 
            GridField::create(
                'BrochureObjects',
                'Brochures',
                $this->BrochureObjects(),
                GridFieldConfig_RecordEditor::create()
            )
        );

        return $fields;
    }
}