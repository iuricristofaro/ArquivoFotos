<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Memoria;

class MemoriaController extends Controller
{

    protected $model;

    protected $totalPage = 5;

    public function __construct(Memoria $memoria)
    {
        $this->model = $memoria;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memorias = $this->model->paginate($this->totalPage);

        return view('admin.memoria.index', compact('memorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.memoria.create');
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
            $file-> move(public_path('memoria'), $filename);
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
        if (!$memoria = $this->model->find($id))
            return redirect()->route('memoria.index');
        
        return view('admin.memoria.show', compact('memoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$memoria = $this->model->find($id))
            return redirect()->route('memoria.index');

        return view('admin.memoria.edit', compact('memoria'));
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
        $data = $request->all();

        if (!$memoria = $this->model->find($id))
        return redirect()->route('memoria.index');

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('memoria'), $filename);
            $data['image']= $filename;
        }
        
        $memoria->update([
            'title' => $request->title,
            'date' => $request->date,
            'texto' => $request->texto,
            'link' => $request->link,
        ]);
        
        $memoria->update($data);

        if($memoria)
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
        if (!$memoria = $this->model->find($id))
            return redirect()->route('memoria.index');

        $memoria->delete();

        if($memoria)
    	return redirect()->route('memoria.index')->with('success', 'Atualizada com Sucesso!');
    }
}
