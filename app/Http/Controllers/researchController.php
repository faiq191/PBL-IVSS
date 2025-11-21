<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Research;
use Illuminate\Http\RedirectResponse;

class ResearchController extends Controller
{
    public function research()
    {
        $research = Research::orderBy('date', 'desc')->get();
        return view('research', compact('research'));
    }

    public function admin()
    {
        $research = Research::latest()->get();
        return view('admin', compact('research'));
    }

    public function index()
    {
        $research = Research::latest()->get();
        return view('index', compact('research'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title'       => 'required',
            'type'        => 'required',
            'description' => 'required',
            'date'        => 'required',
        ]);

        $imagePath = $request->file('image')->store('research', 'public');

        Research::create([
            'title'       => $request->title,
            'type'        => $request->type,
            'description' => $request->description,
            'date'        => $request->date
        ]);

        return redirect()->route('halaman.admin')->with(['success' => 'Research Added!']);
    }
}
