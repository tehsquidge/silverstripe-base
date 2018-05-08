<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\TextField;

class Page extends SiteTree
{
    private static $db = [];

    private static $has_one = [];

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Main.Metadata', new TextField('MetaTitle', $title = 'Meta Title'), $above = 'MetaDescription');
        
        return $fields;
    }

}
