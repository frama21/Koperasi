@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/admin/angsuran">

                        <div class="form-group{{ $errors->has('kategori_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Id Kategori</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="kategori_id" required autofocus>

                                @if ($errors->has('kategori_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kategori_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('anggota_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Id Anggota</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="anggota_id" required>

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
                                <input type="text" class="form-control" name="tgl_pembayaran" required>

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
                                <input type="text" class="form-control" name="angsuran_ke" required>

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
                                <input type="text" class="form-control" name="besar_angsuran" required>

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
        </div>
                        <div class="panel panel-default">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id Kategori</th>
                            <th>Id Anggota</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Angsuran Ke</th>
                            <th>Besar Angsuran</th>
                            <th>ket</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($Angsuran as $dataangsuran)
                        <tr>
                            <td>{{ $dataangsuran -> kategori_id }}</td>
                            <td>{{ $dataangsuran -> anggota_id }}</td>
                            <td>{{ $dataangsuran -> tmp_pembayaran }}/{{ $dataangsuran -> tgl_pembayaran }}</td>
                            <td>{{ $dataangsuran -> angsuran_ke}}</td>
                            <td>{{ $dataangsuran -> besar_angsuran}}</td>
                            <td>{{ $dataangsuran -> ket }}</td>
                             <td>
                                <a type="button" class="btn btn-primary" href="/admin/angsuran/{{$dataangsuran->id}}/edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            </td>
                            <td>
                                <form action="/admin/angsuran/{{$dataangsuran->id}}" method="post">
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
@endsection
