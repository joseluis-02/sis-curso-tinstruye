function openModal(){
    //console.log('Open modal');
    $('#frmUsuario')[0].reset();
    $('#id_usuario').val(0);
    $('#filaClaves').show();
    $('#btnText').text('Guardar');
    $('#modalUsuario').modal("show");
}
function closeModal(){
    $('#modalUsuario').modal("hide");
}
function obtener(id){
    const url = `${base_url}/Usuarios/obtener/${id}`;
    //const frm = document.getElementById('frmUsuario');
    const http = new XMLHttpRequest();
    http.open('GET', url,true);
    http.send();
    http.onreadystatechange = function(){
        if (http.readyState === 4) {
            if (http.status === 200) {
                //console.log("Respuesta exitosa:", http.responseText);
                try {
                    const response = JSON.parse(http.responseText);
                    if(response.success){
                        $('#id_usuario').val(response.data.id_usuario);
                        $('#nombre').val(response.data.nombre);
                        $('#nick').val(response.data.nick);
                        $('#id_caja').val(response.data.id_caja);
                        $('#clave').val('');
                        $('#clave2').val('');
                        $('#btnText').text('Actualizar');
                        $('#filaClaves').hide();
                        $('#modalUsuario').modal("show");
                            //tblUsuarios.ajax.reload();
                    }else{
                        
                        Swal.fire({
                            title: "Error",
                            text: response.message,
                            icon: "error"
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
function guardarOeditar(e){
    e.preventDefault();
    const id_usuario = document.getElementById('id_usuario');
    const nick = document.getElementById('nick');
    const nombre = document.getElementById('nombre');
    const clave = document.getElementById('clave')
    const clave2 = document.getElementById('clave2');
    if(nick.value == "" || nombre.value == "" || clave.value == "" && id_usuario.value==0){
        Swal.fire({
            title: "Requerimiento",
            text: "Los campos nick, nombre y clave son obligatorios",
            icon: "warning"
          });
    } else if(clave.value != clave2.value && id_usuario==0){
        Swal.fire({
            title: "Error",
            text: "Las claves no son iguales",
            icon: "error"
          });
    }else{
        const url = base_url+'/Usuarios/crear_o_actualizar';
        const frm = document.getElementById('frmUsuario');
        //console.log(frm);
        const http = new XMLHttpRequest();
        http.open('POST', url,true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if (http.readyState === 4) {
                if (http.status === 200) {
                    //console.log("Respuesta exitosa:", http.responseText);
                    try {
                        const response = JSON.parse(http.responseText);
                        //console.log(response);
                        if(response.success){
                            //window.location.href = base_url + "/Home";
                            closeModal();
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                              });
                              tblUsuarios.ajax.reload();
                        }else{
                            
                            Swal.fire({
                                title: "Error",
                                text: response.message,
                                icon: "error"
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
