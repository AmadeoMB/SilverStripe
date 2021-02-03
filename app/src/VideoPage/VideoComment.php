<?php

use SilverStripe\ORM\DataObject;


/**
 * Description
 * 
 * @package silverstripe
 * @subpackage mysite
 */
class VideoComment extends DataObject
{
    private static $db = [
        'Name' => 'Varchar(100)',
        'Comment' => 'Text'
    ];

    private static $has_one = [
        'VideoPage' => VideoPage::class
    ];
}