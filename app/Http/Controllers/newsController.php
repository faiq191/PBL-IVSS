<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Requests\postRequest;
use Illuminate\Http\RedirectResponse;


class newsController extends Controller
{

public function news()
{
    $news = News::orderBy('date','desc')->get();
    dd($news);
    return view('halaman.news', compact('news'));
}

public function admin()
{
    $news = News::latest()->get();
    return view('admin', compact('news'));
}
    public function store(Request $request): RedirectResponse
    {


        //validate form
        $request->validate([
            'image'           => 'required',
            'title'          => 'required',
            'description'     => 'required',
            'date'            => 'required',
            'type'            => 'required',
        ]);

        // Upload file
        $imagePath = $request->file('image')->store('news', 'public');

        //create post
        News::create([
            'image'           => $imagePath,
            'title'          => $request->title,
            'description'     => $request->description,
            'date'            => $request->date,
            'type'            => $request->type
        ]);



        //redirect to index
        return redirect()->route('halaman.admin')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
