<?php

namespace App\Http\Controllers;

use App\Models\Site;

abstract class Controller
{
    public $site;

    public function __construct()
    {
        $this->site = $site = Site::find(1);

        view()->share(compact('site'));
    }
}
