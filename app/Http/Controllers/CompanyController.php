<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CompanyInfoRequest;

class CompanyController extends Controller
{
    protected $page;

    public function __construct(){
        $this->page = Page::where('name', 'empresa')->first();
    }

    public function content()
    {
        $section1 = Content::where('section_id', 6)->first();
        $section2 = Content::where('section_id', 9)->first();
        return view('administrator.company.content', compact('section1', 'section2'));
    }
    
    public function storeSlider(Request $request)
    {
        $data = $request->all();

        if($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/company','public');
        

        Content::create($data);
        return back()->with('mensaje', 'Creado con exito');
    }

    public function updateSlider(Request $request)
    {
        $data       = $request->all();
        $element    = Content::find($request->input('id'));

        if($request->hasFile('image')){

            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/company','public');
        } 

        $element->update($data);

        return back()->with('mensaje', 'Actualizado con exito');
    }

    public function updateInfo(CompanyInfoRequest $request)
    {
        $element= Content::find($request->input('id'));
        $data   = $request->all();

        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/company','public');
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
        return DataTables::of(Content::where('section_id', 7)->orderBy('content_1', 'ASC'))
        ->editColumn('image', function($slider){
            return '<img src="'.asset($slider->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'content_1', 'image', 'content_2'])
        ->make(true);
    }

    public function getList2()
    {
        return DataTables::of(Content::where('section_id', 8)->orderBy('order', 'ASC'))
        ->editColumn('image', function($content){
            return '<img src="'.asset($content->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('actions', function($content) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-2" onclick="findContent2('.$content->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$content->id.')" title="Eliminar content"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'content_1', 'image', 'content_2'])
        ->make(true);
    }
}
