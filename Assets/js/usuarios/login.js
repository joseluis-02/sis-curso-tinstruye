function frmLogin(e){
    e.preventDefault();
    const nick = document.getElementById("nick");
    const clave = document.getElementById("clave");
    if(nick.value == ""){
        alert("El campo nick es obligatorio");
        return;
    }
    var data = new FormData(document.getElementById("frmLogin"));
    fetch("http://localhost:8000/usuarios/login", {
        method: "POST",
        body: data
    })
    .then(res => res.json())
    .then(response => {
        if(response.status == 200){
            localStorage.setItem("token", response.token);
            location.href = "http://localhost:8000/usuarios/perfil";
        }else{
            alert(response.mensaje);
        }
    });

}