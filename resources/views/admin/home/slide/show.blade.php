@extends('admin.layouts.app')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
          Slide
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $slide->title }}</h5>
            <p class="card-text">{{ $slide->text }}</p>
            <p class="card-text">{!! html_entity_decode($slide->description) !!}</p>
            <p><img src="{{ asset('uploads/slide/'.$slide->image) }}" alt="" class="btn-circle"></p>

            <div class="row">
                <div class="col-sm-1">
                    <a href="{{ url('admin/slide') }}" class="btn btn-primary">Voltar</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('slide.destroy', $slide->id) }}" method="POST">
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
</div>
@endsection