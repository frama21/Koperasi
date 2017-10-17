@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/admin/pinjaman">

                        <div class="form-group{{ $errors->has('nama_pinjaman') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama Pinjaman</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama_pinjaman" required autofocus>

                                @if ($errors->has('nama_pinjaman'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_pinjaman') }}</strong>
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

                        <div class="form-group{{ $errors->has('besar_pinjaman') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Besar Pinjaman</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="besar_pinjaman" required>

                                @if ($errors->has('besar_pinjaman'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('besar_pinjaman') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tgl_pengajuan_pinjaman') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Tgl Pengajuan Pinjaman</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tgl_pengajuan_pinjaman" required>

                                @if ($errors->has('tgl_pengajuan_pinjaman'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_pengajuan_pinjaman') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tgl_acc_peminjaman') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Tgl Acc Peminjaman</label>

                            <div class="col-md-6">
                                <input type="text" name="tgl_acc_peminjaman" class="form-control">

                                @if ($errors->has('tgl_acc_peminjaman'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_acc_peminjaman') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tgl_pinjaman') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Tgl Pinjaman</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tgl_pinjaman">

                                @if ($errors->has('tgl_pinjaman'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_pinjaman') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tgl_pelunasan') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Tgl Pelunasan</label>

                            <div class="col-md-6">
                                <input type="text" name="tgl_pelunasan" class="form-control">

                                @if ($errors->has('tgl_pelunasan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_pelunasan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('angsuran_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Angsuran</label>

                            <div class="col-md-6">
                                <input type="text" name="angsuran_id" class="form-control">

                                @if ($errors->has('angsuran_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('angsuran_id') }}</strong>
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
                            <th>Nama Pinjaman</th>
                            <th>Nama Anggota</th>
                            <th>Besar Pinjaman</th>
                            <th>Tgl Pengajuan Pinjaman</th>
                            <th>Tgl Acc</th>
                            <th>Tgl Pinjaman</th>
                            <th>Tgl Pelunasan</th>
                            <th>Angsuran</th>
                            <th>ket</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($Pinjaman as $datapinjaman)
                        <tr>
                            <td>{{ $datapinjaman -> nama_pinjaman }}</td>
                            <td>{{ $datapinjaman -> anggota_id }}</td>
                            <td>{{ $datapinjaman -> besar_pinjaman }}</td>
                            <td>{{ $datapinjaman -> tgl_pengajuan_pinjaman }}</td>
                            <td>{{ $datapinjaman -> tgl_acc_peminjaman}}</td>
                            <td>{{ $datapinjaman -> tgl_pinjaman}}</td>
                            <td>{{ $datapinjaman -> tgl_pelunasan }}</td>
                            <td>{{ $datapinjaman -> angsuran_id }}</td>
                            <td>{{ $datapinjaman -> ket }}</td>
                             <td>
                                <a type="button" class="btn btn-primary" href="/admin/pinjaman/{{$datapinjaman->id}}/edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            </td>
                            <td>
                                <form action="/admin/pinjaman/{{$datapinjaman->id}}" method="post">
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
