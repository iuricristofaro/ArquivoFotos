<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cultural;

class CulturalController extends Controller
{

    protected $model;

    protected $totalPage = 5;

    public function __construct(Cultural $cultural)
    {
        $this->model = $cultural;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $culturais = $this->model->paginate($this->totalPage);

        return view('admin.cultural.index', compact('culturais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cultural.create');
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
            $file-> move(public_path('cultural'), $filename);
            $data['image']= $filename;
        }
        
        $data = $this->model->create([
            'title' => $request->title,
            'text' => $request->text,
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
        if (!$cultural = $this->model->find($id))
            return redirect()->route('cultural.index');
        
        return view('admin.cultural.show', compact('cultural'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$cultural = $this->model->find($id))
            return redirect()->route('cultural.index');

        return view('admin.cultural.edit', compact('cultural'));
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
        if (!$cultural = $this->model->find($id))
        return redirect()->route('cultural.index');

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('cultural'), $filename);
            $data['image']= $filename;
        }
        
        $cultural->update([
            'title' => $request->title,
            'text' => $request->text,
            'description' => $request->description,
            'url' => $request->url,
        ]);
        
        $cultural->update($data);

        if($cultural)
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
        if (!$cultural = $this->model->find($id))
            return redirect()->route('cultural.index');

        $cultural->delete();

        if($cultural)
        return redirect()->route('cultural.index')->with('success', 'Atualizada com Sucesso!');
    }
}
