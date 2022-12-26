<?php

namespace App\Http\Controllers;

use SEO;
use App\Car;
use App\Tag;
use App\Data;
use App\Page;
use App\Brand;
use App\Client;
use App\Content;
use App\Product;
use App\Service;
use App\Category;
use App\Document;
use App\Industry;
use App\Certificate;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PagesController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Data::first();
    }

    public function home()
    {
        $page = Page::where('name', 'home')->first();
        SEO::setTitle('home');
        SEO::setDescription(strip_tags($this->data->description)); 
        $sections   = $page->sections;
        $sliders    = Content::where('section_id', 1)->orderBy('order', 'ASC')->get();
        $section2s  = Content::where('section_id', 2)->orderBy('order', 'ASC')->get();
        $section3   = Content::where('section_id', 3)->first();
        $categories = Category::where('outstanding', '1')->orderBy('order', 'ASC')->get();
        $tags       = Tag::where('outstanding', '1')->orderBy('order', 'ASC')->get();
        $brands     = Brand::where('outstanding', '1')->orderBy('order', 'ASC')->get();
        $section4   = Content::where('section_id', 4)->first();
        $section5s  = Content::where('section_id', 5)->orderBy('order', 'ASC')->get();
        return view('paginas.index', compact('sliders', 'section2s', 'section3', 'categories', 'tags', 'brands', 'section4', 'section5s'));
    }

    public function empresa()
    {
        SEO::setTitle('empresa');
        SEO::setDescription(strip_tags($this->data->description));
        $section1  = Content::where('section_id', 6)->first();
        $sections2s = Content::where('section_id', 7)->orderBy('content_1', 'ASC')->get();
        $sections3s = Content::where('section_id', 8)->orderBy('order', 'ASC')->get();
        $sections4 = Content::where('section_id', 9)->first();
        return view('paginas.empresa', compact('section1', 'sections2s', 'sections3s', 'sections4'));
    }

    public function productos()
    {
        SEO::setTitle('produtos');
        SEO::setDescription(strip_tags($this->data->description)); 

        $products   = Product::orderBy('order', 'ASC')->get();
        $section2s  = Content::where('section_id', 2)->orderBy('order', 'ASC')->get();
        $categories = Category::orderBy('order', 'ASC')->get();
        $brands     = Brand::orderBy('order', 'ASC')->get();
        $tags       = Tag::orderBy('order', 'ASC')->get();
        $products   = Product::orderBy('order', 'ASC')->take(100)->paginate(60);
        return view('paginas.productos', compact('products', 'section2s', 'categories', 'brands', 'tags'));
    }

    public function producto($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if (! $product) abort('404');
        SEO::setTitle($product->name);
        SEO::setDescription(strip_tags($product->description)); 
        return view('paginas.producto', compact('product'));
    }

    public function categoria($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if (! $category) abort('404');
        $products   = $category->products()->orderBy('order', 'ASC')->paginate(60);
        $section2s  = Content::where('section_id', 2)->orderBy('order', 'ASC')->get();
        $categories = Category::orderBy('order', 'ASC')->get();
        $brands     = Brand::orderBy('order', 'ASC')->get();
        $tags       = Tag::orderBy('order', 'ASC')->get();
        SEO::setTitle($category->name);
        SEO::setDescription(strip_tags($category->description)); 
        return view('paginas.categoria', compact('category', 'products', 'section2s','categories', 'brands','tags'));
    }

    public function subCategoria($id)
    {
        $subCategoria = SubCategory::findOrFail($id);
        SEO::setTitle($subCategoria->name);
        return view('paginas.subcategoria', compact('subCategoria'));
    }

    public function marcas()
    {
        SEO::setTitle('marcas');
        SEO::setDescription(strip_tags($this->data->description)); 
        $brands = Brand::orderBy('order', 'ASC')->get();
        return view('paginas.marcas', compact('brands'));
    }


    public function calidad()
    {
        $section1 = Content::where('section_id', 10)->first();
        $section2s = Content::where('section_id', 11)->orderBy('order', 'ASC')->get();
        SEO::setDescription(strip_tags($this->data->description)); 
        return view('paginas.calidad', compact('section1', 'section2s'));    
    }

    public function novedades()
    {
        SEO::setTitle('novedades');
        SEO::setDescription(strip_tags($this->data->description)); 
        $news = Content::where('section_id', 12)->orderBy('order', 'ASC')->get();
        return view('paginas.novedades', compact('news'));
    }

    public function novedad($id)
    {
        $new = Content::findOrFail($id);
        SEO::setTitle($new->content_1);
        SEO::setDescription(strip_tags($new->content_3)); 
        return view('paginas.novedad', compact('new'));
    }

    public function contacto()
    {
        $content = Content::where('section_id', 9)->where('content_1', 'Contacto')->first();
        $page = Page::where('name', 'contacto')->first();
        SEO::setTitle("contacto");
        return view('paginas.contacto', compact('content'));
    }

    public function descargas()
    {
        SEO::setTitle('descargas');
        SEO::setDescription(strip_tags($this->data->description)); 
        $elements = Content::where('section_id', 9)->orderBy('order', 'ASC')->get();
        return view('paginas.descargas', compact('elements'));
    }
}
