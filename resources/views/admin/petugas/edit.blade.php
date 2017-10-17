@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form class="form-horizontal" action="/admin/{{$Petugas->id}}" method="POST">
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama Petugas</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama" value="{{$Petugas->nama}}" required autofocus>

                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Alamat Petugas</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="alamat" value="{{$Petugas->alamat}}" required>

                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('no_telp') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nomor Telp</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="no_telp" value="{{$Petugas->no_telp}}">

                                @if ($errors->has('no_telp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_telp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tmp_lhr') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Tempat Lahir</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tmp_lhr" value="{{$Petugas->tmp_lhr}}">

                                @if ($errors->has('tmp_lhr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tmp_lhr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tgl_lhr') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Tanggal Lahir</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tgl_lhr" value="{{$Petugas->tgl_lhr}}">

                                @if ($errors->has('tgl_lhr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_lhr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Keterangan</label>

                            <div class="col-md-6">
                                <textarea name="ket" class="form-control" rows="10">{{$Petugas->ket}}</textarea>

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
