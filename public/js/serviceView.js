
const deleteBtns = document.querySelectorAll('.deleteBtn');

deleteBtns.forEach(element => {
    element.addEventListener('click',deleteService);
});


async function deleteService({target}){

    const serviceId = target.dataset.id;

    const response = await fetch('/service/delete/' + serviceId,{
        method:'delete'
    });

    window.location.href = window.location.href;

}


