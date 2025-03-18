let tblMedidas;
$(document).ready(function() {
        tblCajas = $('#tbMedidas').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: `${base_url}/Medidas/listar`,
                type: 'POST',
                dataSrc: '',
            },
            columns: [
                { data: 'id_medida' },
                { data: 'descripcion_medida' },
                { data: 'descripcion_corta' },
                { data: 'medida_estado' },
                { data: 'acciones' }
            ],
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            },
            responsive: true
    });
});

