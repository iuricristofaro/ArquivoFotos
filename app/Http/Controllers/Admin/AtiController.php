<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ati;

class AtiController extends Controller
{

    protected $model;

    protected $totalPage = 5;


    public function __construct(Ati $ati)
    {
        $this->model = $ati;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->model->paginate($this->totalPage);

        return view('admin.atividades.ati.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.atividades.ati.create');
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
        if (!$data = $this->model->find($id))
            return redirect()->route('ati.index');
        
        return view('admin.atividades.ati.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$data = $this->model->find($id))
            return redirect()->route('admin.atividades.ati.index');

        return view('admin.atividades.ati.edit', compact('data'));
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
        if (!$data = $this->model->find($id))
        return redirect()->route('admin.atividades.ati.index');
        
        $data->update([
            'title' => $request->title,
            'text' => $request->text,
            'url' => $request->url,
            'description' => $request->description,
        ]);
        
        $data->update();

        if($data)
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
        if (!$data = $this->model->find($id))
            return redirect()->route('ati.index');

        $data->delete();

        if($data)
        return redirect()->route('ati.index')->with('success', 'Atualizada com Sucesso!');
    }
}
