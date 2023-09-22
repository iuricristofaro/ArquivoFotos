<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inf;

class InfController extends Controller
{

    protected $inf;

    protected $totalPage = 5;

    public function __construct(Inf $inf)
    {
        $this->model = $inf;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->model->paginate($this->totalPage);

        return view('admin.infra.inf.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.infra.inf.create');
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

        $data = $this->model->create([
            'titulo' => $request->titulo,
            'texto' => $request->texto,
            'description' => $request->description,
            'url' => $request->url,
        ]);

        if($data)
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
        if (!$inf = $this->model->find($id))
        return redirect()->route('inf.index');
    
    return view('admin.infra.inf.show', compact('inf'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inf = $this->model->find($id);

        return view('admin.infra.inf.edit', compact('inf'));
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
        if (!$date = $this->model->find($id))
        return redirect()->route('inf.edit');


        
        $date->update([
            'titulo' => $request->titulo,
            'texto' => $request->texto,
            'description' => $request->description,
            'url' => $request->url,
        ]);
        
       $date->update();

        if($date)
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
        if (!$inf = $this->model->find($id))
            return redirect()->route('inf.index');

        $inf->delete();

        if($inf)
        return redirect()->route('inf.index')->with('success', 'Atualizada com Sucesso!');
    }
}
