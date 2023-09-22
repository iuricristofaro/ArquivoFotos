@extends('admin.layouts.app')


@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
          Tour Virtual
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $virtual->title }}</h5>
            <p class="card-text">{{ $virtual->texto }}</p>
            <p class="card-text">{{ $virtual->titulo }}</p>
            <p class="card-text">{{ $virtual->texto }}</p>
            <p><img src="{{ url("virtual/{$virtual->image}") }}" alt="" class="btn-circle"></p>

            <div class="row">
                <div class="col-sm-1">
                <a href="{{ route('virtual.index') }}" class="btn btn-primary">Voltar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('virtual.destroy', $virtual->id) }}" method="POST">
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