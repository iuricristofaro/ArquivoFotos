@extends('admin.layouts.app')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
          Galerias de Fotos
        </div>
        <div class="card-body">
            <p class="card-text">{{ $galeria->text }}</p>
            <p><img src="{{ url("galerias/{$galeria->image}") }}" alt="" class="btn-circle"></p>

            <div class="row">
                <div class="col-sm-1">
                <a href="{{ route('galerias.index') }}" class="btn btn-primary">Voltar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('galerias.destroy', $galeria->id) }}" method="POST">
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