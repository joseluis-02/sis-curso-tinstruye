let tblTipoDocumentos;
$(document).ready(function() {
        tblCajas = $('#tbTipoDocumentos').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: `${base_url}/TipoDocumentos/listar`,
                type: 'POST',
                dataSrc: '',
            },
            columns: [
                { data: 'id_tipo_documento' },
                { data: 'abreviado' },
                { data: 'nombre' },
                { data: 'estado' },
                { data: 'acciones' }
            ],
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            },
            responsive: true
    });
});

