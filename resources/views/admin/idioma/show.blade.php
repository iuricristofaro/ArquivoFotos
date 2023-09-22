@extends('admin.layouts.app')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
          Idioma
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $idioma->title }}</h5>
            <p class="card-text">{{ $idioma->texto }}</p>
            <p class="card-text">{{ $idioma->titulo }}</p>
            <p class="card-text">{{ $idioma->texto }}</p>
            <p><img src="{{ url("idioma/{$idioma->image}") }}" alt="" class="btn-circle"></p>

            <div class="row">
                <div class="col-sm-1">
                <a href="{{ route('idioma.index') }}" class="btn btn-primary">Voltar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('idioma.destroy', $idioma->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        
                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection