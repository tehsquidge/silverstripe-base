<?php

use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\View\Requirements;

class PageController extends ContentController
{
    private static $allowed_actions = [];

    protected function init()
    {
        parent::init();
        Requirements::css('css/css.min.css');
        Requirements::javascript('js/vendor/modernizr-3.6.0.min.js');
        Requirements::javascript('js/vendor/jquery-3.3.1.min.js');
        Requirements::javascript('js/js.min.js');
    }
}
