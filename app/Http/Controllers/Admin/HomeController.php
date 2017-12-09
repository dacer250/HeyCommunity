<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Home Page
     */
    public function index()
    {
        return view('admin.home.index');
    }
}