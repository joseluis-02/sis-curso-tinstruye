//console.log(base_url);
function frmLogin(e){
    e.preventDefault();
    //console.log('Entra');
    const nick = document.getElementById("nick");
    const clave = document.getElementById("clave");
    if(nick.value == ""){
        nick.classList.add('is-invalid');
        //alert("El campo nick es obligatorio");
        //return;
    }else if(clave.value==""){
        nick.classList.remove('is-invalid');
        clave.classList.add('is-invalid')
    }else{
        const url = base_url+'/Auth/validar';
        //console.log(url);
        const frm = document.getElementById('frmLogin');
        //console.log(frm);
        const http = new XMLHttpRequest();
        http.open('POST',url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if (http.readyState === 4) {
                if (http.status === 200) {
                    //console.log("Respuesta exitosa:", http.responseText);
                    try {
                        const response = JSON.parse(http.responseText);
                        //console.log(response);
                        if(response.success){
                            window.location.href = base_url + "/Home";
                        } else{
                            Swal.fire({
                                icon: "error",
                                title: response.message,
                                showConfirmButton: true,
                              });
                        }
                    } catch (error) {
                        console.error("Error al parsear JSON:", error);
                    }
                } else {
                    console.error("Error HTTP:", http.status, http.statusText);
                }
            }
            
        }
    }

}