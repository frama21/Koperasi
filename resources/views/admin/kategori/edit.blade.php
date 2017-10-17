@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/admin/kategoripinjaman/{{$Kategori->id}}">

                        <div class="form-group{{ $errors->has('id_pinjaman') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama Kategori</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="id_pinjaman" value="{{$Kategori->id_pinjaman}}" required autofocus>

                                @if ($errors->has('id_pinjaman'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_pinjaman') }}</strong>
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
