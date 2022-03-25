

document.getElementById("register").addEventListener('submit',register)

async function register(e){
    e.preventDefault()
    const form = e.target;
    const formData = new FormData(form);

    let email = formData.get("email");
    let username = formData.get("username");
    let password = formData.get("password");
    let repeatPassword = formData.get("repeat_password");

    const data = {
        "email" : email,
        "username" : username,
        "password" : password
    }

    if(password != repeatPassword){
        alert('password not same');
        return;
    }

   const response = await post('/user/register',data);
   

    if(response.status == 400){
        let error = await response.text();
        error = JSON.parse(error);
        alert(error.message);
    }else if(response.status == 200) {
        alert('Nice you made it ' + username + ' now you have Account' );
        let user = await response.text();
        user = JSON.parse(user);
        sessionStorage.setItem("id",user.id);
        window.location.href = "/";
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