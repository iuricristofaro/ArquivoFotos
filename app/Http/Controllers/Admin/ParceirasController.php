<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Parceira;

class ParceirasController extends Controller
{

    protected $model;

    protected $totalPage = 5;

    public function __construct(Parceira $parceira)
    {
        $this->model = $parceira;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->model->paginate($this->totalPage);

        return view('admin.parceira.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.parceira.create');
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

        if( $request->hasFile('image') ) {
            $image = $request->file('image');
            
            $nameImage = uniqid(date('YmdHis')).'.'.$image->getClientOriginalExtension();
            
            $data['image'] = $nameImage;
            
            $update = $image->storeAs('parceira', $nameImage);
            
            if( !$update )
                return redirect()->back()->with('error', 'Falha no Upload da Imagem');
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
        if (!$date = $this->model->find($id))
            return redirect()->route('admin.parceira.index');
        
        return view('admin.parceira.show', compact('date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$date = $this->model->find($id))
            return redirect()->route('edit.index');

        return view('admin.parceira.edit', compact('date'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
