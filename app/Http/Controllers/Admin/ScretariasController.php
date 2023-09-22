<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Scretaria;

class ScretariasController extends Controller
{

    protected $model;

    protected $totalPage = 5;


    public function __construct(Scretaria $scretaria)
    {
        $this->model = $scretaria;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scretarias = $this->model->paginate($this->totalPage);

        return view('admin.scretaria.index', compact('scretarias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.scretaria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('scretaria'), $filename);
            $data['image']= $filename;
        }
        
        $store = $this->model->create($data);

        if($store)
        return redirect()->back()->with('success', 'Atualizada com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$scretaria = $this->model->find($id))
            return redirect()->route('scretaria.index');
        
        return view('admin.scretaria.show', compact('scretaria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$scretaria = $this->model->find($id))
            return redirect()->route('scretaria.index');

        return view('admin.scretaria.edit', compact('scretaria'));
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
        if (!$scretaria = $this->model->find($id))
        return redirect()->route('scretaria.index');

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('scretaria'), $filename);
            $data['image']= $filename;
        }
        
        $scretaria->update([
            'title' => $request->title,
            'text' => $request->text,
            'titulo' => $request->titulo,
            'texto' => $request->texto,
        ]);
        
        $scretaria->update($data);

        if($scretaria)
    	return redirect()->back()->with('success', 'Atualizada com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$scretaria = $this->model->find($id))
        return redirect()->route('scretaria.index');

        $scretaria->delete();

        if($scretaria)
        return redirect()->route('scretaria.index')->with('success', 'Atualizada com Sucesso!');
    }
}
