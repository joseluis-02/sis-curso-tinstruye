function activarOinactivar(id, estado){
    Swal.fire({
        title: `Desea ${estado ? 'desactivar':'activar'} el registro?`,
        html: `Ahora mismo se encuentra ${estado ? '<span class="badge badge-success">activo</span>':'<span class="badge badge-danger">inactivo</span>'}`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "No",
        confirmButtonText: "Si"
      }).then((result) => {
        if (result.isConfirmed) {
            const url = `${base_url}/Usuarios/activar_o_inactivar?id=${id}&estado=${estado}`;
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
                                Swal.fire({
                                    html: `${estado ?'<span class="badge badge-danger">Desactivado</span>': '<span class="badge badge-success">Activado</span>'}`,
                                    text: response.message,
                                    icon: "success",
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
      });
}