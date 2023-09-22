@if ($errors->any())
<div class="card shadow mb-4">
    <div class="card bg-success text-white shadow">
        @foreach ($errors->all() as $error)
                <h5 class="h5-color">{{ $error }}</h5>
            @endforeach
    </div>
</div>
@endif