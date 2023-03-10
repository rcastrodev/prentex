<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class QualityController extends Controller
{
    protected $page;

    public function __construct(){
        $this->page = Page::where('name', 'calidad')->first();
    }

    public function content()
    {
        $section1 = Content::where('section_id', 10)->first();
        return view('administrator.quality.content', compact('section1'));
    }
    
    public function storeSlider(Request $request)
    {
        $data = $request->all();

        if($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/quality','public');
        

        Content::create($data);
        return response()->json([], 200);
    }

    public function updateSlider(Request $request)
    {
        $data       = $request->all();
        $element    = Content::find($request->input('id'));

        if($request->hasFile('image')){

            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/quality','public');
        } 

        $element->update($data);

        return response()->json([], 200);
    }

    public function updateInfo(Request $request)
    {
        $element= Content::find($request->input('id'));
        $data   = $request->all();

        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/quality','public');
        } 

        $element->update($data);
        return back()->with('mensaje', 'Actualizado con exito');
    }


    public function destroySlider($id)
    {
        $element = Content::find($id);
        if(Storage::disk('public')->exists($element->image))
            Storage::disk('public')->delete($element->image);
        
        $element->delete();
        return response()->json([], 200);
    }

    public function sliderGetList()
    {
        return DataTables::of(Content::where('section_id', 11)->orderBy('order', 'ASC'))
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'content_1'])
        ->make(true);
    }
}
