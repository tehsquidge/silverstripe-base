<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TabSet;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;

class MastheadSlide extends DataObject {
    private static $db = [
        'Title' => 'HTMLVarchar(255)',
        'Copy' => 'HTMLVarchar(255)'
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
        'Title' => 'Title'
    ];

    public function getCMSfields(){
        $fields = FieldList::create(TabSet::create('Root'));

        $fields->addFieldsToTab('Root.Main', [
            TextField::create('Title','Title'),
            TextField::create('Copy','Copy'),
            $imageUpload =  UploadField::create('Image','Image')
        ]);

        $imageUpload->getValidator()->setAllowedExtensions(array(
            'png','jpeg','jpg'
        ));
        $imageUpload->setFolderName('masthead-images');

        return $fields;
    }

}
