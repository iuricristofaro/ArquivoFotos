<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Videos;

class VideosController extends Controller
{

    protected $model;

    protected $totalPage = 5;

    public function __construct(Videos $video)
    {
        $this->model = $video;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = $this->model->paginate($this->totalPage);

        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videos.create');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$video = $this->model->find($id))
            return redirect()->route('videos.index');

        return view('admin.videos.edit', compact('video'));
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
        if (!$video = $this->model->find($id))
        return redirect()->route('videos.index');

        
        $video->update([
            'text' => $request->text,
            'link' => $request->link,
        ]);
        
        $video->update();

        if($video)
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
        if (!$video = $this->model->find($id))
            return redirect()->route('videos.index');

        $video->delete();

        if($video)
        return redirect()->route('videos.index')->with('success', 'Atualizada com Sucesso!');
    }
}
