<?php

namespace App\Http\Controllers\Powner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PownerController extends Controller
{
    public function index() {
        return view ('powner/index');
    }
}
