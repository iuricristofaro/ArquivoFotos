@extends('admin.layouts.app')


@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Slide</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Criar</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!-- @include('admin.includes.validations-form') -->
            <div class="card">  
                <div class="card-body">
                    @if( Session::has('success') )
                    <div class="alert alert-success hide-msg" style="float: left; width: 100%; margin: 10px 0px;">
                        {!! Session::get('success') !!}
                    </div>
                    @endif

                    <form action="{{ route('slide.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('admin.home._partials.form')
                    </form>
                </div>       
            </div>
        </div>
    </div>
   
</div>
<!-- /.container-fluid -->
@endsection