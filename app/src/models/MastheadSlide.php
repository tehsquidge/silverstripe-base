<?php

use SilverStripe\Versioned\Versioned;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TabSet;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextAreaField;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;

class MastheadSlide extends DataObject {

    private static $extensions = [
        Versioned::class,
    ];

    private static $db = [
        'Sort' => 'Int',
        'Title' => 'HTMLVarchar(255)',
        'Copy' => 'Text'
    ];

    private static $has_one = [
        'Parent' => MastheadElement::class,
        'Image' =>  Image::class
    ];

    private static $owns = [
        'Image'
    ];

    private static $summary_fields = [
        'Image.CMSThumbnail' => '',
        'Index' => 'Index',
        'Title' => 'Title',
        'Copy' => 'Copy'
    ];

    private static $searchable_fields = [
        'Index',
        'Title',
        'Copy'
    ];

    private static $default_sort = 'Sort ASC';

    public function getCMSfields(){
        $fields = FieldList::create(TabSet::create('Root'));

        $fields->addFieldsToTab('Root.Main', [
            TextField::create('Title','Title'),
            TextAreaField::create('Copy','Copy'),
            $imageUpload = UploadField::create('Image','Image')
        ]);

        $imageUpload->getValidator()->setAllowedExtensions(array(
            'png', 'jpeg', 'jpg'
        ));
        $imageUpload->setFolderName('masthead-images');

        return $fields;
    }

}
