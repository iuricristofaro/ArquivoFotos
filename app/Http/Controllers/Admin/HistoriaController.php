<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Historia;

class HistoriaController extends Controller
{

    protected $model;

    protected $totalPage = 5;

    public function __construct(Historia $historia)
    {
        $this->model = $historia;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historias = $this->model->paginate($this->totalPage);

        return view('admin.historia.index', compact('historias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.historia.create');
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
            $file-> move(public_path('historia'), $filename);
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
        if (!$historia = $this->model->find($id))
            return redirect()->route('memoria.index');
        
        return view('admin.historia.show', compact('historia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$historia = $this->model->find($id))
            return redirect()->route('historia.index');

        return view('admin.historia.edit', compact('historia'));
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
        if (!$historia = $this->model->find($id))
        return redirect()->route('historia.index');

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('historia'), $filename);
            $data['image']= $filename;
        }
        
        $historia->update([
            'fb' => $request->fb,
            'instagram' => $request->instagram,
            'name' => $request->name,
            'carga' => $request->carga,
        ]);
        
        $historia->update($data);

        if($historia)
    	return redirect()->route('historia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$historia = $this->model->find($id))
            return redirect()->route('historia.index');

        $historia->delete();

        if($historia)
        return redirect()->route('historia.index')->with('success', 'Atualizada com Sucesso!');
    }
}
