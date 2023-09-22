@extends('admin.layouts.app')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    {{-- @include('admin.includes.validations-form') --}}
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
            <form action="{{ route('ati.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('admin.atividades.ati._partials.form')
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection