<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class EnterController extends Controller
{
    public function create() {
        return view('enterLot');
    }
}