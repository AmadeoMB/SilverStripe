<?php

use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\Control\HTTP;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\FormAction;


/**
 * Description
 * 
 * @package silverstripe
 * @subpackage mysite
 */
class VideoPageController extends PageController
{
    private static $allowed_actions = [
        'CommentForm'
    ];

    public function CommentForm(HTTPRequest $request)
    {
        $comment = VideoComment::create(['Name' => $request->postVar('Name'), 'Comment' => $request->postVar('Comment')]);
        $comment->VideoPageID = $this->ID;
        $comment->write();

        return $this;
    }

    public function doInit()
    {
        parent::doInit();
    }
}