<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;

class AnggotaController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $Anggota = Anggota::all();
        return view('admin.anggota.index', compact(['Anggota', $Anggota]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        $carianggota = $request->get('search');
        $Anggota = Anggota::where('id','=','%'.$carianggota)
        ->orWhere('id','LIKE','%'.$carianggota.'%')
        ->orWhere('nama','LIKE','%'.$carianggota.'%')
        ->orWhere('alamat','LIKE','%'.$carianggota.'%')
        ->orWhere('tgl_lhr','LIKE','%'.$carianggota.'%')
        ->orWhere('tmp_lhr','LIKE','%'.$carianggota.'%')
        ->orWhere('j_kel','LIKE','%'.$carianggota.'%')
        ->orWhere('status','LIKE','%'.$carianggota.'%')
        ->orWhere('no_telp','LIKE','%'.$carianggota.'%')
        ->orWhere('ket','LIKE','%'.$carianggota.'%')
        ->paginate(5);
        return view('admin.anggota.index', compact(['carianggota', $carianggota], ['Anggota', $Anggota]));
    }

    public function create()
    {
        $Anggota = Anggota::all();
        return view('admin.anggota.index', compact(['Anggota', $Anggota]));
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
        'tgl_lhr' => 'required',
        'tmp_lhr' => 'required',
        'j_kel' => 'required',
        'status' => 'required',
        'no_telp' => 'required',
        'ket' => 'min:5',

    ]);

        $Anggota = new Anggota;
        $Anggota->nama = $request->nama;
        $Anggota->alamat = $request->alamat;
        $Anggota->tgl_lhr = $request->tgl_lhr;
        $Anggota->tmp_lhr = $request->tmp_lhr;
        $Anggota->j_kel = $request->j_kel;
        $Anggota->status = $request->status;
        $Anggota->no_telp = $request->no_telp;
        $Anggota->ket = $request->ket;

        $Anggota->save();

        return redirect('admin/anggota');
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
        $Anggota = Anggota::find($id);

        if(!$Anggota){
            abort(404);
        }

        return view('admin.anggota.edit')->with('Anggota', $Anggota);
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
        'tgl_lhr' => 'required',
        'tmp_lhr' => 'required',
        'j_kel' => 'required',
        'status' => 'required',
        'no_telp' => 'required',
        'ket' => 'min:5',

    ]);


        $Anggota = Anggota::find($id);
        $Anggota->nama = $request->nama;
        $Anggota->alamat = $request->alamat;
        $Anggota->tgl_lhr = $request->tgl_lhr;
        $Anggota->tmp_lhr = $request->tmp_lhr;
        $Anggota->j_kel = $request->j_kel;
        $Anggota->status = $request->status;
        $Anggota->no_telp = $request->no_telp;
        $Anggota->ket = $request->ket;

        $Anggota->save();

        return redirect('admin/anggota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Anggota = Anggota::find($id);
        $Anggota->delete();

        return redirect('admin/anggota');
    }
}
