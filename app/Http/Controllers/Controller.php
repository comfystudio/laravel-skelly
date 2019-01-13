<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /** Format URL */
    public function FormatUrl($title){
        $url = preg_replace("/[^A-Za-z0-9 ]/", "", $title);
        $url = trim($url);
        $url = str_replace('  ', ' ', $url);
        $url = str_replace(' ', '-', $url);
        $url = strtolower($url);
        return $url;
    }
}
