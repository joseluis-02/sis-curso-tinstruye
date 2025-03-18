let tblCategorias;
$(document).ready(function() {
        tblUsuarios = $('#tbCategorias').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: `${base_url}/Categorias/listar`,
                type: 'POST',
                dataSrc: '',
            },
            columns: [
                { data: 'id_categoria' },
                { data: 'nombre_categoria' },
                { data: 'codigoProductSin' },
                { data: 'categoria_estado' },
                { data: 'acciones' }
            ],
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            },
            responsive: true
    });
});
