<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slide;


class AdminSildeController extends Controller
{

    protected $model;

    protected $totalPage = 5;

    protected $upload   = ['name' => 'image', 'path' => 'slide'];

    public function __construct(Slide $slide)
    {
        $this->model = $slide;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->model->paginate($this->totalPage);

        return view('admin.home.slide.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.home.slide.create');
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
                            ->route("slide.create")
                            ->withErrors(['errors' => 'Erro no Upload'])
                            ->withInput();
        }
        
        $insert = $this->model->create($dataForm);

        if($insert){
            return redirect()->back()->with('success', 'Atualizada com Sucesso!');
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
        if (!$slide = $this->model->find($id))
            return redirect()->route('slide.index');
        
        return view('admin.home.slide.show', compact('slide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$slide = $this->model->find($id))
            return redirect()->route('slide.index');

        return view('admin.home.slide.edit', compact('slide'));
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
}
