<?php

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class MastheadElement extends BaseElement {

    private static $has_many = [
        'MastheadSlides' => MastheadSlide::class
    ];

    private static $owns = [
        'MastheadSlides'
    ];

    private static $versioned_gridfield_extensions = true;

    public function getType(){
        return 'Masthead Element';
    }

    public function getCMSFields(){
        $fields = parent::getCMSFields();

        $gridConfig = GridFieldConfig_RecordEditor::create();
        $gridConfig->addComponent(GridFieldOrderableRows::create());

        $fields->addFieldsToTab('Root.Main', [
            GridField::create(
                'Slides',
                'Content',
                $this->MastheadSlides(),
                $gridConfig
            )
        ]);

        return $fields;
    }

}
