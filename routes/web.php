<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/', 'PagesController@home')->name('index');
Route::get('/empresa', 'PagesController@empresa')->name('empresa');
Route::get('/productos', 'PagesController@productos')->name('productos');
Route::get('/producto/{slug}', 'PagesController@producto')->name('producto');
Route::get('/categorias', 'PagesController@categorias')->name('categorias');
Route::get('/categoria/{slug}', 'PagesController@categoria')->name('categoria');
Route::get('/sub-categoria/{slug}', 'PagesController@subCategoria')->name('subCategoria');
Route::get('/marcas', 'PagesController@marcas')->name('marcas');
Route::get('/marca/{slug}', 'PagesController@marca')->name('marca');
Route::get('/riesgos', 'PagesController@riesgos')->name('riesgos');
Route::get('/riesgo/{slug}', 'PagesController@riesgo')->name('riesgo');
Route::get('/calidad', 'PagesController@calidad')->name('calidad');
Route::get('/novedades', 'PagesController@novedades')->name('novedades');
Route::get('/novedad/{id}', 'PagesController@novedad')->name('novedad');
Route::get('/contacto', 'PagesController@contacto')->name('contacto');
Route::post('enviar-contacto', 'MailController@contact')->name('send-contact');
Route::get('/descargar-archivo/{id}/{reg}', 'ContentController@descargarArchivo')->name('descargar-archivo');
Route::get('/descargar-certificado/{id}', 'CertificateController@descargarCertificado')->name('descargar-certificado');


Route::get('/productos/get-products', 'ProductController@getProducts');
Route::post('/productos/get-products-data', 'ProductController@getProductsData');

Route::get('/categorias/get-categories', 'CategoryController@getCategories')->name('get-categories');
Route::get('/categorias/get-subcategories/{id}', 'CategoryController@subCategories')->name('get.subcategories');
Route::get('/marcas/get-brands', 'BrandController@getBrands')->name('get-brands');
Route::post('/marcas/get-brands', 'BrandController@getBrandsFilter');
Route::get('/riesgos/get-tags', 'TagController@getTags')->name('get-brands');

