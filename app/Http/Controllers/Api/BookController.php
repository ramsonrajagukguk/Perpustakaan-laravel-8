<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book\BookCollection;
use App\Http\Resources\Book\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Book::all();
        $books = Book::with(['author'])->paginate(3);
        return new BookCollection($books);
        // return response()->json($books, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul'         => 'required',
            'author_id'    => 'required',
            'category_id'    => 'required',
            'keterangan'    => 'required|min:10',
            'jumlah'        => 'required',
            'cover '        => 'file|image'
        ]);

        // $data = $request->all();
        // return Book::create($data);

        if ($request->file('cover')) {
            $data = $request->all();
            $data['cover'] = $request->file('cover')->store('public/buku');
           return Book::create($data);
        }else{
            $data = $request->all();
            $data['cover'] = NULL;
            $response = Book::create($data);
            return response()->json($response, 201);
            
        }
                
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($book)
    {
        $data = Book::find($book);
        
        if (is_null($data)) {
            return response()->json([
                'message' => "Data tidak temukan!"
            ],404);
        }

        return new BookResource($data);

        // return response()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request,[
            'judul'         => 'required',
            'author_id'    => 'required',
            'category_id'    => 'required',
            'keterangan'    => 'required|min:10',
            'jumlah'        => 'required',
            'cover '        => 'file|image'
        ]);
      
        $data = $request->all();
        $book->update($data);
        return $book;
        // return response()->json($book, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
       return  $book->delete();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  str  $judul
     * @return \Illuminate\Http\Response
     */
    public function search($judul)
    {
       return  Book::where('judul', 'like', '%'.$judul.'%')->get();
    }
}