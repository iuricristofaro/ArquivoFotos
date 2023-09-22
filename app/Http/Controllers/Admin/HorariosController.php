<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Horario;

class HorariosController extends Controller
{

    protected $model;

    protected $totalPage = 5;

    public function __construct(Horario $horario)
    {
        $this->model = $horario;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horarios = $this->model->paginate($this->totalPage);

        return view('admin.horarios.index', compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.horarios.create');
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
            $file-> move(public_path('horarios'), $filename);
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
        if (!$horario = $this->model->find($id))
            return redirect()->route('horario.index');
        
        return view('admin.horarios.show', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$horario = $this->model->find($id))
            return redirect()->route('horarios.index');

        return view('admin.horarios.edit', compact('horario'));
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
        if (!$horario = $this->model->find($id))
        return redirect()->route('horarios.index');

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('horarios'), $filename);
            $data['image']= $filename;
        }
        
        $horario->update([
            'title' => $request->title,
            'text' => $request->text,
            'titulo' => $request->titulo,
            'texto' => $request->texto,
        ]);
        
        $horario->update($data);

        if($horario)
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
        if (!$horario = $this->model->find($id))
            return redirect()->route('horarios.index');

        $horario->delete();

        if($horario)
        return redirect()->route('horarios.index')->with('success', 'Atualizada com Sucesso!');
    }
}
