document.getElementById('serviceAdd').addEventListener('submit',createService);

async function createService(e){

    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    const name = formData.get('name');
    const duration = formData.get('duration');
    const price = formData.get('price');
    const picture = formData.get('picture');

    const data = {
        'name':name,
        'duration':duration,
        'price':price,
        'picture_url':picture
    }

    const response = await fetch('/addService',{
        method:'post',
        headers:{'content-type':'application/json'},
        body: JSON.stringify(data)
    });

    

}

