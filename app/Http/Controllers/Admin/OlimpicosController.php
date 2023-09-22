<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Olimpicos;

class OlimpicosController extends Controller
{

    protected $model;

    protected $totalPage = 5;

    public function __construct(Olimpicos $olimpico)
    {
        $this->model = $olimpico;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $olimpicos = $this->model->paginate($this->totalPage);

        return view('admin.olimpicos.index', compact('olimpicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.olimpicos.create');
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
            $file-> move(public_path('olimpicos'), $filename);
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
        if (!$olimpico = $this->model->find($id))
        return redirect()->route('olimpico.index');
    
    return view('admin.olimpicos.show', compact('olimpico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$olimpico = $this->model->find($id))
            return redirect()->route('olimpico.index');

        return view('admin.olimpicos.edit', compact('olimpico'));
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
        if (!$olimpico = $this->model->find($id))
        return redirect()->route('olimpico.index');

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('olimpicos'), $filename);
            $data['image']= $filename;
        }
        
        $olimpico->update([
            'title' => $request->title,
            'text' => $request->text,
            'description' => $request->description,
            'url' => $request->url,
        ]);
        
        $olimpico->update($data);

        if($olimpico)
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
        if (!$olimpico = $this->model->find($id))
            return redirect()->route('olimpicos.index');

        $olimpico->delete();

        if($olimpico)
        return redirect()->route('olimpicos.index')->with('success', 'Atualizada com Sucesso!');
    }
}
