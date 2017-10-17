@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/admin/simpanan/{{$Simpanan->id}}">

                        <div class="form-group{{ $errors->has('nm_simpanan') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama Simpanan</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nm_simpanan" value="{{$Simpanan->nm_simpanan}}">

                                @if ($errors->has('nm_simpanan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nm_simpanan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('anggota_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama Anggota</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="anggota_id" value="{{$Simpanan->anggota_id}}">

                                @if ($errors->has('anggota_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('anggota_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tgl_simpanan') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Tgl Simpanan</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tgl_simpanan" value="{{$Simpanan->tgl_simpanan}}">

                                @if ($errors->has('tgl_simpanan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_simpanan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('besar_simpanan') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Besar Simpanan</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="besar_simpanan" value="{{$Simpanan->besar_simpanan}}" required>

                                @if ($errors->has('besar_simpanan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('besar_simpanan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Keterangan</label>

                            <div class="col-md-6">
                                <textarea name="ket" class="form-control" rows="10">{{$Simpanan->ket}}</textarea>

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