<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Infra;
use Illuminate\Pagination\Paginator;

class InfraController extends Controller
{

    protected $model;

    protected $totalPage = 5;

    public function __construct(Infra $infra)
    {
        $this->model = $infra;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->model->paginate($this->totalPage);

        return view('admin.infra.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.infra.create');
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
            
            $update = $image->storeAs('infra', $nameImage);
            
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
        if (!$infra = $this->model->find($id))
            return redirect()->route('infra.index');
        
        return view('admin.infra.show', compact('infra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$infra = $this->model->find($id))
            return redirect()->route('infra.index');

        return view('admin.infra.edit', compact('infra'));
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
        if (!$infra = $this->model->find($id))
        return redirect()->route('infra.index');

        if( $request->hasFile('image') ) {
            $image = $request->file('image');
            
            if( $infra->image != null )
                $nameImage = $infra->image;
            else
                $nameImage = uniqid(date('YmdHis')).'.'.$image->getClientOriginalExtension();
            
            $data['image'] = $nameImage;
            
            $upload = $image->storeAs('infra', $nameImage);
            
            if( !$upload )
                return redirect()->back()->with(['errors' => 'Falha no Upload!']);
        }
        
        $infra->update([
            'title' => $request->title,
            'text' => $request->text,
        ]);
        
       $infra->update($data);

        if($infra)
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
        if (!$infra = $this->model->find($id))
            return redirect()->route('infra.index');

        $infra->delete();

        if($infra)
        return redirect()->route('infra.index')->with('success', 'Atualizada com Sucesso!');
    }
}
