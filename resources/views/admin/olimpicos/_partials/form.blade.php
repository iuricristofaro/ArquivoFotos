
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Titulo</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $olimpico->title ?? old('title') }}">
    </div>
    
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Texto</label>
        <input type="text" name="text" class="form-control" id="exampleFormControlInput1" value="{{ $olimpico->text ?? old('text') }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">URL</label>
        <input type="text" name="url" class="form-control" id="exampleFormControlInput1" value="{{ $olimpico->url ?? old('url') }}">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Fotos</label>
        <input class="form-control" type="file" name="image" id="formFile">
    </div>

    <textarea name="description" id="summernote" cols="30" rows="5" class="form-control">{{ $olimpico->description ?? old('description') }}</textarea>

    <br>

    <button class="btn btn-success">
        Enviar
    </button>


    <a class="btn btn-success" href="{{ url('admin/olimpicos') }}">Voltar</a>  

