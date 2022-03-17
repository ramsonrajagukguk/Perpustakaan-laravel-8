<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PenulisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penulis = Author::all();
        return view('admin.penulis.index',compact('penulis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.penulis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'            => 'required'
        ]);

        $slug = Str::slug($request->name,'-');
        $data = [
            'name' => $request->name,
            'slug' => $slug,
        ];

        Author::create($data);

        return redirect()->route('penulis.index')->with('success', 'Data penulis sudah disimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $penuli)
    {
       
        // dd($penuli);
        return view('admin.penulis.edit',compact('penuli'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $penuli)
    {
       $this->validate($request, [
           'name' => 'required',
       ]);

       
       $slug = Str::slug($request->name,'-');
       $data = [
           'name' => $request->name,
           'slug' => $slug,
       ];
       $penuli->update($data);

       return redirect()->route('penulis.index')->with('success', 'Data penulis berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $penuli)
    {
        $penuli->delete();
        return redirect()->route('penulis.index')->with('success', 'Data penulis sudah dihapus');
    }

    // public function checkSlug(Request $request){
    //     $slug = SlugService::createSlug(Author::class, 'Slug', $request->name);
    //     return response()->json();
    // }
}
