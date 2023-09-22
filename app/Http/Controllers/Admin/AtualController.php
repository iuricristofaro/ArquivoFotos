<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Atual;

class AtualController extends Controller
{

    protected $model;

    protected $totalPage = 5;

    public function __construct(Atual $atual)
    {
        $this->model = $atual;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atuais = $this->model->paginate($this->totalPage);

        return view('admin.atual.index', compact('atuais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.atual.create');
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
            $file-> move(public_path('atual'), $filename);
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
        if (!$atual = $this->model->find($id))
            return redirect()->route('atual.index');
        
        return view('admin.atual.show', compact('atual'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$atual = $this->model->find($id))
            return redirect()->route('atual.index');

        return view('admin.atual.edit', compact('atual'));
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
        
        if (!$atual = $this->model->find($id))
        return redirect()->route('atual.index');

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('atual'), $filename);
            $data['image']= $filename;
        }
        
        $atual->update([
            'title' => $request->title,
            'date' => $request->date,
            'texto' => $request->texto,
            'link' => $request->link,
        ]);
        
        $atual->update($data);

        if($atual)
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
        if (!$atual = $this->model->find($id))
        return redirect()->route('atual.index');

        $atual->delete();

        if($atual)
        return redirect()->route('atual.index')->with('success', 'Atualizada com Sucesso!');
    }
}
