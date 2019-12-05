<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PownerController extends Controller
{
    public function index() {
        return view ('powner/index');
    }
}
