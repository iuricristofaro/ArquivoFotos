@extends('admin.layouts.app')


@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
          Historia
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $historia->title }}</h5>
            <p class="card-text">{{ $historia->texto }}</p>
            <p><img src="{{ url("historia/{$historia->image}") }}" alt="" class="btn-circle"></p>
            
            <p class="card-text">{{ $historia->fb }}</p>
            <p class="card-text">{{ $historia->instagram }}</p>
            <p class="card-text">{{ $historia->name }}</p>
            <p class="card-text">{{ $historia->carga }}</p>
            <div class="row">
                <div class="col-sm-1">
                <a href="{{ route('historia.index') }}" class="btn btn-primary">Voltar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('historia.destroy', $historia->id) }}" method="POST">
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