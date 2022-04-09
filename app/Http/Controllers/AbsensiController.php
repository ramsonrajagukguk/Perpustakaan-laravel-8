<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Psr7\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    return view('admin.absensi.create');
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
        
        // $data = [
        //     'long' => $request->long,
        //     'lat' => $request->lat,
        //     'address' => $request->address,
        //     'type' => $request->type,
        //     'photo' => $request->photo,
        // ];


        $this->validate($request,[
            'long'         => 'required',
            'lat'    => 'required',
            'address'    => 'required|min:10',
            'type'        => 'required',
            'photo '        => 'file|image'
        ]);

        $response = Http::withToken('4|iyIrC9T5owAl9eSWTgOvBtex9qgaKrAfJ4i9JnFS')->post('https://demomedicom.000webhostapp.com/api/attendance', [
            'long' => $request->long,
            'lat' => $request->lat,
            'address' => $request->address,
            'type' => $request->type,
            'photo' => $request->photo,
        ]);

        $response->getBody();


        

       
        

        // $response = Http::post('https://demomedicom.000webhostapp.com/api/auth/register', [
        //     'name' => 'Steve',
        //     'email' => 'steve@gmasdil.com',
        //     'password' => '12345678',
        //     'device_name' => 'web',
        // ]);

        // dd($response);

        if(!$response->ok()){
            return redirect()->back()->with('error', 'Terjadi kesalahan pada server');
        }

        return redirect()->back()->with('success', 'Sukses melakukan pendaftaran pengguna');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}