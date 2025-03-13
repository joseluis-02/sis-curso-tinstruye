let tblUsuarios;
$(document).ready(function() {
        tblUsuarios = $('#tbUsuarios').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: `${base_url}/Usuarios/listar`,
                type: 'POST',
                dataSrc: '',
            },
            columns: [
                { data: 'id_usuario' },
                { data: 'nick' },
                { data: 'nombre' },
                { data: 'caja' },
                { data: 'usuario_estado' },
                { data: 'acciones' }
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            },
            responsive: true
    });
    
    
    
});
