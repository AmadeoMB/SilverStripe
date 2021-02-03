<?php

namespace {

	use SilverStripe\Assets\Image;
	use SilverStripe\AssetAdmin\Forms\UploadField;
	use SilverStripe\Forms\GridField\GridField;
	use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

    class HomePage extends Page
    {
        private static $db = [];

        private static $has_many = [
        	'HomePageButtons' => HomePageButton::class,
        ];

	    public function getCMSFields()
	    {
	    	$fields = parent::getCMSFields();
			$fields->addFieldToTab('Root.HomePageButtons',
				GridField::create(
					'HomePageButtons',
					'HomePageButtons',
					$this->HomePageButtons(),
					GridFieldConfig_RecordEditor::create()
				)
			);

	      	return $fields;
	    }
    }
}
