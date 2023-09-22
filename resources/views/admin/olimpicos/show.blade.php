@extends('admin.layouts.app')


@section('content')

<div class="container-fluid">

    <div class="card">
        <div class="card-header">
          Olimpicos
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $olimpico->title }}</h5>
            <p class="card-text">{{ $olimpico->texto }}</p>
            <p class="card-text">{{ $olimpico->titulo }}</p>
            <p class="card-text">{{ $olimpico->texto }}</p>
            <p><img src="{{ url("olimpicos/{$olimpico->image}") }}" alt="" class="btn-circle"></p>

            <div class="row">
                <div class="col-sm-1">
                <a href="{{ route('olimpicos.index') }}" class="btn btn-primary">Voltar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('olimpicos.destroy', $olimpico->id) }}" method="POST">
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