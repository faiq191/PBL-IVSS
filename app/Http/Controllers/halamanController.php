<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\postRequest;
use App\Models\User;

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
        $students = User::where('role', 'member')
                        ->where('status', 'approved')
                        ->get();
        return view('students', compact('students'));
    }


    /*** Menampilkan halaman news & contact ***/
    public function news()
    {
        $news = \App\Models\News::latest()->get();

    return view('news', compact('news'));


    }

    //Berita, Research dan Dokumentasi dapat di Kliks
        public function showNews($id)
    {
        $item = \App\Models\News::findOrFail($id);
        return view('detail', ['item' => $item, 'type' => 'News']);
    }

    public function showResearch($id)
    {
        $item = \App\Models\Research::findOrFail($id);
        return view('detail', ['item' => $item, 'type' => 'Research']);
    }

    public function showDocuments($id)
    {
        $item = \App\Models\Documents::findOrFail($id);
        return view('detail', ['item' => $item, 'type' => 'Documentation']);
    }

    // NEWS DETAIL
    public function newsDetail($id)
    {
        $item = \App\Models\News::findOrFail($id);
        return view('detail', compact('item'));
    }

    // RESEARCH DETAIL
    public function researchDetail($id)
    {
        $item = \App\Models\Research::findOrFail($id);
        return view('detail', compact('item'));
    }

    // DOCUMENT DETAIL
    public function documentDetail($id)
    {
        $item = \App\Models\Documents::findOrFail($id);
        return view('detail', compact('item'));
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
        $news->where('title', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%");
    }
    if ($year) {
        $news->whereYear('date', $year);
    }

    // jika kategori Berita → tampilkan news
    if ($category === 'Berita') {
        $news = $news->orderBy('date', 'desc')->get();
    }
    // jika kategori lain → kosongkan
    elseif ($category !== '' && $category !== null) {
        $news = collect();
    }
    // jika kategori tidak dipilih → tampilkan semua
    else {
        $news = $news->orderBy('date', 'desc')->get();
    }



    // RESEARCH
    $research = \App\Models\Research::query();
    if ($search) {
        $research->where('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
    }
    if ($year) {
        $research->whereYear('date', $year);
    }

    if ($category === 'Research') {
        $research = $research->orderBy('date', 'desc')->get();
    }
    elseif ($category !== '' && $category !== null) {
        $research = collect();
    }
    else {
        $research = $research->orderBy('date', 'desc')->get();
    }



    // DOCUMENTS
    $documents = \App\Models\Documents::query();
    if ($search) {
        $documents->where('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
    }
    if ($year) {
        $documents->whereYear('date', $year);
    }

    if ($category === 'Dokumentasi') {
        $documents = $documents->orderBy('date', 'desc')->get();
    }
    elseif ($category !== '' && $category !== null) {
        $documents = collect();
    }
    else {
        $documents = $documents->orderBy('date', 'desc')->get();
    }


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

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('uploads', 'public');
    }

    // NEWS
    if ($request->category === 'news') {
        \App\Models\News::create([
            'image' => $imagePath,
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'type' => $request->type ?? null, // OK because news table has type
        ]);
    }

    // RESEARCH
    elseif ($request->category === 'research') {
        \App\Models\Research::create([
            'image' => $imagePath,
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'research_type' => $request->research_type,  // Only allowed ENUM
        ]);
    }

    // DOCUMENTS
    else {
        \App\Models\Documents::create([
            'image' => $imagePath,
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
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
        $data->image = $request->file('image')->store('uploads', 'public');
    }

    $data->title = $request->title;
    $data->description = $request->description;
    $data->date = $request->date;

    if ($type === 'news') {
        $data->type = $request->type;
    }

    if ($type === 'research') {
        $data->research_type = $request->research_type;
    }

    $data->save();

    return redirect()->route('halaman.admin')->with('success', 'Updated!');
}

    public function headadmin(Request $request)
    {
        $search     = $request->search;
        $category   = $request->category;
        $year       = $request->year;
        $pendingUsers = \App\Models\User::where('status', 'pending')->get();

        // NEWS
        $news = \App\Models\News::query();
        if ($search) {
            $news->where(function($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
            });
        }
        if ($category === 'Berita') {
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

        return view('headadmin', compact('news', 'research', 'documents', 'pendingUsers'));
    }
}
