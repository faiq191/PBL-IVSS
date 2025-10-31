<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\postRequest;

class halamanController extends Controller
{
    //

    public function index()
    {
        return view('index');
    }

    public function home()
    {
        return view('home');
    }

    public function contact()
    {
        return view('contact');
    }
}
