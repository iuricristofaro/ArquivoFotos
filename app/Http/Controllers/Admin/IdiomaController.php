<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Idioma;

class IdiomaController extends Controller
{

    protected $model;

    public function __construct(Idioma $idioma)
    {
        $this->model = $idioma;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idiomas = $this->model->get();

        return view('admin.idioma.index', compact('idiomas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.idioma.create');
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
            $file-> move(public_path('idioma'), $filename);
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
        if (!$idioma = $this->model->find($id))
            return redirect()->route('idioma.index');
        
        return view('admin.idioma.show', compact('idioma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$idioma = $this->model->find($id))
            return redirect()->route('idioma.index');

        return view('admin.idioma.edit', compact('idioma'));
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
        if (!$idioma = $this->model->find($id))
        return redirect()->route('idioma.index');

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('idioma'), $filename);
            $data['image']= $filename;
        }
        
        $idioma->update([
            'title' => $request->title,
            'text' => $request->text,
            'titulo' => $request->titulo,
            'texto' => $request->texto,
        ]);
        
        $idioma->update($data);

        if($idioma)
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
        if (!$idioma = $this->model->find($id))
            return redirect()->route('idioma.index');

        $idioma->delete();

        return redirect()->route('idioma.index');
    }
}
