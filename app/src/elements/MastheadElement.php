<?php

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class MastheadElement extends BaseElement {

    private static $has_many = [
        'MastheadSlides' => MastheadSlide::class
    ];

    public function getCMSFields(){
        $fields = parent::getCMSFields();

        $gridConfig = GridFieldConfig_RecordEditor::create();
        $gridConfig->addComponent(new GridFieldSortableRows('Index'));

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

    public function getType(){
        return 'Masthead Element';
    }

}
