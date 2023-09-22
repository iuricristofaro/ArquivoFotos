<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Basquete;

class BasqueteController extends Controller
{

    protected $model;

    protected $totalPage = 5;

    public function __construct(Basquete $basquete)
    {
        $this->model = $basquete;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $basquetes = $this->model->paginate($this->totalPage);

        return view('admin.basquete.index', compact('basquetes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.basquete.create');
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
            $file-> move(public_path('basquete'), $filename);
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
        if (!$basquete = $this->model->find($id))
            return redirect()->route('basquete.index');
        
        return view('admin.basquete.show', compact('basquete'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$basquete = $this->model->find($id))
            return redirect()->route('basquete.index');

        return view('admin.basquete.edit', compact('basquete'));
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
        if (!$basquete = $this->model->find($id))
        return redirect()->route('basquete.index');

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('basquete'), $filename);
            $data['image']= $filename;
        }
        
        $basquete->update([
            'title' => $request->title,
            'text' => $request->text,
            'titulo' => $request->titulo,
            'texto' => $request->texto,
        ]);
        
        $basquete->update($data);

        if($basquete)
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
        if (!$basquete = $this->model->find($id))
        return redirect()->route('basquete.index');

        $basquete->delete();

        if($basquete)
        return redirect()->route('basq.index')->with('success', 'Atualizada com Sucesso!');
    }
}
