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
        $news = \App\Models\News::latest()->get();
        $research = \App\Models\Research::orderBy('date', 'desc')->get();
        $documents = \App\Models\Documents::orderBy('date', 'desc')->get();

        return view('index', compact('news', 'research', 'documents'));
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
public function admin(Request $request)
{
    $search     = $request->search;
    $category   = $request->category;
    $year       = $request->year;

    // NEWS
    $news = \App\Models\News::query();

    if ($search) {
        $news->where(function($q) use ($search) {
            $q->where('title', 'like', "%$search%")
              ->orWhere('description', 'like', "%$search%");
        });
    }

    if ($category === 'Berita') {
        // news only
        $news->whereNotNull('id');
    }

    if ($year) {
        $news->whereYear('date', $year);
    }

    $news = $news->orderBy('date', 'desc')->get();

    // RESEARCH
    $research = \App\Models\Research::query();

    if ($search) {
        $research->where(function($q) use ($search) {
            $q->where('title', 'like', "%$search%")
              ->orWhere('description', 'like', "%$search%");
        });
    }

    if ($category === 'Research') {
        $research->whereNotNull('id');
    }

    if ($year) {
        $research->whereYear('date', $year);
    }

    $research = $research->orderBy('date', 'desc')->get();

    // DOCUMENTS
    $documents = \App\Models\Documents::query();

    if ($search) {
        $documents->where(function($q) use ($search) {
            $q->where('title', 'like', "%$search%")
              ->orWhere('description', 'like', "%$search%");
        });
    }

    if ($category === 'Dokumentasi') {
        $documents->whereNotNull('id');
    }

    if ($year) {
        $documents->whereYear('date', $year);
    }

    $documents = $documents->orderBy('date', 'desc')->get();


    return view('admin', compact('news', 'research', 'documents'));
}

    public function create()
    {
        return view('create');
    }

    public function delete($id, $type)
    {
        if ($type === 'news') {
            $data = \App\Models\News::findOrFail($id);
        } elseif ($type === 'research') {
            $data = \App\Models\Research::findOrFail($id);
        } else {
            $data = \App\Models\Documents::findOrFail($id);
        }

        $data->delete();

        return redirect()->route('halaman.admin')->with('success', 'Deleted successfully');
    }


    public function edit($type, $id)
    {
        if ($type === 'news') {
            $data = \App\Models\News::findOrFail($id);
        } elseif ($type === 'research') {
            $data = \App\Models\Research::findOrFail($id);
        } else {
            $data = \App\Models\Documents::findOrFail($id);
        }

        return view('edit', compact('data', 'type'));
    }


public function store(Request $request)
{
    $request->validate([
        'category' => 'required',
        'title' => 'required',
        'description' => 'required',
        'date' => 'required|date',
    ]);

    // Upload image
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('uploads', 'public');
    }

    // Handle by category
    if ($request->category === 'news') {
        \App\Models\News::create([
            'image' => $imagePath,
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'type' => $request->type ?? null,
        ]);
    }

    elseif ($request->category === 'research') {
        \App\Models\Research::create([
            'image' => $imagePath,
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'type' => $request->type ?? null,
            'research_type' => $request->research_type ?? null,
        ]);
    }

    else { // documents
        \App\Models\Documents::create([
            'image' => $imagePath,
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'type' => $request->type ?? null,
        ]);
    }

    return redirect()->route('halaman.admin')->with('success', 'Created successfully');
}


public function update(Request $request, $id, $type)
{
    if ($type === 'news') {
        $data = \App\Models\News::findOrFail($id);
    } elseif ($type === 'research') {
        $data = \App\Models\Research::findOrFail($id);
    } else {
        $data = \App\Models\Documents::findOrFail($id);
    }

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('uploads', 'public');
        $data->image = $path;
    }

    $data->title = $request->title;
    $data->description = $request->description;
    $data->date = $request->date;
    $data->type = $request->type;

    $data->save();

    return redirect()->route('halaman.admin')->with('success', 'Updated!');
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