Route::middleware('auth')->prefix('admin')->group(function () {
    /** Page Home */
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('home/content', 'HomeController@content')->name('home.content');
    Route::post('home/content/generic-section/store', 'HomeController@store')->name('home.content.store');
    Route::post('home/content/store', 'HomeController@storeSync')->name('home.store-sync');
    Route::post('home/content/generic-section/update', 'HomeController@update')->name('home.content.update');
    Route::post('home/content/update', 'HomeController@updateSection')->name('home.content.update-section');
    Route::delete('home/content/{id}', 'HomeController@destroy')->name('home.content.destroy');
    Route::get('home/content/slider/get-list', 'HomeController@sliderGetList')->name('home.slider.get-list');
    Route::get('home/content/get-list2', 'HomeController@getList2')->name('home.get-list2');
    Route::get('home/content/get-list3', 'HomeController@getList3')->name('home.get-list3');
    /** Fin home*/

    /** Page Company */
    Route::get('company/content', 'CompanyController@content')->name('company.content');
    Route::post('company/content/store-slider', 'CompanyController@storeSlider')->name('company.content.storeSlider');
    Route::post('company/content/update-slider', 'CompanyController@updateSlider')->name('company.content.updateSlider');
    Route::post('company/qualities/store', 'CompanyController@createInfo')->name('company.info.store');
    Route::post('company/content/update-info', 'CompanyController@updateInfo')->name('company.content.updateInfo');
    Route::post('company/content/generic-section/update', 'CompanyController@updateHomeGenericSection')->name('company.content.generic-section.update');
    Route::delete('company/content/{id}', 'CompanyController@destroySlider')->name('company.content.destroy');
    Route::get('company/content/slider/get-list', 'CompanyController@sliderGetList')->name('company.slider.get-list');
    Route::get('company/content/get-list2', 'CompanyController@getList2')->name('company.get-list2');
    /** Fin company*/

    /** Page Brand */
    Route::get('brand/content', 'BrandController@content')->name('brand.content');
    Route::post('brand/content/generic-section/store', 'BrandController@store')->name('brand.content.store');
    Route::post('brand/content/generic-section/update', 'BrandController@update')->name('brand.content.update');
    Route::post('brand/content/update', 'BrandController@updateSection')->name('brand.content.update-section');
    Route::delete('brand/content/{id}', 'BrandController@destroy')->name('brand.content.destroy');
    Route::get('brand/content/{id}', 'BrandController@find')->name('brand.content.find');
    Route::get('brand/content/slider/get-list', 'BrandController@sliderGetList')->name('brand.slider.get-list');
    /** Fin Brand*/

    /** Page Category */
    Route::get('category/content', 'CategoryController@content')->name('category.content');
    Route::post('category/content/generic-section/store', 'CategoryController@store')->name('category.content.store');
    Route::post('category/content/generic-section/update', 'CategoryController@update')->name('category.content.update');
    Route::post('category/content/update', 'CategoryController@updateSection')->name('category.content.update-section');
    Route::delete('category/content/{id}', 'CategoryController@destroy')->name('category.content.destroy');
    Route::get('category/content/{id}', 'CategoryController@find')->name('category.content.find');
    Route::get('category/content/slider/get-list', 'CategoryController@sliderGetList')->name('category.slider.get-list');
    /** Fin Category*/

    /** Page SubCategory */
    Route::get('subcategory/content', 'SubCategoryController@content')->name('subcategory.content');
    Route::post('subcategory/content/generic-section/store', 'SubCategoryController@store')->name('subcategory.content.store');
    Route::post('subcategory/content/generic-section/update', 'SubCategoryController@update')->name('subcategory.content.update');
    Route::post('subcategory/content/update', 'SubCategoryController@updateSection')->name('subcategory.content.update-section');
    Route::delete('subcategory/content/{id}', 'SubCategoryController@destroy')->name('subcategory.content.destroy');
    Route::get('subcategory/content/{id}', 'SubCategoryController@find')->name('subcategory.content.find');
    Route::get('subcategory/content/slider/get-list', 'SubCategoryController@sliderGetList')->name('subcategory.slider.get-list');
    /** Fin SubCategory*/

    /** Page Tag */
    Route::get('tag/content', 'TagController@content')->name('tag.content');
    Route::post('tag/content/generic-section/store', 'TagController@store')->name('tag.content.store');
    Route::post('tag/content/generic-section/update', 'TagController@update')->name('tag.content.update');
    Route::post('tag/content/update', 'TagController@updateSection')->name('tag.content.update-section');
    Route::delete('tag/content/{id}', 'TagController@destroy')->name('tag.content.destroy');
    Route::get('tag/content/{id}', 'TagController@find')->name('tag.content.find');
    Route::get('tag/content/slider/get-list', 'TagController@sliderGetList')->name('tag.slider.get-list');
    /** Fin Tag*/

    /** Page Product */
    Route::get('product/content', 'ProductController@content')->name('product.content');
    Route::get('product/create', 'ProductController@create')->name('product.content.create');
    Route::post('product/store', 'ProductController@store')->name('product.content.store');
    Route::get('product/edit/{id}', 'ProductController@edit')->name('product.content.edit');
    Route::post('product/update/{id}', 'ProductController@update')->name('product.content.update');
    Route::get('product/get-sub-categories/{id?}', 'ProductController@getSubCategories')->name('product.get-sub-categories');
    Route::delete('product/content/{id}', 'ProductController@destroy')->name('product.content.destroy');
    Route::delete('product/card-image/{id}', 'ProductController@destroyCardImage')->name('product.card-image.destroy');
    Route::get('product/content/get-list', 'ProductController@getList')->name('product.slider.get-list');
    Route::get('product/content/get-images/{id}', 'ProductController@imagesProduct')->name('product.slider.get-images');
    Route::post('product/images/store', 'ProductController@imagesStore')->name('product.images.store');
    Route::post('product/images/update', 'ProductController@imagesUpdate')->name('product.images.update');
    Route::get('product/content/image-product/{id?}', 'ProductController@findImageProduct');
    Route::delete('product/content/image/{id}', 'ProductController@imageDestroy')->name('product.image.destroy');
    Route::post('product/attribute/store', 'ProductController@attributeStore')->name('product.attribute.store');
    Route::get('product/content/product-attribute/{id?}', 'ProductController@findProductAttribute');
    Route::post('product/attribute/update', 'ProductController@attributeUpdate')->name('product.attribute.update');
    Route::delete('product/content/product-attribute/{id}', 'ProductController@destroyProductAttribute')->name('product.attribute.destroy');
    Route::get('product/content/get-list2/{id}', 'ProductController@getList2')->name('product.get-list2');

    Route::post('product/download/store', 'ProductController@downloadStore')->name('product.download.store');
    Route::get('product/content/product-download/{id?}', 'ProductController@findProductdownload');
    Route::post('product/download/update', 'ProductController@downloadUpdate')->name('product.download.update');
    Route::delete('product/content/product-download/{id}', 'ProductController@destroyProductdownload')->name('product.download.destroy');
    Route::get('product/content/get-list3/{id}', 'ProductController@getList3')->name('product.get-list3');
    /** Fin Product*/

    /** Page Company */
    Route::get('quality/content', 'QualityController@content')->name('quality.content');
    Route::post('quality/content/store-slider', 'QualityController@storeSlider')->name('quality.content.storeSlider');
    Route::post('quality/content/update-slider', 'QualityController@updateSlider')->name('quality.content.updateSlider');
    Route::post('quality/qualities/store', 'QualityController@createInfo')->name('quality.info.store');
    Route::post('quality/content/update-info', 'QualityController@updateInfo')->name('quality.content.updateInfo');
    Route::post('quality/content/generic-section/update', 'QualityController@updateHomeGenericSection')->name('quality.content.generic-section.update');
    Route::delete('quality/content/{id}', 'QualityController@destroySlider')->name('quality.content.destroy');
    Route::get('quality/content/slider/get-list', 'QualityController@sliderGetList')->name('quality.slider.get-list');
    Route::get('quality/content/service/get-list', 'QualityController@serviceGetList')->name('quality.service.get-list');
    /** Fin company*/

    /** Page News */
    Route::get('news/content', 'NewsController@content')->name('news.content');
    Route::post('news/create', 'NewsController@createInfo')->name('news.content.createInfo');
    Route::post('news/content/update-info', 'NewsController@updateInfo')->name('news.content.updateInfo');
    Route::delete('news/content/{id}', 'NewsController@destroySlider')->name('news.content.destroy');
    Route::get('news/content/slider/get-list', 'NewsController@sliderGetList')->name('news.slider.get-list');
    /** Fin News*/

    /** Page company */
    Route::get('data/content', 'DataController@content')->name('data.content');
    Route::put('data/content', 'DataController@update')->name('data.content.update');
    /** Fin company*/

    Route::get('page/content', 'AdminPageController@content')->name('page.content');
    Route::put('page/content', 'AdminPageController@update')->name('page.content.update');

    Route::get('content/', 'ContentController@content')->name('content');
    Route::get('content/{id}', 'ContentController@findContent');
    Route::post('content/hero-update', 'ContentController@heroUpdate')->name('content.hero-update');
    Route::post('content/image/{id}/{reg}', 'ContentController@destroyImage')->name('content.destroy-image');

    Route::get('user/get-list', 'UserController@getList')->name('user.get-list');
    Route::resource('user', 'UserController');
});
