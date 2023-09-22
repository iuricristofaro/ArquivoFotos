@extends('admin.layouts.app')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    @include('admin.includes.validations-form')
    <div class="card">
        <div class="card-header">
            Criar
        </div>
        <div class="card-body">
            <form action="{{ route('comments.update', $comment->id) }}" method="post">
                @method('PUT')
                @include('admin.users.comments._partials.form')
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection