<?php

namespace App\Http\Controllers\Jury;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('jurys.register');
    }
}
