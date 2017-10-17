<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petugas;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $Petugas = Petugas::all();
        return view('admin.petugas.index', compact(['Petugas', $Petugas]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Petugas = Petugas::all();
        return view('admin.petugas.index', compact(['Petugas', $Petugas]));
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
        'nama' => 'required',
        'alamat' => 'required',
        'no_telp' => 'required',
        'tmp_lhr' => 'required',
        'tgl_lhr' => 'required',
        'ket' => 'min:5',

    ]);


        $Petugas = new Petugas;
        $Petugas->nama = $request->nama;
        $Petugas->alamat = $request->alamat;
        $Petugas->no_telp = $request->no_telp;
        $Petugas->tmp_lhr = $request->tmp_lhr;
        $Petugas->tgl_lhr = $request->tgl_lhr;
        $Petugas->ket = $request->ket;

        $Petugas->save();

        return redirect('admin');
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
        $Petugas = Petugas::find($id);

        if(!$Petugas){
            abort(404);
        }

        return view('admin.petugas.edit')->with('Petugas', $Petugas);
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
        $this->validate($request, [
        'nama' => 'required',
        'alamat' => 'required',
        'no_telp' => 'required',
        'tmp_lhr' => 'required',
        'tgl_lhr' => 'required',
        'ket' => 'min:5',

    ]);


        $Petugas = Petugas::find($id);
        $Petugas->nama = $request->nama;
        $Petugas->alamat = $request->alamat;
        $Petugas->no_telp = $request->no_telp;
        $Petugas->tmp_lhr = $request->tmp_lhr;
        $Petugas->tgl_lhr = $request->tgl_lhr;
        $Petugas->ket = $request->ket;

        $Petugas->save();

        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Petugas = Petugas::find($id);
        $Petugas->delete();

        return redirect('admin');
    }
}
