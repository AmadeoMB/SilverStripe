<?php

use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

/**
 * Description
 * 
 * @package silverstripe
 * @subpackage mysite
 */
class RegionPage extends Page
{
    private static $has_many = [
        'RegionObjects' => RegionObject::class,
    ];

    private static $owns = [
        'RegionObjects'
    ];   

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Regions', GridField::create(
            'RegionObjects',
            'Regions on this page',
            $this->RegionObjects(),
            GridFieldConfig_RecordEditor::create()
        ));

        return $fields;
    }
}