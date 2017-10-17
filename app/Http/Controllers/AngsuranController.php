<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Angsuran;

class AngsuranController extends Controller
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
        $Angsuran = Angsuran::all();
        return view('admin.angsuran.index', compact(['Angsuran', $Angsuran]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Angsuran = Angsuran::all();
        return view('admin.angsuran.index', compact(['Angsuran', $Angsuran]));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request, [
        'kategori_id' => 'required',
        'anggota_id' => 'required',
        'tgl_pembayaran' => 'required',
        'angsuran_ke' => 'required',
        'besar_angsuran' => 'required',
        'ket' => 'min:5',

    ]); 
        $Angsuran = new Angsuran;
        $Angsuran->kategori_id = $request->kategori_id;
        $Angsuran->anggota_id = $request->anggota_id;
        $Angsuran->tgl_pembayaran = $request->tgl_pembayaran ;
        $Angsuran->angsuran_ke = $request->angsuran_ke;
        $Angsuran->besar_angsuran = $request->besar_angsuran;
        $Angsuran->ket = $request->ket;

        $Angsuran->save();

        return redirect('admin/angsuran');   
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
        $Angsuran = Angsuran::find($id);

        if(!$Angsuran){
            abort(404);
        }

        return view('admin.angsuran.edit')->with('Angsuran', $Angsuran);
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
        'kategori_id' => 'required',
        'anggota_id' => 'required',
        'tgl_pembayaran' => 'required',
        'angsuran_ke' => 'required',
        'besar_angsuran' => 'required',
        'ket' => 'min:5',

    ]); 
        $Angsuran = Angsuran::find($id);
        $Angsuran->id_kategori = $request->kategori_id;
        $Angsuran->id_anggota = $request->anggota_id;
        $Angsuran->tgl_pembayaran = $request->tgl_pembayaran ;
        $Angsuran->angsuran_ke = $request->angsuran_ke;
        $Angsuran->besar_angsuran = $request->besar_angsuran;
        $Angsuran->ket = $request->ket;

        $Angsuran->save();

        return redirect('admin/angsuran');     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Angsuran = Angsuran::find($id);
        $Angsuran->delete();

        return redirect('admin/angsuran');    
    }
}
