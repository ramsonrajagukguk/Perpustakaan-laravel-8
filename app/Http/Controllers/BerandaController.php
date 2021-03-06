<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->orderBy('name', 'asc')->get();
        $buku = Book::with(['author','category'])->latest()->paginate(12);
        return view('beranda', compact('buku', 'categories'));
        // return view('search');
    }


    public function loadData(Request $request)
    {
        // if ($request->has('q')) {
        //     $cari = $request->get('q');
        // 	$data = Book::select('id', 'judul')->where('judul', 'LIKE', '%'. $cari. '%')->get();
        // 	return response()->json($data);
        // }

        
        $search = $request->get('term');
    
        $result = Book::select('judul', 'keterangan')->where('judul', 'LIKE', '%'. $search. '%')->get();

        return response()->json($result);
    }

    

    public function buku(Request $request)
    {
        $categories = Category::latest()->orderBy('name', 'asc')->get();
        
        if (request('search')) {
            $buku =Book::where('judul', 'like', '%' . request('search') . '%')->
                        orWhere('keterangan', 'like', '%' . request('search') . '%')
                    ->paginate(12);
        } else {
            $buku = Book::latest()->paginate(12);
        }
        return view('beranda', compact('buku', 'categories'));
    }

    


    public function show(Book $id)
    {
        $book = $id->load('author', 'category');
        return view('buku_detail', compact('book'));
    }

    public function pinjam(Book $id)
    {
        
        // PinjamHistory::create([
        //     'user_id' => auth()->id(),
        //     'book_id' => $id->id,
        // ]);
        $buku_id = $id->id;
        $user = auth()->user();

        if ($user->borrow()->where('books.id', $buku_id)->where('returned_at', null)
                            
        ->count() > 0) {
            return redirect()->back()->with('success', 'Kamu sudah meminjam buku dengan judul : ' . $id->judul);
        }

        $user->borrow()->attach($buku_id);
        $id->decrement('jumlah');
 
        return redirect()->back()->with('success', 'Berhasil meminjam buku');

        return 'ok';
    }
}