@extends('admin.layouts.app')


@section('content')

<div class="container-fluid">

    <div class="card">
        <div class="card-header">
          Memoria
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $memoria->title }}</h5>
            <p class="card-text">{{ $memoria->texto }}</p>
            <p class="card-text">{{ $memoria->date }}</p>
            <p><img src="{{ url("memoria/{$memoria->image}") }}" alt="" class="btn-circle"></p>
            
            <p class="card-text">{{ $memoria->link }}</p>

            <div class="row">
                <div class="col-sm-1">
                <a href="{{ route('memoria.index') }}" class="btn btn-primary">Voltar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('memoria.destroy', $memoria->id) }}" method="POST">
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