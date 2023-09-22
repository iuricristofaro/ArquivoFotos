<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Futebol;

class FutebolController extends Controller
{

    protected $model;

    protected $totalPage = 5;

    public function __construct(Futebol $futebol)
    {
        $this->model = $futebol;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $futeboes = $this->model->paginate($this->totalPage);

        return view('admin.futebol.index', compact('futeboes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.futebol.create');
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
            $file-> move(public_path('futebol'), $filename);
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
        if (!$futebol = $this->model->find($id))
            return redirect()->route('futebol.index');
        
        return view('admin.futebol.show', compact('futebol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$futebol = $this->model->find($id))
            return redirect()->route('futebol.index');

        return view('admin.futebol.edit', compact('futebol'));
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
        if (!$futebol = $this->model->find($id))
        return redirect()->route('futebol.index');

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('futebol'), $filename);
            $data['image']= $filename;
        }
        
        $futebol->update([
            'title' => $request->title,
            'text' => $request->text,
            'titulo' => $request->titulo,
            'texto' => $request->texto,
        ]);
        
        $futebol->update($data);

        if($futebol)
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
        if (!$futebol = $this->model->find($id))
            return redirect()->route('futebol.index');

        $futebol->delete();

        if($futebol)
        return redirect()->route('futebol.index')->with('success', 'Atualizada com Sucesso!');
    }
}
