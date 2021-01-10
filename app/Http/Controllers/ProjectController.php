<?php

namespace App\Http\Controllers;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

}
