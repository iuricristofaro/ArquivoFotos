@extends('admin.layouts.app')


@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
          Lazer
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $lazer->title }}</h5>
            <p class="card-text">{{ $lazer->texto }}</p>
            <p class="card-text">{{ $lazer->titulo }}</p>
            <p class="card-text">{{ $lazer->texto }}</p>
            <p><img src="{{ url("lazer/{$lazer->image}") }}" alt="" class="btn-circle"></p>

            <div class="row">
                <div class="col-sm-1">
                <a href="{{ route('lazer.index') }}" class="btn btn-primary">Voltar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('lazer.destroy', $lazer->id) }}" method="POST">
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
@endsection