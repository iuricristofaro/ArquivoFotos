<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lazer;

class LazerController extends Controller
{

    protected $model;

    protected $totalPage = 5;

    public function __construct(Lazer $lazer)
    {
        $this->model = $lazer;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lazers = $this->model->paginate($this->totalPage);

        return view('admin.lazer.index', compact('lazers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lazer.create');
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
            $file-> move(public_path('lazer'), $filename);
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
        if (!$lazer = $this->model->find($id))
            return redirect()->route('lazer.index');
        
        return view('admin.lazer.show', compact('lazer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$lazer = $this->model->find($id))
            return redirect()->route('lazer.index');

        return view('admin.lazer.edit', compact('lazer'));
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
        if (!$lazer = $this->model->find($id))
        return redirect()->route('lazer.index');

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('lazer'), $filename);
            $data['image']= $filename;
        }
        
        $lazer->update([
            'title' => $request->title,
            'text' => $request->text,
            'image' => $request->image,
        ]);
        
        $lazer->update($data);

        if($lazer)
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
        if (!$lazer = $this->model->find($id))
            return redirect()->route('lazer.index');

        $lazer->delete();

        if($lazer)
        return redirect()->route('lazer.index')->with('success', 'Atualizada com Sucesso!');
    }
}
