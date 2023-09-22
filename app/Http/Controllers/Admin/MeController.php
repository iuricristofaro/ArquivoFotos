<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Me;

class MeController extends Controller
{

    protected $model;

    protected $totalPage = 5;

    public function __construct(Me $me)
    {
        $this->model = $me;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->model->paginate($this->totalPage);

        return view('admin.memoria.memorias.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.memoria.memorias.create');
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
            return redirect()->route('memoria.index');
        
        return view('admin.memoria.memorias.show', compact('data'));
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
            return redirect()->route('me.index');

        return view('admin.memoria.memorias.edit', compact('data'));
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

        if (!$me = $this->model->find($id))
        return redirect()->route('me.index');

        $me->update([
            'titulo' => $request->titulo,
            'description' => $request->description,
        ]);
        
        $me->update($data);

        if($me)
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
        if (!$me = $this->model->find($id))
        return redirect()->route('me.index');

        $me->delete();

        return redirect()->route('me.index')->with('success', 'Atualizada com Sucesso!');
    }
}
