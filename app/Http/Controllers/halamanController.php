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
    $research = \App\Models\Research::orderBy('date', 'desc')->get();

    return view('research', compact('research'));
}


    public function documents()
    {
        $documents = \App\Models\Documents::orderBy('date', 'desc')->get();

        return view('documents', compact('documents'));
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
        $news = \App\Models\News::latest()->get();

    return view('news', compact('news'));


    }



    public function contacts()
    {
        return view('contacts');
    }


    /*** Menampilkan halaman admin ***/
public function admin()
{
    $news = \App\Models\News::latest()->get();
    $research = \App\Models\Research::orderBy('date', 'desc')->get();
    $documents = \App\Models\Documents::orderBy('date', 'desc')->get();

    return view('admin', compact('news', 'research', 'documents'));
}

    public function create()
    {
        return view('create');
    }

    public function edit(Request $request, $id)
    {
        $type = $request->type;

        if ($type === 'news') {
            $data = \App\Models\News::findOrFail($id);
        } elseif ($type === 'research') {
            $data = \App\Models\Research::findOrFail($id);
        } else {
            $data = \App\Models\Documents::findOrFail($id);
        }

        return view('edit', [
            'data' => $data,
            'type' => $type
        ]);
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
