const btn = document.getElementById('logout');

btn.addEventListener('click', logout);

function logout() {


    const cookies = document.cookie.split(";");

    for (const cookie of cookies) {
        const eqPos = cookie.indexOf("=");
        const name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }

    sessionStorage.clear();

    window.location.href = "/";
}


