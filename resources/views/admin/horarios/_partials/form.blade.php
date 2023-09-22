
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Titulo</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $horario->title ?? old('title') }}">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Fotos</label>
        <input class="form-control" type="file" name="image" id="formFile">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">URL</label>
        <input type="text" name="url" class="form-control" id="exampleFormControlInput1" value="{{ $horario->url ?? old('url') }}">
    </div>

    <textarea name="description" id="summernote" cols="30" rows="5" class="form-control">{{ $horario->description ?? old('description') }}</textarea>
    
    <br>

    <button class="btn btn-success">
        Enviar
    </button>


    <a class="btn btn-success" href="{{ url('admin/horarios') }}">Voltar</a>  
