let tblClientes;
$(document).ready(function() {
        tblUsuarios = $('#tbClientes').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: `${base_url}/Clientes/listar`,
                type: 'POST',
                dataSrc: '',
            },
            columns: [
                { data: 'id_cliente' },
                { data: 'razon_social' },
                { data: 'tipo_documento' },
                { data: 'documentoid' },
                { data: 'complementoid' },
                { data: 'cliente_email' },
                { data: 'cliente_estado' },
                { data: 'acciones' }
            ],
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            },
            responsive: true
    });
});
