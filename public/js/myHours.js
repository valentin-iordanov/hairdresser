const deleteBtns = document.querySelectorAll('.deleteBtn');

deleteBtns.forEach(element => {
    element.addEventListener('click',deleteElem);
});
 
async function deleteElem(e){

    
    const respons = await fetch('/appoitment/delete/' + e.target.dataset.id ,{
        method:'delete',
        headers:{'content-type':'application/json'},
    });

    window.location.href = window.location.href;

}




