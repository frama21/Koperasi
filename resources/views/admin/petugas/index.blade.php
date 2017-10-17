@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/admin">

                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama Petugas</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama" required autofocus>

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
                                <input type="text" class="form-control" name="alamat" required>

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
                                <input type="text" class="form-control" name="no_telp">

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
                                <input type="text" class="form-control" name="tmp_lhr" required>

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
                                <input type="text" class="form-control" name="tgl_lhr" required>

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
                            <th>Nama Petugas</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Tempat/Tgl Lahir</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($Petugas as $datapetugas)
                        <tr>
                            <td>{{ $datapetugas -> nama }}</td>
                            <td>{{ $datapetugas -> alamat }}</td>
                            <td>{{ $datapetugas -> no_telp }}</td>
                            <td>{{ $datapetugas -> tmp_lhr }}/{{ $datapetugas -> tgl_lhr }}</td>
                            <td>{{ $datapetugas -> ket }}</td>
                             <td>
                                <a type="button" class="btn btn-primary" href="/admin/{{$datapetugas->id}}/edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            </td>
                            <td>
                                <form action="/admin/{{$datapetugas->id}}" method="post">
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
