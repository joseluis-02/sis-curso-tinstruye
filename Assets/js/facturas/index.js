let tblFacturas;
$(document).ready(function() {
        tblUsuarios = $('#tbFacturas').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: `${base_url}/Facturas/listar`,
                type: 'POST',
                dataSrc: '',
            },
            columns: [
                { data: 'id_factura' },
                { data: 'numeroFactura' },
                { data: 'cuf' },
                { data: 'razon_social' },
                { data: 'fechaEmision' },
                { data: 'codigoMetodoPago' },
                { data: 'montoTotal' },
                { data: 'montoTotalSujetoIva' },
                { data: 'descuentoAdicional' },
                { data: 'productos' },
                { data: 'factura_estado' },
                { data: 'acciones' }
            ],
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            },
            responsive: true
    });
    
    
    
});
