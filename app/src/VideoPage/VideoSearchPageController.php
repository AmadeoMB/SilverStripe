<?php

use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\Control\HTTP;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\ORM\ArrayList;
use SilverStripe\ORM\PaginatedList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\View\ArrayData;


/**
 * Description
 * 
 * @package silverstripe
 * @subpackage mysite
 */
class VideoSearchPageController extends PageController
{
    private static $allowed_actions = [
        'VideoSearchForm'
    ];

    public function doInit()
    {
        parent::doInit();
    }

    public function index(HTTPRequest $request)
    {
        $videos = VideoObject::get();
        $activeFilters = ArrayList::create();

        if($search = $request->getVar('Keywords'))
        {
            $activeFilters->push(ArrayData::create([
                'Label' => "'$search'"
            ]));

            $videos = $videos->filter([
                'Title:PartialMatch' => $search
            ]);
        }
        
        if($search = $request->getVar('Category'))
        {
            $activeFilters->push(ArrayData::create([
                'Category' => VideoCategory::get()->filter(['ID' => $search])->first()->Title
            ]));

            $videos = $videos->filter([
                'VideoCategories.ID' => $search
            ]);
        }

        $noResult = false;
        if (Count($videos) < 1) {
            $noResult = true;
            $videos = VideoObject::get();
        }

        $paginatedVideos = PaginatedList::create(
            $videos,
            $request
        )->setPageLength(2)->setPaginationGetVar('s');

        $data = [
            'Results' => $paginatedVideos,
            'ActiveFilters' => $activeFilters,
            'NoResults' => $noResult,
        ];

        return $data;
    }

    public function VideoSearchForm()
    {
        $form = Form::create(
            $this,
            'VideoSearchForm',
            FieldList::create(
                TextField::create('Keywords')->setAttribute('placeholder', 'Search for a Video'),
                DropdownField::create('Category', 'Category', VideoCategory::get()->map('ID', 'Title'))->setEmptyString('Search in category')
            ),
            FieldList::create(FormAction::create('doVideoSearch', 'Search'))
        )
        ->setFormMethod('GET')
        ->setFormAction($this->Link())
        ->disableSecurityToken()
        ->setValidator(new RequiredFields(['Keywords']));
        //->loadDataForm($this->request->getVars());
        $this->extend('updateMemberFormFields', $form);
        return $form;
    }
}