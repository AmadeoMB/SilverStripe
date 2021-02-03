<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

class ArticleCategory extends DataObject {    
    private static $belongs_many_many = [
        'ArticlePages' => ArticlePage::class,
    ];

    public function getCMSFields()
    {
        return FieldList::create(
            TextField::create('Title')
        );
    }

    //this is conflict state make for training  
    private static $db = [
        'Title' => 'Varchar',
    ];
}