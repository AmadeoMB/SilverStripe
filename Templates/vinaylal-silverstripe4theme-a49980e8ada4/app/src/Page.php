<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Assets\Image;
    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Forms\CheckboxField;
    use SilverStripe\Forms\GridField\GridField;
    use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

    class Page extends SiteTree
    {
        private static $db = [
            'ShowMap' => 'Boolean',
            "ShowContactForm"  => 'Boolean'
        ];

        private static $has_one = [
            'BackgroundImage' => Image::class,
        ];

        private static $has_many = [
            'GalleryImages' => Image::class,
            'Galleries' => Gallery::class
        ];

        private static $owns = [
            'BackgroundImage',
            'GalleryImages',
            'Galleries'
        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->addFieldToTab('Root.GalleryImages',$GalleryImages = UploadField::create('GalleryImages'));
            $fields->addFieldToTab('Root.ShowMap',$ShowMap = new CheckboxField("ShowMap", "Click this to show location map on the page"));
            $fields->addFieldToTab('Root.ShowContactForm',$ShowMap = new CheckboxField("ShowContactForm", "Click this to show the contact form on this page"));
            $fields->addFieldToTab('Root.Galleries',
                GridField::create(
                    'Galleries',
                    'Galleries',
                    $this->Galleries(),
                    GridFieldConfig_RecordEditor::create()
                )
            );
            $GalleryImages->setUploadEnabled(false);

            return $fields;
        }
    }
}
