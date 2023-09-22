<div class="form-group">
  <label>Título</label>
  <input type="text" name="titulo" class="form-control" id="exampleInputEmail1" value="{{ isset($registro->titulo) && !old('titulo') ? $registro->titulo : '' }}{{old('titulo')}}">
</div>
<div class="form-group">
  <label>Descrição</label>
  <input type="text" name="descricao" class="form-control" id="exampleInputEmail1" value="{{ isset($registro->descricao) && !old('descricao') ? $registro->descricao : '' }}{{old('descricao')}}">
</div>

<div class="form-group">
  <label>Url - (Link/)</label>
  <input type="text" name="url" class="form-control" id="exampleInputEmail1" value="{{ isset($registro->url) && !old('url') ? $registro->url : '' }}{{old('url')}}">
</div>

<div class="form-group">
  <label for="exampleInputFile">Carregar imagens</label>
  <div class="input-group">
    <div class="custom-file">
      <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
      <label class="custom-file-label" for="exampleInputFile">Arquivo</label>
    </div>
  </div>
</div>