<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        return view ('site.home.index');
    }

    public function promotion(){
        return view ('site.promotion.list');
    }
}
