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
            <form action="{{ route('galerias.update', $galeria->id) }}" method="post" enctype="multipart/form-data">
                {{method_field('PUT')}}
                {{ csrf_field() }}
                @include('admin.galerias._partials.form')
            </form>
        </div>
            
       
    </div>
</div>
<!-- /.container-fluid -->
@endsection