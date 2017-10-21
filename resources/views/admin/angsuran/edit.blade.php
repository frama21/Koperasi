@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/admin/angsuran/{{$Angsuran->id}}">

                        <div class="form-group{{ $errors->has('kategori_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Kategori Pinjaman</label>

                            <div class="col-md-6">

                                <select name="kategori_id" class="form-control">
                                    @foreach($Kategori as $datakategori)
                                    <option value="{{ $datakategori->id }}">{{ $datakategori->nama_pinjaman }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('kategori_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kategori_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('anggota_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama Anggota</label>

                            <div class="col-md-6">

                                <select name="anggota_id" class="form-control">
                                    @foreach($Anggota as $dataanggota)
                                    <option value="{{ $dataanggota->id }}">{{ $dataanggota->nama }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('anggota_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('anggota_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tgl_pembayaran') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Tanggal Pembayaran</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tgl_pembayaran" value="{{$Angsuran->tgl_pembayaran}}" required>

                                @if ($errors->has('tgl_pembayaran'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_pembayaran') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('angsuran_ke') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Angsuran Ke</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="angsuran_ke" value="{{$Angsuran->angsuran_ke}}" required>

                                @if ($errors->has('angsuran_ke'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('angsuran_ke') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('besar_angsuran') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Besar Angsuran</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="besar_angsuran" value="{{$Angsuran->besar_angsuran}}" required>

                                @if ($errors->has('besar_angsuran'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('besar_angsuran') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                        <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Keterangan</label>

                            <div class="col-md-6">
                                <textarea name="ket" class="form-control" rows="10">{{$Angsuran->ket}}</textarea>

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
