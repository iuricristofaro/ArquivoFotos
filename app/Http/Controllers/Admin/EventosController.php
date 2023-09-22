<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Evento;

class EventosController extends Controller
{

    protected $model;

    public function __construct(Evento $eventos)
    {
        $this->model = $eventos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = $this->model->get();

        return view('admin.eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eventos.create');
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

        if($request->hasFile('image') && $request->image->isValid()){
            $imagePath = $request->image->store('eventos');

            $data['image'] = $imagePath;
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
        if (!$evento = $this->model->find($id))
            return redirect()->route('eventos.index');
        
        return view('admin.eventos.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$evento = $this->model->find($id))
        return redirect()->route('eventos.index');

        return view('admin.eventos.edit', compact('evento'));
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
        if (!$evento = $this->model->find($id))
        return redirect()->route('eventos.index');

        if($request->hasFile('image') && $request->image->isValid()){
            $imagePath = $request->image->store('eventos');

            $data['image'] = $imagePath;
        }
        
        $evento->update([
            'title' => $request->title,
            'text' => $request->text,
            'titulo' => $request->titulo,
            'texto' => $request->texto,
        ]);
        
        $evento->update($data);
  
        if($evento)
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
        if (!$evento = $this->model->find($id))
        return redirect()->route('eventos.index');

        $evento->delete();

        return redirect()->route('eventos.index');
    }
}
