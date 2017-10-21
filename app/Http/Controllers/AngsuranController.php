<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Angsuran;
use App\Kategori;
use App\Anggota;

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
        $Kategori = Kategori::all();
        $Anggota = Anggota::all();
        $Angsuran = Angsuran::all();
        return view('admin.angsuran.index', compact(['Kategori', $Kategori], ['Anggota', $Anggota], ['Angsuran', $Angsuran]));
    }

    public function search(Request $request)
    {
        $cariangsuran = $request->get('search');
        $Angsuran = Angsuran::where('id','=','%'.$cariangsuran)
        ->orWhere('id','LIKE','%'.$cariangsuran.'%')
        ->orWhere('kategori_id','LIKE','%'.$cariangsuran.'%')
        ->orWhere('anggota_id','LIKE','%'.$cariangsuran.'%')
        ->orWhere('tgl_pembayaran','LIKE','%'.$cariangsuran.'%')
        ->orWhere('angsuran_ke','LIKE','%'.$cariangsuran.'%')
        ->orWhere('besar_angsuran','LIKE','%'.$cariangsuran.'%')
        ->orWhere('ket','LIKE','%'.$cariangsuran.'%')
        ->paginate(5);
        return view('admin.angsuran.index', compact(['cariangsuran', $cariangsuran], ['Angsuran', $Angsuran]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Kategori = Kategori::all();
        $Anggota = Anggota::all();
        $Angsuran = Angsuran::all();
        return view('admin.angsuran.index', compact(['Kategori', $Kategori], ['Anggota', $Anggota], ['Angsuran', $Angsuran]));  
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
        $Kategori = Kategori::all();
        $Anggota = Anggota::all();
        $Angsuran = Angsuran::find($id);

        if(!$Angsuran){
            abort(404);
        }

        return view('admin.angsuran.edit', compact(['Kategori'], ['Anggota']))->with('Angsuran',$Angsuran);
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

    public function excel()
    {
        $angsuran = \DB::table('angsuran')
                            ->join('kategori_pinjaman','id','=','angsuran.kategori_id')
                            ->join('anggota','id','=','anggota.anggota_id')
                            ->select('angsuran.id','kategori_pinjaman.nama_pinjaman','anggota.nama','angsuran.tgl_pembayaran','angsuran.angsuran_ke','angsuran.besar_angsuran','angsuran.ket')
                            ->get();

        \Excel::create('Data Anggota',function($excel) use($angsuran)
                      {

                        $excel->sheet('data anggota',function($sheet) use ($angsuran)
                        {
                            $row=1;
                            $sheet->row($row,array(
                            'No','Kategori', 'Nama Anggota', 'Tgl Pembayaran', 'Angsuran Ke', 'Besar Angsuran', 'Keterangan',));

                            $no=1;
                            foreach($angsuran as $a)
                            {
                                $sheet->row(++$row,array(
                                    $no,
                                    $a->kategori_id,
                                    $a->anggota_id,
                                    $a->tgl_pembayaran,
                                    $a->angsuran_ke,
                                    $a->besar_angsuran,
                                    $a->ket,
                                ));
                                 $no++;
                            }

                        });

                    })->export('xls');

        return redirect('admin/angsuran');
    }
}
