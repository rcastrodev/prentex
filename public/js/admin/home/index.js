let table = $('#page_table_slider').DataTable({
    serverSide: true,
    ajax: `${root}/slider/get-list`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "order" },
        { data: "content_1" },
        { data: "content_2" },
        { data: "image"},
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});

let table2 = $('#page_table_2').DataTable({
    serverSide: true,
    ajax: `${root}/get-list2`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "order" },
        { data: "content_1" },
        { data: "image"},
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});

let table3 = $('#page_table_3').DataTable({
    serverSide: true,
    ajax: `${root}/get-list3`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "order" },
        { data: "content_1" },
        { data: "image"},
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});

function dataSliderContent(content)
{
    let form = document.getElementById('form-update-slider')
    form.reset()
    form.querySelector('input[name="id"]').setAttribute('value', content.id)
    form.querySelector('input[name="order"]').setAttribute('value', content.order)
    form.querySelector('input[name="content_1"]').setAttribute('value', content.content_1)
}

$('.destroy').click(function(e){
    e.preventDefault()
    let element = e.target

    Swal.fire({
        title: 'Deseas eliminar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Si!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            axios.post(element.dataset.url)
                .then(r => {
                    element.closest('div').remove()
                })
                .catch(e => console.error(e))
            
        }
    })
})

async function findContent2(id)
{   
    // get content 
    let url = document.querySelector('meta[name="content_find"]').getAttribute('content')
    if(url){
        if(id){
            try {
                let result = await axios.get(`${url}/${id}`)
                let content = result.data.content 
                dataSliderContent2(content)
            } catch (error) {
                console.log(new Error(error));
            }
        }
    }
}

function dataSliderContent2(content)
{
    let form = document.getElementById('form-update-2')
    form.reset()
    form.querySelector('input[name="id"]').setAttribute('value', content.id)
    form.querySelector('input[name="order"]').setAttribute('value', content.order)
    form.querySelector(`option[value="${content.content_2}"]`).setAttribute('selected', 'true')
    if (content.content_1)
        form.querySelector('input[name="content_1"]').setAttribute('value', content.content_1)
    
    
}

async function findContent3(id)
{   
    // get content 
    let url = document.querySelector('meta[name="content_find"]').getAttribute('content')
    if(url){
        if(id){
            try {
                let result = await axios.get(`${url}/${id}`)
                let content = result.data.content 
                dataSliderContent3(content)
            } catch (error) {
                console.log(new Error(error));
            }
        }
    }
}

function dataSliderContent3(content)
{
    let form = document.getElementById('form-update-3')
    form.reset()
    form.querySelector('input[name="id"]').setAttribute('value', content.id)
    form.querySelector('input[name="order"]').setAttribute('value', content.order)
    CKEDITOR.instances['content_15'].setData(content.content_1)

}

