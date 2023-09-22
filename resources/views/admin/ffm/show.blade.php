@extends('admin.layouts.app')


@section('content')

<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            Futebol Fem e Masc
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $ffm->title }}</h5>
            <p class="card-text">{{ $ffm->texto }}</p>
            <p class="card-text">{{ $ffm->titulo }}</p>
            <p class="card-text">{{ $ffm->texto }}</p>
            <p><img src="{{ url("ffm/{$ffm->image}") }}" alt="" class="btn-circle"></p>

            <div class="row">
                <div class="col-sm-1">
                <a href="{{ route('ffm.index') }}" class="btn btn-primary">Voltar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('ffm.destroy', $ffm->id) }}" method="POST">
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