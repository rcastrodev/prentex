<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\HomeRequest;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    protected $page;

    public function __construct(){
        
        $this->page = Page::where('name', 'home')->first();
    }

    /**
     * @author Raul castro
     */

    public function index()
    {
        return view('home');
    }
    /**
     * Fin Slider
     */

    public function content()
    {
        $section3 = Content::where('section_id', 3)->first();
        $section4 = Content::where('section_id', 4)->first();
        return view('administrator.home.content', compact('section3', 'section4'));
    }

    /**
     * @param array $request
     * @author Raul castro
     */

    public function store(HomeRequest $request)
    {
        $data = $request->all();

        if($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/home', 'public');

        $content = Content::create($data);

        return response()->json([], 201);
    }

    public function storeSync(HomeRequest $request)
    {
        $data = $request->all();

        if($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/home', 'public');

        $content = Content::create($data);

        return back()->with('mensaje', 'Creado con exito');
    }

    public function update(HomeRequest $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/home','public');
        }  
    
        $element->update($data);
        return response()->json([], 200);
    }

    public function updateSection(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/home','public');
        }  

        if($request->hasFile('image2')){
            if(Storage::disk('public')->exists($element->image2))
                Storage::disk('public')->delete($element->image2);
            
            $data['image2'] = $request->file('image2')->store('images/home','public');
        }  
    
        $element->update($data);
        return back()->with('mensaje', 'Actualizado con exito');
    }

    public function destroy($id)
    {
        $element = Content::find($id);

        if(Storage::disk('public')->exists($element->image))
            Storage::disk('public')->delete($element->image);
        
        $element->delete();
            
        return response()->json([], 200);
    }



    
    /**
     * @author Raul castro
     * @return datatable
     */

    public function sliderGetList()
    {
        $sectionSlider = $this->page
            ->sections()
            ->where('name', 'section_1')
            ->first();

        $sliders = $sectionSlider->contents()
            ->orderBy('order', 'ASC');

        return DataTables::of($sliders)
        ->editColumn('image', function($slider){
            return '<img src="'.asset($slider->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->editColumn('content_1', function($slider){
            return $slider->content_1;
        })
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image', 'content_1'])
        ->make(true);
    }

    public function getList2()
    {
        return DataTables::of(Content::where('section_id', 2)->orderBy('order', 'ASC'))
        ->editColumn('image', function($slider){
            return '<img src="'.asset($slider->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->editColumn('content_1', function($slider){
            return $slider->content_1;
        })
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-2" onclick="findContent2('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image', 'content_1'])
        ->make(true);        
    }

    public function getList3()
    {
        return DataTables::of(Content::where('section_id', 5)->orderBy('order', 'ASC'))
        ->editColumn('image', function($slider){
            return '<img src="'.asset($slider->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->editColumn('content_1', function($slider){
            return $slider->content_1;
        })
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-3" onclick="findContent3('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image', 'content_1', 'content_2'])
        ->make(true);        
    }
}



