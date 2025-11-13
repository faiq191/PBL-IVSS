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
    /*** Menampilkan halaman about ***/
    public function about()
    {
        return view('about');
    }


    /*** Menampilkan halaman research ***/

    public function research()
    {
        return view('research');
    }

    public function documents()
    {
        return view('documents');
    }


    /*** Menampilkan halaman member ***/

    public function lecturers()
    {
        return view('lecturers');
    }

    public function students()
    {
        return view('students');
    }

    /*** Menampilkan halaman news & contact ***/
    public function news()
    {
        return view('news');
    }

    public function contacts()
    {
        return view('contacts');
    }


    /*** Menampilkan halaman admin ***/
    public function admin()
    {
        return view('admin');
    }

    public function create()
    {
        return view('create');
    }

    public function edit()
    {
        return view('edit');
    }

    public function delete()
    {
        return view('delete');
    }

    public function headadmin()
    {
        return view('headadmin');
    }


    /** Login Page */

    public function login()
    {
        return view('login');
    }
}
