<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuthorBook;
use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class Beranda extends Controller
{
    public function index()
    {
        $books = Auth()->user()->borrow;
        return view('admin.beranda',compact('books'));
    }


    public function list_pinjam(){
        $borrow = AuthorBook::withCount('book')
        ->orderBy('book_count','desc')
        ->where('returned_at', null)->get();
        return view('admin.listpinjam',compact('borrow'));
    } 

    public function returnBook(AuthorBook $id){
        $id->update([
            'returned_at' => Carbon::now(),
            'user_id'    => auth()->id()  
        ]);

        $id->book()->increment('jumlah');
        return redirect()->route('listpinjam')->with('success','Buku berhasil Dikembalikan');
    }

    public function history_borrow(){
        $history = Book::withCount('borrowed')
        ->orderBy('borrowed_count','desc')
        -> get();
        return view('admin.history',compact('history'));
    }
    public function history_user(){
        $history = User::withCount('borrow')
        ->orderBy('borrow_count','desc')
        -> get();
        return view('admin.user_history',compact('history'));
    }

}