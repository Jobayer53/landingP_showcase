<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class landingPageController extends Controller
{
    public function index(){
        return view('dashboard.pages.landing_page.index');
    }
}
