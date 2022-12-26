<?php

namespace App\Http\Controllers;

use App\Page;
use App\Image;
use App\Content;
use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class TagController extends Controller
{
    protected $page;

    public function content()
    {
        return view('administrator.tag.content');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['name'], '-');
        
        if($request->hasFile('image'))    
            $data['image'] = $request->file('image')->store('images/tags','public');
        
        $data['outstanding'] = $request->has('outstanding') ? '1' : '0';
        $content = Tag::create($data);
        
        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $element = Tag::find($request->input('id'));
        $data = $request->all();
        $data['slug'] = Str::slug($data['name'], '-');
        
        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/tags','public');
        }  
        
        $data['outstanding'] = $request->has('outstanding') ? '1' : '0';

        $element->update($data);
        return response()->json([], 200);
    }

    public function destroy($id)
    {
        $element = Tag::find($id);

        if(Storage::disk('public')->exists($element->image))
            Storage::disk('public')->delete($element->image);
        
        $element->delete();
            
        return response()->json([], 200);
    }

    public function find($id)
    {
        $content = Tag::find($id);
        return response()->json(['content' => $content]);
    }
    
    /**
     * @author Raul castro
     * @return datatable
     */

    public function sliderGetList()
    {
        return DataTables::of(Tag::orderBy('order', 'ASC'))
        ->editColumn('image', function($slider){
            return '<img src="'.asset($slider->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent2('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }

    public function getTags()
    {
        return Tag::orderBy('order', 'ASC')->get();
    }
}
