<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;

class CustomSiteConfig extends DataExtension 
{

    private static $db = [
        'HomePageHeading1' => 'Varchar(255)',
        'HomePageHeading2' => 'Varchar(255)',
        'HomePageHeading3' => 'Varchar(255)',
        'HomePageHeading4' => 'Varchar(255)',
        'GATracking' => 'Varchar(255)',
        'GoogleMapsURL' => 'Varchar(255)',
        'Email' => 'Varchar(255)'
    ];

    private static $has_one = [
        'BackgroundImage' => Image::class,
        'Logo' => Image::class
    ];

    private static $owns = [
        'BackgroundImage',
        'Logo'
    ];

    public function updateCMSFields(FieldList $fields) 
    {
        $fields->addFieldsToTab("Root.Main", array(
                new TextField("HomePageHeading1", "Home Page Heading 1"),
                new TextField("HomePageHeading2", "Home Page Heading 2"),
                // new TextField("HomePageHeading3", "Home Page Heading 3"),
                // new TextField("HomePageHeading4", "Home Page Heading 4"),
                // new TextField("GATracking", "GA Tracking"),
                // new TextField("GoogleMapsURL", "GoogleMapsURL"),
                // new TextField("Email", "Email")
        	)
        );

        $fields->addFieldToTab('Root.BackgroundImage', $BackgroundImage = UploadField::create('BackgroundImage'));
        $fields->addFieldToTab('Root.Logo', $Logo = UploadField::create('Logo'));
        $BackgroundImage->setUploadEnabled(false);
        $Logo->setUploadEnabled(false);
    }
}
