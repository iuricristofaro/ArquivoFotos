@extends('admin.layouts.app')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    @include('admin.includes.validations-form')
    <div class="card">
        <div class="card-header">
            Editor
        </div>
        <div class="card-body">
            @if( Session::has('success') )
            <div class="alert alert-success hide-msg" style="float: left; width: 100%; margin: 10px 0px;">
                {!! Session::get('success') !!}
            </div>
            @endif
            <form action="{{ route('meusdados.update') }}" method="post" enctype="multipart/form-data">
                {{method_field('PUT')}}
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" id="exampleFormControlInput1" value="{{ $user->password ?? old('password') }}">
                </div>
                
                <button class="btn btn-success">
                    Enviar
                </button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection