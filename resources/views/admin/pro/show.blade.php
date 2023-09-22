@extends('admin.layouts.app')


@section('content')

<div class="container-fluid">

    <div class="card">
        <div class="card-header">
          Profissional
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $pro->title }}</h5>
            <p class="card-text">{{ $pro->text }}</p>
            <p class="card-text">{{ $pro->titulo }}</p>
            <p class="card-text">{{ $pro->texto }}</p>
            <p><img src="{{ url("pro/{$pro->image}") }}" alt="" class="btn-circle"></p>

            <div class="row">
                <div class="col-sm-1">
                <a href="{{ route('pro.index') }}" class="btn btn-primary">Voltar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('pro.destroy', $pro->id) }}" method="POST">
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