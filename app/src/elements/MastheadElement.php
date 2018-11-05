<?php

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class MastheadElement extends BaseElement {

    private static $has_many = [
        'MastheadSlides' => MastheadSlide::class
    ];

    public function getCMSFields(){
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab('Root.Main', [
            GridField::create(
                'Slides',
                'Content',
                $this->MastheadSlides(),
                GridFieldConfig_RecordEditor::create()
            )
        ]);

        return $fields;
    }

    public function getType(){
        return 'Masthead Element';
    }

}
