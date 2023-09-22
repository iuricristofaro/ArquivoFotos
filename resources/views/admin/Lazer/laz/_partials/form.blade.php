    <div class="w-full bg-white shadow-md rounded px-8 py-12">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Titulo</label>
            <input type="text" name="titulo" class="form-control" id="exampleFormControlInput1" value="{{ $data->titulo ?? old('titulo') }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Texto</label>
            <input type="text" name="texto" class="form-control" id="exampleFormControlInput1" value="{{ $data->texto ?? old('texto') }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">URL</label>
            <input type="text" name="url" class="form-control" id="exampleFormControlInput1" value="{{ $data->url ?? old('url') }}">
        </div>
        
        <textarea name="description" id="summernote" cols="30" rows="5" class="form-control">{{ $data->description ?? old('description') }}</textarea>

        <br>
        <button type="submit" class="btn btn-success">
            Enviar
        </button>

        <a class="btn btn-success" href="{{ url('admin/laz') }}">Voltar</a> 
    </div>