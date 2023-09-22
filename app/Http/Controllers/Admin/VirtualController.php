<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Virtual;

class VirtualController extends Controller
{

    protected $model;

    protected $totalPage = 5;

    public function __construct(Virtual $virtual)
    {
        $this->model = $virtual;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $virtuals = $this->model->paginate($this->totalPage);

        return view('admin.virtual.index', compact('virtuals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.virtual.create');
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
            $file-> move(public_path('virtual'), $filename);
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
        if (!$virtual = $this->model->find($id))
            return redirect()->route('virtual.index');
        
        return view('admin.virtual.show', compact('virtual'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$virtual = $this->model->find($id))
            return redirect()->route('virtual.index');

        return view('admin.virtual.edit', compact('virtual'));
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
        if (!$virtual = $this->model->find($id))
        return redirect()->route('virtual.index');

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('virtual'), $filename);
            $data['image']= $filename;
        }
        
        $virtual->update([
            'title' => $request->title,
            'text' => $request->text,
            'titulo' => $request->titulo,
            'texto' => $request->texto,
        ]);
        
        $virtual->update($data);

        if($virtual)
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
        if (!$virtual = $this->model->find($id))
            return redirect()->route('virtual.index');

        $virtual->delete();

        if($virtual)
        return redirect()->route('virtual.index')->with('success', 'Atualizada com Sucesso!');
    }
}
