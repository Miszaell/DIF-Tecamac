
window.onload = function () {

    if (localStorage.getItem("userName")) {
        document.getElementById("user").innerHTML = localStorage.getItem("userName");
    } else {
        document.getElementById("auth").setAttribute("style", "display:none");
    }
};
