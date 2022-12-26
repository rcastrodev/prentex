<template>
    <div>
        <loader object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular" v-if="load"></loader>
        <div class="container row mx-auto" v-else>
            <div class="col-sm-12 col-md-3">
                <div class="fw-bold font-size-18 py-3" style="border-bottom: 1px solid #E0E0E0;">
                    <form action="/productos" class="mb-3">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="p" value="" placeholder="Ingresa tu busqueda" aria-label="Ingresa tu busqueda">
                            <button class="btn bg-red"><i class="fal fa-search text-white"></i></button>
                        </div>
                    </form>
                    <div>
                        <h6 class="fw-bold font-size-18 mb-3">Filtrar por</h6> 
                        <div id="marcas"></div>
                    </div>
                </div>
                <div class="py-3 contenedor font-size-14" style="border-bottom: 1px solid #E0E0E0;">
                    <div class="categoria text-gray position-relative mb-3">
                        CATEGORÍA
                        <div class="position-absolute" style="right: 10px; top: -6px; font-size: 20px; cursor:pointer">
                            <i class="fal fa-angle-down"></i>
                        </div>
                    </div>
                    <div class="contenido contenido-categorias">
                        <ul class="p-0" style="list-style: none">
                            <li v-for="category in categories" :key="category.id">
                                <a href="#" :id="`categorylist${category.id}`" class="text-decoration-none text-dark py-1 d-block font-size-14 categorylist" 
                                v-text="category.name"
                                @click.prevent="filterProducts(category.id , null, null, null)" 
                                ></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="py-3 contenedor font-size-14" v-if="hasCategory" style="border-bottom: 1px solid #E0E0E0;">
                    <div class="categoria text-gray position-relative mb-3">
                        SUBCATEGORIA
                        <div class="position-absolute" style="right: 10px; top: -6px; font-size: 20px; cursor:pointer">
                            <i class="fal fa-angle-down"></i>
                        </div>
                    </div>
                    <div class="contenido contenido-categorias">
                        <ul class="p-0" style="list-style: none">
                            <li v-for="subCategory in subCategories" :key="subCategory.id">
                                <a href="#" :id="`subcategorylist${subCategory.id}`" class="text-decoration-none text-dark py-1 d-block font-size-14 subcategorylist" 
                                v-text="subCategory.name"
                                @click.prevent="filterProducts(null, null, null, subCategory.id)" 
                                ></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="py-3 contenedor font-size-14" style="border-bottom: 1px solid #E0E0E0;">
                    <div class="categoria text-gray position-relative mb-3">
                        MARCAS
                        <div class="position-absolute" style="right: 10px; top: -6px; font-size: 20px; cursor:pointer">
                            <i class="fal fa-angle-down"></i>
                        </div>
                    </div>
                    <div class="contenido">
                        <ul class="p-0" style="list-style: none">
                            <li v-for="brand in brands" :key="brand.id">
                                <label>
                                    <input type="checkbox" class="me-2" :value="brand.name" @click="filterProducts(null, brand.id, null, null)">
                                    {{ brand.name }}
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="py-3 contenedor font-size-14" style="border-bottom: 1px solid #E0E0E0;">
                    <div class="categoria text-gray position-relative mb-3">
                        RIESGO
                        <div class="position-absolute" style="right: 10px; top: -6px; font-size: 20px; cursor:pointer">
                            <i class="fal fa-angle-down"></i>
                        </div>
                    </div>
                    <div class="contenido">
                        <ul class="p-0" style="list-style: none">
                            <li v-for="tag in tags" :key="tag.id">
                                <label>
                                    <input type="checkbox" name="tag" :value="tag.name" class="me-2" @click="filterProducts(null, null, tag.id, null)">
                                    {{ tag.name }}
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 row">
                <div class="col-sm-12 col-md-6 col-xl-4 mb-4" v-for="product in products.data" :key="product.id">
                    <a :href="`${url}/producto/${product.slug}`" class="card producto text-decoration-none position-relative text-dark" style="height: 410px;">
                        <img :src="`${url}/${product.image}`" v-if="product.image" class="img-fluid img-product" style="height: 216px; object-fit: cover;">
                        <img :src="`${url}/images/category/Group12.png`" v-else class="img-fluid img-product" style="height: 216px; object-fit: cover;">
                        <div class="card-body">
                            <div class="card-text">
                                <p class="font-size-14 mb-2" v-text="product.code"></p>
                                <p class=" mb-0 fw-bold font-size-18 text-red text-uppercase mb-2" v-text="product.name"></p>
                                <div class="text-gray" v-html="product.description.substr(0, 100)"></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div v-if="pagination">
                    <ul class="pagination">
                        <li class="page-item" v-show="products['prev_page_url']">
                            <a href="#" class="page-link" @click.prevent="getPreviousPage">
                                <span>
                                    <span aria-hidden="true">«</span>
                                </span>
                            </a>
                        </li>
                        <li class="page-item" :class="{ 'active': (products['current_page']=== n) }" v-for="n in products['last_page']" :key="n.id">
                            <a href="#" class="page-link" @click.prevent="getPage(n)">
                                <span >
                                    {{ n }}
                                </span>
                            </a>
                        </li>
                        <li class="page-item" v-show="products['next_page_url']">
                            <a href="#" class="page-link" @click.prevent="getNextPage">
                                <span>
                                    <span aria-hidden="true">»</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
    export default {
        data(){
            return {
                products: {},
                categories: {},
                brands: {},
                tags: {},
                filterByBrand: [],
                filterByTag: [],
                pagination: true,
                categoryid: null,
                subCategoryid: null,
                getCategory: null,
                url: document.getElementById('root').getAttribute('content'),
                hasCategory: null,
                subCategories: [],
                load: true
            }
        },
        mounted() {
            this.getProducts()
            this.getCategories()
            this.getBrands()
            this.getTags()
        },

        methods: {
            getProducts(){
                const valores = window.location.search;
                const urlParams = new URLSearchParams(valores);
                let p           = urlParams.get('p');
                let category    = urlParams.get('category');
                let tag         = urlParams.get('tag');
                let brand       = urlParams.get('brand');
      
                if(!p && !category && !tag && !brand) {
                    axios.get(`${this.url}/productos/get-products`)
                    .then(response => {
                        this.products = response.data
                        this.load = false
                    })      
                    
                }else if(category){
                    axios.get(`${this.url}/productos/get-products`, { params: { category: category } })
                    .then(response => {
                        this.products = response.data
                        this.load = false
                    })        

                }else if(p){
                    axios.get(`${this.url}/productos/get-products`, { params: { p: p } })
                    .then(response => {
                        this.products = response.data
                        this.load = false
                    })                  
                } else if(tag){
                    axios.get(`${this.url}/productos/get-products`, { params: { tag: tag } })
                    .then(response => {
                        this.products = response.data
                        this.load = false
                    })                  
                } else if(brand){
                    axios.get(`${this.url}/productos/get-products`, { params: { brand: brand } })
                    .then(response => {
                        this.products = response.data
                        this.load = false
                    })                  
                }
            },

            filterProducts(category_id, brand_id, tag_id, subCategory_id)
            {
                let object = {}
                if (category_id || this.categoryid){
                    if (this.categoryid == category_id) {
                        this.categoryid = category_id
                        object.category_id = category_id
                    }else{
                        this.categoryid = category_id
                        object.category_id = this.categoryid
                    }
                }

                if (subCategory_id || this.subCategoryid){
                    if (this.subCategoryid == subCategory_id) {
                        this.subCategoryid = subCategory_id
                        object.subCategoryId = subCategory_id
                    }else{
                        this.subCategoryId = subCategory_id
                        object.subCategoryId = this.subCategoryId
                    }
                }
   
                if (category_id) 
                    this.changeColor('categorylist',category_id)

                if (subCategory_id) 
                    this.changeColor('subcategorylist',subCategory_id)
                    
                if (this.filterByBrand.length || brand_id) {
                    if (this.filterByBrand.indexOf(brand_id) >= 0) {
                        this.filterByBrand.splice(this.filterByBrand.indexOf(brand_id), 1)
                    } else {
                        this.filterByBrand.push(brand_id)  
                    }
                    object.brands_id = this.filterByBrand
                }

                if (this.filterByTag.length || tag_id) {

                    if (this.filterByTag.indexOf(tag_id) >= 0) 
                        this.filterByTag.splice(this.filterByBrand.indexOf(brand_id), 1)
                    else
                        this.filterByTag.push(tag_id)
                    
                    object.tags_id = this.filterByTag
                }

                axios.post(`${this.url}/productos/get-products-data`, object).then(response => {
                    this.products = response.data
                    this.pagination = false
                    if (this.categoryid) {
                        axios.get(`${this.url}/categorias/get-subcategories/${this.categoryid}`)
                        .then(response => {
                            if (response.data.length) {
                                this.hasCategory = true
                                this.subCategories = response.data
                            }else{
                                this.hasCategory = false
                                this.subCategories = []
                            }
                        })   
                    }
                })
            },

            changeColor(name,id){
                let element = document.getElementById(`${name}${id}`)
                let elements = document.querySelectorAll(`.${name}`)
                elements.forEach(element => {
                    if (element.classList.contains("active"))
                        element.classList.remove("active")
                });
                element.classList.add('active') 
            },

            getCategories(){
                axios.get(`${this.url}/categorias/get-categories`)
                .then(response => {
                    this.categories = response.data
                })
            },

            getBrands(){
                axios.get(`${this.url}/marcas/get-brands`)
                .then(response => {
                    this.brands = response.data
                })
            },

            getTags(){
                axios.get(`${this.url}/riesgos/get-tags`)
                .then(response => {
                    this.tags = response.data
                })
            },

            getPage(page){
                axios.get(`${this.url}/productos/get-products?page=${page}`)
                .then(response => {
                    this.products = response.data
                })
            },

            getPreviousPage(){
                axios.get(this.products['prev_page_url'])
                .then(response => {
                    this.products = response.data
                })
            },
            
            getNextPage(){
                axios.get(this.products['next_page_url'])
                .then(response => {
                    this.products = response.data
                })
            },
        }
    }
</script>