@extends('admin.layouts.app')


@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
          Basquete
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $basquete->title }}</h5>
            <p class="card-text">{{ $basquete->text }}</p>
            <p class="card-text">{{ $basquete->titulo }}</p>
            <p class="card-text">{{ $basquete->texto }}</p>
            <p><img src="{{ url("basquete/{$basquete->image}") }}" alt="" class="btn-circle"></p>

            <div class="row">
                <div class="col-sm-1">
                <a href="{{ route('basquete.index') }}" class="btn btn-primary">Voltar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('basquete.destroy', $basquete->id) }}" method="POST">
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