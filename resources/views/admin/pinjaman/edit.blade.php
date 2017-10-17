@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/admin/pinjaman/{{$Pinjaman->id}}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Pinjaman</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama_pinjaman" value="{{$Pinjaman->nama_pinjaman}}" required autofocus>

                                @if ($errors->has('nama_pinjaman'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_pinjaman') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Anggota</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="anggota_id" value="{{$Pinjaman->anggota_id}}" required>

                                @if ($errors->has('anggota_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('anggota_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Besar Pinjaman</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="besar_pinjaman" value="{{$Pinjaman->besar_pinjaman}}" required>

                                @if ($errors->has('besar_pinjaman'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('besar_pinjaman') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Tgl Pengajuan Pinjaman</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tgl_pengajuan_pinjaman" value="{{$Pinjaman->tgl_pengajuan_pinjaman}}" required>

                                @if ($errors->has('tgl_pengajuan_pinjaman'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_pengajuan_pinjaman') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Tgl Acc Peminjaman</label>

                            <div class="col-md-6">
                                <input type="text" name="tgl_acc_peminjaman" class="form-control" value="{{$Pinjaman->tgl_acc_peminjaman}}" >

                                @if ($errors->has('tgl_acc_peminjaman'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_acc_peminjaman') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Tgl Pinjaman</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tgl_pinjaman" value="{{$Pinjaman->tgl_pinjaman}}" >

                                @if ($errors->has('tgl_pinjaman'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_pinjaman') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Tgl Pelunasan</label>

                            <div class="col-md-6">
                                <input type="text" name="tgl_pelunasan" class="form-control" value="{{$Pinjaman->tgl_pelunasan}}" >

                                @if ($errors->has('tgl_pelunasan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_pelunasan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Angsuran</label>

                            <div class="col-md-6">
                                <input type="text" name="angsuran_id" class="form-control" value="{{$Pinjaman->angsuran_id}}" >

                                @if ($errors->has('angsuran_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('angsuran_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Keterangan</label>

                            <div class="col-md-6">
                                <textarea name="ket" class="form-control" rows="10">{{$Pinjaman->ket}}</textarea>

                                @if ($errors->has('ket'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ket') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input type="hidden" name="_method" value="put">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" value="edit" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
