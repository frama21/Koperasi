@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/admin/kategoripinjaman">

                        <div class="form-group{{ $errors->has('pinjaman_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama Kategori</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pinjaman_id" required autofocus>

                                @if ($errors->has('pinjaman_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pinjaman_id') }}</strong>
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
                            <th>Nama Kategori</th>
                            <th>Pinjam Pada Tgl</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($Kategori as $datakategori)
                        <tr>
                            <td>{{ $datakategori -> pinjaman_id }}</td>
                            <td>{{ $datakategori -> created_at }}</td>
                             <td>
                                <a type="button" class="btn btn-primary" href="/admin/kategoripinjaman/{{$datakategori->id}}/edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            </td>
                            <td>
                                <form action="/admin/kategoripinjaman/{{$datakategori->id}}" method="post">
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
