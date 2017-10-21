<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
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
        $Kategori = Kategori::all();
        return view('admin.kategori.index', compact(['Kategori', $Kategori]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function search(Request $request)
    {
        $carikategori = $request->get('search');
        $Kategori = Kategori::where('id','=','%'.$carikategori)
        ->orWhere('id','LIKE','%'.$carikategori.'%')
        ->orWhere('nama_pinjaman','LIKE','%'.$carikategori.'%')
        ->paginate(5);
        return view('admin.kategori.index', compact(['carikategori', $carikategori], ['Kategori', $Kategori]));
    }


    public function create()
    {
        $Kategori = Kategori::all();
        return view('admin.kategori.index', compact(['Kategori', $Kategori]));
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
    ]);


        $Kategori = new Kategori;
        $Kategori->nama_pinjaman = $request->nama_pinjaman;

        $Kategori->save();

        return redirect('admin/kategoripinjaman');
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
         $Kategori = Kategori::find($id);

        if(!$Kategori){
            abort(404);
        }

        return view('admin.kategori.edit')->with('Kategori', $Kategori);
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
    ]);


        $Kategori = Kategori::find($id);
        $Kategori->nama_pinjaman = $request->nama_pinjaman;

        $Kategori->save();

        return redirect('admin/kategoripinjaman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Kategori = Kategori::find($id);
        $Kategori->delete();

        return redirect('admin/kategoripinjaman');
    }
}
