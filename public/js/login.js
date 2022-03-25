let form = document.getElementById('login');

form.addEventListener('submit',login);


async function login(e){
    e.preventDefault()
    const form = e.target;
    const formData = new FormData(form);

    let email = formData.get("email");
    let password = formData.get("password");

    const data = {
        "email" : email,
        "password" : password
    }

   const response = await post('/user/login',data);
   
    if(response.status == 400){
        let error = await response.text();
        error = JSON.parse(error);
        alert(error.message);
    }else if(response.status == 200) {
        let user = await response.text();
        user = JSON.parse(user);
        sessionStorage.setItem("id",user.id);
        window.location.href = '/';
    }else{
        alert("error");
    }
    

}



async function post(url,data){

    const response = await fetch(url,{
        method:'post',

        headers:{
            'content-type':'application/json'
        },

        body: JSON.stringify(data)
    });

    return response;

}

