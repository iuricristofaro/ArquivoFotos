@extends('admin.layouts.app')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
          Secrearia
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $scretaria->title }}</h5>
            <p class="card-text">{{ $scretaria->texto }}</p>
            <p class="card-text">{{ $scretaria->titulo }}</p>
            <p class="card-text">{{ $scretaria->texto }}</p>
            <p><img src="{{ url("scretaria/{$scretaria->image}") }}" alt="" class="btn-circle"></p>

            <div class="row">
                <div class="col-sm-1">
                <a href="{{ route('scretaria.index') }}" class="btn btn-primary">Voltar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('scretaria.destroy', $scretaria->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
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