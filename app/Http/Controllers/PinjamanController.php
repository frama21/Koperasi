<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pinjaman;
use App\Anggota;
use App\Angsuran;

class PinjamanController extends Controller
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
        $Anggota = Anggota::all();
        $Angsuran = Angsuran::all();
        $Pinjaman = Pinjaman::all();
        return view('admin.pinjaman.index', compact(['Anggota', $Anggota], ['Angsuran', $Angsuran], ['Pinjaman', $Pinjaman]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Anggota = Anggota::all();
        $Angsuran = Angsuran::all();
        $Pinjaman = Pinjaman::all();
        return view('admin.pinjaman.index', compact(['Anggota', $Anggota], ['Angsuran', $Angsuran], ['Pinjaman', $Pinjaman]));
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
        'nama_pinjaman' => 'required',
        'anggota_id' => 'required',
        'besar_pinjaman' => 'required',
        'tgl_pengajuan_pinjaman' => 'required',
        'tgl_acc_peminjaman' => 'required',
        'tgl_pinjaman' => 'required',
        'tgl_pelunasan' => 'required',
        'angsuran_id' => 'required',
        'ket' => 'min:5',
    ]);


        $Pinjaman = new Pinjaman;
        $Pinjaman->nama_pinjaman = $request->nama_pinjaman;
        $Pinjaman->anggota_id = $request->anggota_id;
        $Pinjaman->besar_pinjaman = $request->besar_pinjaman;
        $Pinjaman->tgl_pengajuan_pinjaman = $request->tgl_pengajuan_pinjaman;
        $Pinjaman->tgl_acc_peminjaman = $request->tgl_acc_peminjaman;

        $Pinjaman->tgl_pinjaman = $request->tgl_pinjaman;
        $Pinjaman->tgl_pelunasan = $request->tgl_pelunasan;
        $Pinjaman->angsuran_id = $request->angsuran_id;
        $Pinjaman->ket = $request->ket;
        $Pinjaman->save();

        return redirect('admin/pinjaman');
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
        $Anggota = Anggota::all();
        $Angsuran = Angsuran::all();
        $Pinjaman = Pinjaman::find($id);

        if(!$Pinjaman){
            abort(404);
        }

        return view('admin.pinjaman.edit', compact(['Anggota'],['Angsuran']))->with('Pinjaman',$Pinjaman);
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
        'nama_pinjaman' => 'required',
        'anggota_id' => 'required',
        'besar_pinjaman' => 'required',
        'tgl_pengajuan_pinjaman' => 'required',
        'tgl_acc_peminjaman' => 'required',
        'tgl_pinjaman' => 'required',
        'tgl_pelunasan' => 'required',
        'angsuran_id' => 'required',
        'ket' => 'min:5',
    ]);


        $Pinjaman = Pinjaman::find($id);
        $Pinjaman->nama_pinjaman = $request->nama_pinjaman;
        $Pinjaman->anggota_id = $request->anggota_id;
        $Pinjaman->besar_pinjaman = $request->besar_pinjaman;
        $Pinjaman->tgl_pengajuan_pinjaman = $request->tgl_pengajuan_pinjaman;
        $Pinjaman->tgl_acc_peminjaman = $request->tgl_acc_peminjaman;

        $Pinjaman->tgl_pinjaman = $request->tgl_pinjaman;
        $Pinjaman->tgl_pelunasan = $request->tgl_pelunasan;
        $Pinjaman->angsuran_id = $request->angsuran_id;
        $Pinjaman->ket = $request->ket;
        $Pinjaman->save();

        return redirect('admin/pinjaman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Pinjaman = Pinjaman::find($id);
        $Pinjaman->delete();

        return redirect('admin/pinjaman');
    }
}
