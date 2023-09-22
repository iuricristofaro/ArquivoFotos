@extends('admin.layouts.app')


@section('content')

<div class="container-fluid">

    <div class="card">
        <div class="card-header">
          Araras
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $arara->title }}</h5>
            <p class="card-text">{{ $arara->texto }}</p>
            <p class="card-text">{{ $arara->titulo }}</p>
            <p class="card-text">{{ $arara->texto }}</p>
            <p><img src="{{ url("arara/{$arara->image}") }}" alt="" class="btn-circle"></p>

            <div class="row">
                <div class="col-sm-1">
                <a href="{{ route('arara.index') }}" class="btn btn-primary">Voltar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('arara.destroy', $arara->id) }}" method="POST">
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