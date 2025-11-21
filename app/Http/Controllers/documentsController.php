<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documents;
use Illuminate\Http\RedirectResponse;

class DocumentsController extends Controller
{
    public function documents()
    {
        $documents = Documents::orderBy('date', 'desc')->get();
        return view('documents', compact('documents'));
    }

    public function admin()
    {
        $documents = Documents::latest()->get();
        return view('admin', compact('documents'));
    }

    public function index()
{
    $documents = Documents::latest()->get();
    return view('index', compact('documents'));
}

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image'       => 'required',
            'title'       => 'required',
            'type'        => 'required',
            'description' => 'required',
            'date'        => 'required',
        ]);

        $imagePath = $request->file('image')->store('documents', 'public');

        Documents::create([
            'image'       => $imagePath,
            'title'       => $request->title,
            'type'        => $request->type,
            'description' => $request->description,
            'date'        => $request->date
        ]);

        return redirect()->route('halaman.admin')->with(['success' => 'Documentation Added!']);
    }
}