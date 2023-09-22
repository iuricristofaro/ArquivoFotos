@extends('admin.layouts.app')


@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
          at
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $at->title }}</h5>
            <p class="card-text">{!!  html_entity_decode(substr($at->description, 450)) !!}</p>
            <div class="row">
                <div class="col-sm-1">
                <a href="{{ route('at.index') }}" class="btn btn-primary">Voltar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('at.destroy', $at->id) }}" method="POST">
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