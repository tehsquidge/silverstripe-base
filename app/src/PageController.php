<?php

use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\View\Requirements;

class PageController extends ContentController
{
    private static $allowed_actions = [];

    protected function init()
    {
        parent::init();
        Requirements::css('assets/css/normalize.css');
        Requirements::css('assets/css/main.css');
        Requirements::javascript('assets/js/vendor/modernizr-3.6.0.min.js');
        Requirements::javascript('assets/js/vendor/jquery-3.3.1.min.js');
        Requirements::javascript('assets/js/plugins.js');
        Requirements::javascript('assets/js/main.js');
    }
}
