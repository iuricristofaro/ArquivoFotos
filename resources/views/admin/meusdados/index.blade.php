@extends('admin.layouts.app')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
          Meus Dados
        </div>
        <div class="card-body">
            <h1 class="fw-light">{{ auth()->user()->name }}</h1>
                <br>
            <p class="lead">{{ auth()->user()->email }}</p>
            <div class="col-lg-6">
                <a href="{{ route('meusdados.edit', auth()->user()->id) }}" class="btn btn-primary">Editar</a>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection