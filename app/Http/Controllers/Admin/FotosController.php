<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Fotos;
use App\Models\Arquivo;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;


class FotosController extends Controller
{
    protected $model;

    protected $arquivo;

    protected $upload   = ['name' => 'image', 'path' => 'fotos'];

    protected $table = 'fotos_id';

    public function __construct(Fotos $fotos, Arquivo $arquivo)
    {
        $this->model = $fotos;
        $this->arquivo = $arquivo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = Fotos::orderBy('id','DESC')->paginate(5);

        return view('admin.fotos.index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fotos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataForm = $request->all();
        
        //dd($request->all());
        
        //Verifica se existe a imagem
        if( $this->upload && $request->hasFile($this->upload['name']) ) {
            //Pega o arquivo
            $image = $request->file($this->upload['name']);
            
            //Define o nome para o arquivo
            $nameFile = uniqid(date('YmdHis')).'.'.$image->getClientOriginalExtension();
            
            $upload = $image->storeAs($this->upload['path'], $nameFile);
            
            if( $upload ) 
                $dataForm[$this->upload['name']] = $nameFile;
            else
                return redirect()
                            ->route("categories.create")
                            ->withErrors(['errors' => 'Erro no Upload'])
                            ->withInput();
        }
        
        $insert = $this->model->create($dataForm);

        if($insert){
             return redirect()->route('galeria.index');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = Fotos::find($id);

        return view('admin.fotos.edit', compact('registro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $dataForm = $request->all();
       
        //Cria o objeto da model
        $data = $this->model->find($id);

        //Verifica se existe a imagem
        if( $this->upload && $request->hasFile($this->upload['name']) ) {
            //Pega o arquivo
            $image = $request->file($this->upload['name']);
            
            //Verifica se o nome do arquivo não existe
            if( $data->image == '' ){
                $nameImage = uniqid(date('YmdHis')).'.'.$image->getClientOriginalExtension();
                $dataForm[$this->upload['name']] = $nameImage;
            }else {
                $nameImage = $data->image;
            }
            
            $upload = $image->storeAs($this->upload['path'], $nameImage);
            
            if( $upload )
                $dataForm[$this->upload['name']] = $nameImage;
            else
                return redirect()
                            ->route("categories.edit", ['id' => $id])
                            ->withErrors(['errors' => 'Erro no Upload'])
                            ->withInput();
        }
        
        $update = $data->update($dataForm);

        if($update)
    	return redirect()->route('galeria.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function indexGaleria($id)
    {
        $imagens = $this->arquivo->orderBy('id','DESC')->paginate(6);

        $foto = $this->model->find($id);

        return view('admin.fotos.imagens',compact('imagens', 'foto'));
    }

    public function createGaleria($id)
    {

        $foto = $this->arquivo->find($id);

        return view('admin.fotos.creategaleria', compact('foto'));
          
    }

    public function storeGaleria(Request $request)
    {
        $dataForm = $request->all();
        
        
        //$dataForm->arquivo->where('fotos_id','id')->first();
        $images = $request->imagem;
        foreach ($images as $image) {
             if($path = $image->store('galeria') ){
                
                $nameFile = uniqid(date('YmdHis')).'.'.$image->getClientOriginalExtension();

                $dataForm[$this->upload['name']] = $nameFile;
            
            }
        }

       
        
        

        $insert = $this->arquivo->create($dataForm);

        if($insert){
             return redirect()->route('admin.fotos.imagens');
        }
    }

}
