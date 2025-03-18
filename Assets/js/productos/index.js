let tblProductos;
$(document).ready(function() {
        tblUsuarios = $('#tbProductos').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: `${base_url}/Productos/listar`,
                type: 'POST',
                dataSrc: '',
            },
            columns: [
                { data: 'id_producto' },
                { data: 'codigo' },
                { data: 'nombre_producto' },
                { data: 'costo_compra' },
                { data: 'precio_venta' },
                { data: 'cantidad' },
                { data: 'categoria' },
                { data: 'medida' },
                { data: 'producto_estado' },
                { data: 'acciones' }
            ],
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            },
            responsive: true
    });
    
    
    
});
