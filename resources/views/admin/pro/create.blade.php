@extends('admin.layouts.app')


@section('content')

<div class="container-fluid">
    @include('admin.includes.validations-form')
    <div class="card">
        <div class="card-header">
            Criar
        </div>
        <div class="card-body">
            @if( Session::has('success') )
            <div class="alert alert-success hide-msg" style="float: left; width: 100%; margin: 10px 0px;">
                {!! Session::get('success') !!}
            </div>
            @endif

            @if( isset($errors) && count($errors) > 0 )
            <div class="alert alert-warning">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
            @endif
            
            <form action="{{ route('pro.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('admin.pro._partials.form')
            </form>
        </div>
            
       
    </div>
</div>
@endsection