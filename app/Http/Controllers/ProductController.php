<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Page;
use App\Brand;
use App\Image;
use App\Content;
use App\Product;
use App\Category;
use App\SubCategory;
use App\ProductAttribute;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    public function content()
    {
        return view('administrator.products.content');
    }

    public function create()
    {
        $categories     = Category::orderBy('name', 'ASC')->get();
        $brands         = Brand::orderBy('name', 'ASC')->get();
        $tags           = Tag::orderBy('name', 'ASC')->get();
        
        return view('administrator.products.create', compact('categories', 'brands', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|unique:products',
            'category_id'       => 'required',
            'sub_category_id'   => 'required',
            'brand_id'          => 'required',
        ],[
            'name.required'         => 'Nombre del producto es requerido',
            'name.unique'           => 'Producto ya se encuentra registrado',
            'category_id.required'  => 'Debe seleccionar categoría',
            'sub_category_id.required'  => 'Debe seleccionar subcategoría',
            'brand_id.required'     => 'Debe seleccionar marca',
        ]);

        $data           = $request->all();
        $data['slug']   = Str::of($data['name'])->slug('-');
        
        if($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/products','public');
            
        $product = Product::create($data);

        if ($request->has('tags_id')) 
            if($request->input('tags_id')) $product->tags()->attach($request->input('tags_id'));
        
        return redirect()->route('product.content.edit', ['id' => $product->id])->with('message', 'Producto creada');
    }

    public function edit($id)
    {
        $product        = Product::findOrFail($id);
        $categories     = Category::orderBy('name', 'ASC')->get();
        $brands         = Brand::orderBy('name', 'ASC')->get();
        $tags           = Tag::orderBy('name', 'ASC')->get();
        return view('administrator.products.edit', compact('product', 'categories', 'brands', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'              => ['required', Rule::unique('products')->ignore($id)],
            'category_id'       => 'required',
            'sub_category_id'   => 'required',
            'brand_id'          => 'required',
        ],[
            'name.required'         => 'Nombre del producto es requerido',
            'name.unique'           => 'Producto ya se encuentra registrado',
            'category_id.required'  => 'Debe seleccionar categoría',
            'sub_category_id.required'  => 'Debe seleccionar subcategoría',
            'brand_id.required'     => 'Debe seleccionar marca',
        ]);

        $element = Product::find($id);
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/products','public');
        }   

        $element->update($data);


        $tags = $element->tags;
        if ($request->has('tags_id')) {
            if($request->input('tags_id')){
                $element->tags()->wherePivotNotIn('tag_id', $request->input('tags_id'))->detach();
    
                foreach ($request->input('tags_id') as $tag_id) {
                    if(! in_array($tag_id, $tags->pluck('id')->toArray()))
                        $element->tags()->attach($tag_id);
                }
            }else{
                $element->tags()->detach();
            }
        }else{
            $element->tags()->detach();
        }

        return redirect()->route('product.content.edit', ['id' => $element->id])->with('message', 'Actualizada');
    }

    public function destroy($id)
    {
        $element = Product::find($id);
        
        if(Storage::disk('public')->exists($element->image))
            Storage::disk('public')->delete($element->image);

        $element->delete();
        return response()->json([], 200);
    }

    public function destroyCardImage($id)
    {
        $product = Product::findOrFail($id);
        if (Storage::disk('public')->exists($product->image)) 
            Storage::disk('public')->delete($product->image);

        $product->image = null;
        $product->save();

        return response()->json([], 200);
    }

    public function getSubCategories($id)
    {
        return response()->json(Category::find($id)->subCategories()->pluck('id', 'name')->toArray(), 200);
    }

    public function imageDestroy($id)
    {
        $element = Image::find($id);
        
        if(Storage::disk('public')->exists($element->image))
            Storage::disk('public')->delete($element->image);

        $element->delete();
        return response()->json([], 200);
    }

    public function findImageProduct($id)
    {
        $image = Image::find($id);
        return response()->json(['content' => $image]);
    }

    public function imagesStore(Request $request)
    {
        $product    = Product::find($request->input('product_id'));
        $data       = $request->all();

        if($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/products/images','public');
        
        unset($data['product_id']);

        $product->images()->create($data);

        return response()->json([], 201);
        
    }

    public function imagesUpdate(Request $request)
    {
        $element = Image::find($request->input('id'));
        $data    = $request->all();

        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/products/images','public');
        }   
        
        $element->update($data);
        return response()->json([], 200);
    }

    public function getList()
    {
        $products = Product::orderBy('order', 'ASC');
        return DataTables::of($products)
        ->editColumn('image', function($product) {
            return '<img src="'.asset($product->image).'" width="150" height="50">';
        })
        ->addColumn('actions', function($product) {
            return '<a href="'. route('product.content.edit', ['id' => $product->id]) .'" class="btn btn-sm btn-primary rounded-pill far fa-edit"></a><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$product->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }

    public function imagesProduct($id)
    {
        $product = Product::find($id)->images()->where('section', 'images')->orderBy('order', 'ASC');
        return DataTables::of($product)
        ->editColumn('image', function($element) {
            return '<img src="'.asset($element->image).'" width="150" height="160">';
        })
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContentImageProduct('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroyImageProduct('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }

    public function attributeStore(Request $request)
    {
        $product    = Product::find($request->input('product_id'));
        $data       = $request->all();
        $product->attributes()->create($data);
        return response()->json([], 201);
    }

    public function findProductAttribute($id)
    {
        $productAttribute = ProductAttribute::find($id);
        return response()->json(['content' => $productAttribute]);
    }

    public function attributeUpdate(Request $request)
    {
        $productAttribute    = ProductAttribute::find($request->input('id'));
        $data               = $request->all();
        $productAttribute->update($data);
        return response()->json([], 200);
    }

    public function destroyProductAttribute($id)
    {
        ProductAttribute::find($id)->delete();
        return response()->json([], 200);
    }

    public function getList2($id)
    {
        $features = Product::find($id)->attributes()->orderBy('order', 'ASC');
        return DataTables::of($features)
        ->addColumn('actions', function($feature) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-2" onclick="findContentProductAttribute('.$feature->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy2('.$feature->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }

    public function getList3($id)
    {
        $product = Product::find($id)->images()->where('section', 'download')->orderBy('order', 'ASC');
        return DataTables::of($product)
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-3" onclick="findContent3('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy3('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }

    public function downloadStore(Request $request)
    {
        $product    = Product::find($request->input('product_id'));
        $data       = $request->all();

        if($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/products/download','public');

        $product->images()->create($data);

        return response()->json([], 201);
    }

    public function findProductdownload($id)
    {
        $image = Image::find($id);
        return response()->json(['content' => $image]);
    }

    public function downloadUpdate(Request $request)
    {
        $element = Image::find($request->input('id'));
        $data    = $request->all();

        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/products/download','public');
        }   
        
        $element->update($data);
        return response()->json([], 200);      
    }

    public function destroyProductdownload($id)
    {
        $element = Image::find($id);
        
        if(Storage::disk('public')->exists($element->image))
            Storage::disk('public')->delete($element->image);

        $element->delete();
        return response()->json([], 200);
    }

    public function getProducts(Request $request)
    {   
        if ($request->p) {
            return Product::where('name', 'like', "%{$request->get('p')}%")->orderBy('order', 'ASC')->paginate(250);
        } elseif($request->category){
            return Product::where('category_id', "{$request->get('category')}")->orderBy('order', 'ASC')->paginate(250);
        } elseif($request->tag){
            $tags = DB::table('product_tag')->where('tag_id', "{$request->get('tag')}")->pluck('product_id')->toArray();
            return Product::whereIn('id', $tags)->orderBy('order', 'ASC')->paginate(250);
        } elseif($request->brand) {
            return Product::where('brand_id', "{$request->brand}")->orderBy('order', 'ASC')->paginate(250);
        } else {
            return Product::orderBy('order', 'ASC')->paginate(250);
        }
            
    }

    public function getProductsData(Request $request)
    {   
        $result = DB::table('products');

        if ($request->category_id)
            $result->where('category_id', $request->category_id);

        if ($request->brands_id)
            $result->whereIn('brand_id', $request->brands_id);

        if ($request->subCategoryId)
            $result->where('sub_category_id', $request->subCategoryId);
        
        if ($request->tags_id) {
            $productsid = DB::table('product_tag')->whereIn('tag_id', $request->tags_id)->pluck('product_id')->toArray();
            if (count($productsid)) 
                $result->whereIn('id', $productsid);
            else
                $result->where('id', 0);
        }
        
        return $result->orderby('order', 'ASC')->paginate(250);;
    }
}
