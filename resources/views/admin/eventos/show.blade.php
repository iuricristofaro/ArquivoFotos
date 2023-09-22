@extends('admin.layouts.app')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
          Cutural
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $evento->title }}</h5>
            <p class="card-text">{{ $evento->texto }}</p>
            <p class="card-text">{{ $evento->titulo }}</p>
            <p class="card-text">{{ $evento->texto }}</p>
            <p><img src="{{ url("evento/{$evento->image}") }}" alt="" class="btn-circle"></p>

            <div class="row">
                <div class="col-sm-1">
                <a href="{{ route('eventos.index') }}" class="btn btn-primary">Voltar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST">
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