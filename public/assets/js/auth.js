window.onload = function() {
    if (sessionStorage.getItem("userName")){
        document.getElementById("user").innerHTML = sessionStorage.getItem("userName");
    } else {
        document.getElementById("logout-user").setAttribute("hidden", true);

    }
};

const logout = () => {
    sessionStorage.clear();
    window.location.href = "/";
};
