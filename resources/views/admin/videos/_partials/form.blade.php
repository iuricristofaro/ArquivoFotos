
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Texto</label>
        <input type="text" name="text" class="form-control" id="exampleFormControlInput1" value="{{ $video->text ?? old('text') }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Link</label>
        <input type="text" name="link" class="form-control" id="exampleFormControlInput1" value="{{ $video->link ?? old('link') }}">
    </div>
    

    <button class="btn btn-success">
        Enviar
    </button>


    <a class="btn btn-success" href="{{ url('admin/videos') }}">Voltar</a>

