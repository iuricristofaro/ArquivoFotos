@extends('admin.layouts.app')


@section('content')

<div class="container-fluid">
    @include('admin.includes.validations-form')
    <div class="card">
        <div class="card-header">
            Editor
        </div>

        @if( Session::has('success') )
        <div class="alert alert-success hide-msg" style="float: left; width: 100%; margin: 10px 0px;">
            {!! Session::get('success') !!}
        </div>
        @endif

        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @include('admin.users._partials.form')
            </form>
        </div>
            
       
    </div>
</div>

@endsection