document.getElementById('redactService').addEventListener('submit',redactService);


 
async function redactService(e){

    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    const name = formData.get('name')
    const duration = formData.get('duration')
    const price = formData.get('price')
    const picture_url = formData.get('picture_url')
    const id = document.getElementById('service').dataset.id;
    
    const data = {
        'name':name,
        'duration':duration,
        'price':price,
        'picture_url':picture_url,
        'id':id
    }

    await fetch('/redactService',{
        method:'put',
        headers:{'content-type':'application/json'},
        body: JSON.stringify(data)
    })

    location.href = '/servicesView';

}




