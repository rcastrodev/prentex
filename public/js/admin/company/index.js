let table = $('#page_table_slider').DataTable({
    serverSide: true,
    ajax: `${root}/slider/get-list`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "content_1"},
        { data: "content_2"},
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
        { data: "order"},
        { data: "content_1"},
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
    CKEDITOR.instances['content_22'].setData(content.content_2)
}

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

    if (content.order)
        form.querySelector('input[name="order"]').setAttribute('value', content.order) 

    if (content.content_6)
        form.querySelector('input[name="content_6"]').setAttribute('value', content.content_6) 

    if (content.content_1)
        form.querySelector('input[name="content_1"]').setAttribute('value', content.content_1) 
    
    if (content.content_2)
        form.querySelector('input[name="content_2"]').setAttribute('value', content.content_2) 
    
    if (content.content_3)
        form.querySelector('input[name="content_3"]').setAttribute('value', content.content_3) 
    
    if (content.content_4)
        form.querySelector('input[name="content_4"]').setAttribute('value', content.content_4) 
    
    if (content.content_5)
        form.querySelector('input[name="content_5"]').setAttribute('value', content.content_5) 
    
}



