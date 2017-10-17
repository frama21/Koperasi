@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/admin/simpanan">

                        <div class="form-group{{ $errors->has('nm_simpanan') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama Simpanan</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nm_simpanan" required autofocus>

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
                                <input type="text" class="form-control" name="anggota_id" required>

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
                                <input type="text" class="form-control" name="tgl_simpanan">

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
                                <input type="text" class="form-control" name="besar_simpanan" required>

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
                                <textarea name="ket" class="form-control" rows="10"></textarea>

                                @if ($errors->has('ket'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ket') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                        </div>
                    </form>
                </div>



            </div>
                <div class="panel panel-default">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Simpanan</th>
                            <th>Nama Peyimpan</th>
                            <th>Tgl di Simpan</th>
                            <th>Besar Simpanan</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($Simpanan as $datasimpanan)
                        <tr>
                            <td>{{ $datasimpanan -> nm_simpanan }}</td>
                            <td>{{ $datasimpanan -> anggota_id }}</td>
                            <td>{{ $datasimpanan -> tgl_simpanan }}</td>
                            <td>{{ $datasimpanan -> besar_simpanan }}</td>
                            <td>{{ $datasimpanan -> ket }}</td>
                             <td>
                                <a type="button" class="btn btn-primary" href="/admin/simpanan/{{$datasimpanan->id}}/edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            </td>
                            <td>
                                <form action="/admin/simpanan/{{$datasimpanan->id}}" method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" name="name" value="delete" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                </form>
                                
                            </td>
                        </tr>
                     @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection