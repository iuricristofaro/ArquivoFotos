
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nome</label>
        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ isset($roles->name) ? $roles->name : '' }}">
    </div>
    
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Descrição</label>
        <input type="text" name="label" class="form-control" id="exampleFormControlInput1" value="{{ isset($roles->label) ? $roles->label : '' }}">
    </div>
    
    <br>

    <button class="btn btn-success">
        Enviar
    </button>


    <a class="btn btn-success" href="{{ url('admin/roles') }}">Voltar</a>  

