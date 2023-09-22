@extends('admin.layouts.app')


@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            Inf
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $inf->titulo }}</h5>
            <p class="card-text">{{ $inf->texto }}</p> <br>
            <p class="card-text">{{ $inf->url }}</p> <br>
            <p>{!!  html_entity_decode(substr($inf->description, 450)) !!}</p>

            <div class="row">
                <div class="col-sm-1">
                <a href="{{ route('inf.index') }}" class="btn btn-primary">Voltar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('inf.destroy', $inf->id) }}" method="POST">
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