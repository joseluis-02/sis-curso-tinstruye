let tblCajas;
$(document).ready(function() {
        tblCajas = $('#tbCajas').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: `${base_url}/Cajas/listar`,
                type: 'POST',
                dataSrc: '',
            },
            columns: [
                { data: 'id_caja' },
                { data: 'caja' },
                { data: 'caja_estado' },
                { data: 'acciones' }
            ],
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            },
            responsive: true
    });
});

