<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Simpanan;

class SimpananController extends Controller
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
        $Simpanan = Simpanan::all();
        return view('admin.simpanan.index', compact(['Simpanan', $Simpanan]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Simpanan = Simpanan::all();
        return view('admin.simpanan.index', compact(['Simpanan', $Simpanan]));
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
        'nm_simpanan' => 'required',
        'anggota_id' => 'required',
        'tgl_simpanan' => 'required',
        'besar_simpanan' => 'required',
        'ket' => 'min:5',

    ]);


        $Simpanan = new Simpanan;
        $Simpanan->nm_simpanan = $request->nm_simpanan;
        $Simpanan->anggota_id = $request->anggota_id;
        $Simpanan->tgl_simpanan = $request->tgl_simpanan;
        $Simpanan->besar_simpanan = $request->besar_simpanan;
        $Simpanan->ket = $request->ket;

        $Simpanan->save();

        return redirect('admin/simpanan');
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
        $Simpanan = Simpanan::find($id);

        if(!$Simpanan){
            abort(404);
        }

        return view('admin.simpanan.edit')->with('Simpanan', $Simpanan);
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
        'nm_simpanan' => 'required',
        'anggota_id' => 'required',
        'tgl_simpanan' => 'required',
        'besar_simpanan' => 'required',
        'ket' => 'min:5',

    ]);


        $Simpanan = Simpanan::find($id);
        $Simpanan->nm_simpanan = $request->nm_simpanan;
        $Simpanan->anggota_id = $request->anggota_id;
        $Simpanan->tgl_simpanan = $request->tgl_simpanan;
        $Simpanan->besar_simpanan = $request->besar_simpanan;
        $Simpanan->ket = $request->ket;

        $Simpanan->save();

        return redirect('admin/simpanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Simpanan = Simpanan::find($id);
        $Simpanan->delete();

        return redirect('admin/simpanan');
    }
}
