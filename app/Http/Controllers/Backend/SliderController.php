<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;

class SliderController extends Controller

{
    //envio de imagem SSistema - metodo contruido em Traits
    use UploadImageTrait;


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/slider/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/slider/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request->all());
       $request->validate([
        'banner'            =>['required','image','max:2048'],
        'title_one'         =>['string','max:200'],
        'title_two'         =>['required','string','max:200'],
        'starting_prince'   =>['max:200'],
        'link'              =>['url'],
        'serial'            =>['required','integer'],
        'status'            =>['required'],
       ]);

//chmar model
        $slider = new Slider();

       $imagePath = $this->uploadImage($request, 'banner', 'uploads'); //função p salvar e identificar imagem - em Traits

        $slider->banner = $imagePath;
        $slider->title_one = $request->title_one;
        $slider->title_two = $request->title_two;
        $slider->starting_prince = $request->starting_prince;
        $slider->link = $request->link;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
        $slider->save();

        toastr()->success('Cadastrado com sucesso!');

    //redirecionando
       return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
