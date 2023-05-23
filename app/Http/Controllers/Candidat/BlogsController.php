<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    //

    public function index()
    {
        return view('candidats/gallery');
    }
}
