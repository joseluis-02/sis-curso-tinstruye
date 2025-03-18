function openModal(){
    //console.log('Open modal');
    $('#frmCliente')[0].reset();
    $('#id_cliente').val(0);
    $('#btnText').text('Guardar');
    $('#modalCliente').modal("show");
}
function closeModal(){
    $('#modalCliente').modal("hide");
}
function obtener(id){
    const url = `${base_url}/Clientes/obtener/${id}`;
    //const frm = document.getElementById('frmCliente');
    const http = new XMLHttpRequest();
    http.open('GET', url,true);
    http.send();
    http.onreadystatechange = function(){
        if (http.readyState === 4) {
            if (http.status === 200) {
                //console.log("Respuesta exitosa:", http.responseText);
                try {
                    const response = JSON.parse(http.responseText);
                    //console.log(response);
                    if(response.success){
                        $('#id_cliente').val(response.data.id_cliente);
                        $('#documentoid').val(response.data.documentoid);
                        $('#complementoid').val(response.data.complementoid);
                        $('#razon_social').val(response.data.razon_social);
                        $('#id_tipo_documento').val(response.data.id_tipo_documento);
                        $('#cliente_email').val(response.data.cliente_email);
                        $('#btnText').text('Actualizar');
                        $('#modalCliente').modal("show");
                        //console.log(response.data);
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
    const id_cliente = document.getElementById('id_cliente');
    const documentoid = document.getElementById('documentoid');
    const complementoid = document.getElementById('complementoid');
    const razon_social = document.getElementById('razon_social')
    const cliente_email = document.getElementById('cliente_email');
    const id_tipo_documento = document.getElementById('id_tipo_documento');
    if(documentoid.value == "" || razon_social.value == "" || id_tipo_documento.value=="" && id_cliente.value==0){
        Swal.fire({
            title: "Requerimiento",
            text: "Los campos Tipo documento, código docuemento y razón social son obligatorios",
            icon: "warning"
          });
    } else{
        const url = base_url+'/Clientes/crear_o_actualizar';
        const frm = document.getElementById('frmCliente');
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
