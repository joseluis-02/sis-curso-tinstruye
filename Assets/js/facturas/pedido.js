// DOM Elements
const invoiceNumberEl = document.getElementById('invoiceNumber');
const economicActivityEl = document.getElementById('economicActivity');
const nitciEl = document.getElementById('nitci');
const businessNameEl = document.getElementById('businessName');
const emailEl = document.getElementById('email');

// Product Form Elements
const productCodeEl = document.getElementById('productCode');
const productNameEl = document.getElementById('productName');
const priceEl = document.getElementById('price');
const quantityEl = document.getElementById('quantity');
const discountEl = document.getElementById('discount');
const subtotalEl = document.getElementById('subtotal');
const addProductBtn = document.querySelector('.btn-info.btn-circle');

// Summary Elements
const summarySubtotalEl = document.querySelector('.summary-table tr:nth-child(1) .summary-value');
const summaryDiscountEl = document.getElementById('descuentoTotal');
const summaryTotalEl = document.querySelector('.summary-table tr:nth-child(3) .summary-value');

// Product table body
const productTableBody = document.getElementById('productos');

// Global arrays to store data from server
let customers = [];
let productCatalog = [];
let invoiceProducts = [];

// Initialize the page
function initPage() {
    verficarComunicaion();
    cufd();
    cuis();
    // Populate the table with existing products
    renderProductTable();
    
    // Calculate and update summary totals
    updateSummary();
    
    // Set up event listeners
    setupEventListeners();
    
}

// Set up all event listeners
function setupEventListeners() {
    // Add product button
    addProductBtn.addEventListener('click', addProduct);
    
    // Calculate subtotal when price, quantity or discount changes
    priceEl.addEventListener('input', calculateSubtotal);
    quantityEl.addEventListener('input', calculateSubtotal);
    discountEl.addEventListener('input', calculateSubtotal);
    summaryDiscountEl.addEventListener('input', updateSummary);
    
    // Product search button
    document.querySelector('#productCode + .input-group-append .btn').addEventListener('click', function() {
        const code = productCodeEl.value.trim();
        if (code) {
            fetchProductDetails(code);
        }
    });
    
    // Customer search button
    document.querySelector('#nitci + .input-group-append .btn').addEventListener('click', function() {
        const nitci = nitciEl.value.trim();
        if (nitci) {
            fetchCustomerDetails(nitci);
        }
    });
    
    // Enter key press on NIT/CI field
    nitciEl.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const nitci = nitciEl.value.trim();
            if (nitci) {
                fetchCustomerDetails(nitci);
            }
        }
    });
    
    // Enter key press on product code field
    productCodeEl.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const code = productCodeEl.value.trim();
            if (code) {
                fetchProductDetails(code);
            }
        }
    });
    
    // Listen for delete buttons (using event delegation since rows are added dynamically)
    productTableBody.addEventListener('click', function(e) {
        if (e.target.closest('.btn-delete')) {
            const row = e.target.closest('tr');
            const index = Array.from(productTableBody.children).indexOf(row);
            deleteProduct(index);
        }
    });
}


// Fetch customer details from server
function fetchCustomerDetails(nitci) {
    // Show loading indicator
    businessNameEl.value = 'Loading...';
    emailEl.value = 'Loading...';
    
    // Create AJAX request
    const xhr = new XMLHttpRequest();
    const url = `${base_url}/Clientes/buscar/${nitci}`
    xhr.open('GET', url, true);
    
    xhr.onload = function() {
        if (this.status === 200) {
            try {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    // Fill in customer details
                    businessNameEl.value = response.data.razon_social || '';
                    emailEl.value = response.data.cliente_email || '';
                } else {
                    // Clear form and show error message
                    businessNameEl.value = '';
                    emailEl.value = '';
                    Swal.fire({
                        title: "error",
                        text: response.message,
                        icon: "error"
                        });
                }
            } catch (e) {
                businessNameEl.value = '';
                emailEl.value = '';
                console.error('Error parsing customer data:', e);
                showError('Error processing customer data. Please try again.');
            }
        } else {
            businessNameEl.value = '';
            emailEl.value = '';
            console.error('Error fetching customer. Status:', this.status);
            showError('Error connecting to server. Please try again.');
        }
    };
    
    xhr.onerror = function() {
        businessNameEl.value = '';
        emailEl.value = '';
        console.error('Network error while fetching customer');
        showError('Network error. Please check your connection and try again.');
    };
    
    xhr.send();
}

// Fetch product details from server
function fetchProductDetails(code) {
    // Show loading indicator
    productNameEl.value = 'Loading...';
    priceEl.value = '';
    
    // Create AJAX request
    const xhr = new XMLHttpRequest();
    const url = `${base_url}/Productos/buscar/${code}`
    xhr.open('GET', url, true);
    
    xhr.onload = function() {
        if (this.status === 200) {
            try {
                const response = JSON.parse(this.responseText);
                
                if (response.success) {
                    // Fill in product details
                    productNameEl.value = response.data.nombre_producto || '';
                    priceEl.value = response.data.precio_venta ? parseFloat(response.data.precio_venta).toFixed(2) : '';
                    quantityEl.value = 1;
                    discountEl.value = '0.00';
                    
                    // Calculate subtotal
                    calculateSubtotal();
                    
                    // Focus on quantity field
                    quantityEl.focus();
                } else {
                    // Clear form and show error message
                    productNameEl.value = '';
                    priceEl.value = '';
                    Swal.fire({
                        title: "error",
                        text: response.message,
                        icon: "error"
                        });
                }
            } catch (e) {
                productNameEl.value = '';
                priceEl.value = '';
                console.error('Error parsing product data:', e);
                showError('Error processing product data. Please try again.');
            }
        } else {
            productNameEl.value = '';
            priceEl.value = '';
            console.error('Error fetching product. Status:', this.status);
            showError('Error connecting to server. Please try again.');
        }
    };
    
    xhr.onerror = function() {
        productNameEl.value = '';
        priceEl.value = '';
        console.error('Network error while fetching product');
        showError('Network error. Please check your connection and try again.');
    };
    
    xhr.send();
}

// Calculate subtotal based on price, quantity and discount
function calculateSubtotal() {
    const price = parseFloat(priceEl.value) || 0;
    const quantity = parseFloat(quantityEl.value) || 0;
    const discount = parseFloat(discountEl.value) || 0;
    
    // Calculate subtotal
    const subtotal = (price * quantity) - discount;
    
    // Update subtotal field
    subtotalEl.value = subtotal.toFixed(2);
}

// Add a new product to the list
function addProduct() {
    // Get values from form
    const code = productCodeEl.value.trim();
    const name = productNameEl.value.trim();
    const price = parseFloat(priceEl.value) || 0;
    const quantity = parseFloat(quantityEl.value) || 0;
    const discount = parseFloat(discountEl.value) || 0;
    const subtotal = parseFloat(subtotalEl.value) || 0;
    
    // Basic validation
    if (!code || !name || price <= 0 || quantity <= 0) {
        Swal.fire({
            title: "Error",
            text: 'No hay producto seleccionado',
            icon: "error"
            });
        return;
    }
    
    // Create product object
    const product = {
        code: code,
        name: name,
        price: price,
        quantity: quantity,
        discount: discount,
        subtotal: subtotal
    };
    
    // Add to products array
    invoiceProducts.push(product);
    
    // Update UI
    renderProductTable();
    updateSummary();
    
    // Clear form
    clearProductForm();
}

// Delete a product from the list
function deleteProduct(index) {
    // Remove product from array
    invoiceProducts.splice(index, 1);
    
    // Update UI
    renderProductTable();
    updateSummary();
}

// Render the product table
function renderProductTable() {
    // Clear existing rows
    productTableBody.innerHTML = '';
    
    // Add a row for each product
    invoiceProducts.forEach((product, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${product.code}</td>
            <td>${product.name}</td>
            <td>${product.price.toFixed(2)}</td>
            <td>${product.quantity.toFixed(2)}</td>
            <td>${product.discount.toFixed(2)}</td>
            <td>${product.subtotal.toFixed(2)}</td>
            <td>
                <button class="btn btn-delete btn-circle">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        `;
        productTableBody.appendChild(row);
    });
}

// Update summary calculations
function updateSummary() {
    // Calculate totals
    const subtotal = invoiceProducts.reduce((sum, product) => sum + product.subtotal, 0);
    if(subtotal==0.00) return;
    const totalDiscount = summaryDiscountEl.value;
    const total = subtotal - totalDiscount;
    
    // Update summary display
    summarySubtotalEl.textContent = subtotal.toFixed(2);
    //summaryDiscountEl.textContent = totalDiscount.toFixed(2);
    summaryTotalEl.textContent = total.toFixed(2);
}

// Clear product form
function clearProductForm() {
    productCodeEl.value = '';
    productNameEl.value = '';
    priceEl.value = '';
    quantityEl.value = '';
    discountEl.value = '';
    subtotalEl.value = '';
    
    // Focus on product code field
    productCodeEl.focus();
}



// Save invoice to server
function saveInvoice() {
    let nitEmisor = 415422420;
    let razonSocialEmisor = 'Jose Luis Gutierrez';
    let municipio = 'Tarija';
    let telefono = '67851245';
    let numeroFactura = 1;
    let cuf = '';
    let cufd = '';
    let codigoSucursal = 0;
    let direccion = 'Av. Colon y Circunvalacion';
    let codigoPuntoVenta = 0;
    let diferenciaHora = new Date().getTimezoneOffset() * 60000;
    let fechaEmision = new Date(Date.now() - diferenciaHora).toISOString().slice(0,-1);
    let nombreRazonSocial = "";
    let codigoTipoDocumentoIdentidad = "";
    let numeroDocumento = "";
    let complemento = "";
    let codigoCliente = ""; // Puede ser CI/NIT
    let codigoMetodoPago = 1;
    let numeroTarjeta = null;
    let montoTotal = 0.00;
    let montoTotalSujetoIva = 0.00;
    let montoGifCard = null;
    let descuentoAdicional = 0.00;
    let codigoExepcion = 0; //
    let cafc = null;
    let codigoMoneda = 1;
    let tipoCambio = 1;
    let leyenda = '';
    let usuario = 'leti';
    let codigoDocumentoSector = 1;


    console.log(fechaEmision);
    var factura = [];
    factura.push({
        cabecera:{
            razonSocialEmisor : razonSocialEmisor,
            municipio :municipio,
            telefono:telefono,
            nitEmisor: nitEmisor,
            numeroFactura: numeroFactura,
            cuf : cuf,
            codigoSucursal: codigoSucursal,
            direccion:direccion,
            codigoPuntoVenta:codigoPuntoVenta,
            cufd:cufd,
            diferenciaHora:diferenciaHora,
            fechaEmision: fechaEmision,
            nombreRazonSocial:nombreRazonSocial,
            codigoTipoDocumentoIdentidad:codigoTipoDocumentoIdentidad,
            numeroDocumento:numeroDocumento,
            complemento:complemento,
            codigoCliente:codigoCliente,
            codigoMetodoPago:codigoMetodoPago,
            numeroTarjeta:numeroTarjeta,
            montoTotal:montoTotal,
            montoTotalSujetoIva:montoTotalSujetoIva,
            montoGifCard:montoGifCard,
            descuentoAdicional:descuentoAdicional,
            codigoExepcion:codigoExepcion,
            cafc:cafc,
            codigoMoneda:codigoMoneda,
            tipoCambio:tipoCambio,
            leyenda:leyenda,
            usuario:usuario,
            codigoDocumentoSector:codigoDocumentoSector
        }
    });



    /*
    // Get invoice data
    const invoiceData = {
        invoiceNumber: invoiceNumberEl.value,
        economicActivity: economicActivityEl.value,
        nitci: nitciEl.value,
        businessName: businessNameEl.value,
        email: emailEl.value,
        products: invoiceProducts,
        subtotal: parseFloat(summarySubtotalEl.textContent),
        discount: parseFloat(summaryDiscountEl.textContent),
        total: parseFloat(summaryTotalEl.textContent)
    };
    
    // Basic validation
    if (!invoiceData.nitci || !invoiceData.businessName || invoiceData.products.length === 0) {
        showError('Please fill in all required fields and add at least one product.');
        return;
    }
    
    // Show loading indicator
    // TODO: Implement loading indicator
    
    // Create AJAX request
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'save_invoice.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    
    xhr.onload = function() {
        if (this.status === 200) {
            try {
                const response = JSON.parse(this.responseText);
                
                if (response.success) {
                    // Show success message
                    showSuccess('Invoice saved successfully! Invoice #' + response.invoiceId);
                    
                    // Clear form for new invoice
                    clearInvoiceForm();
                } else {
                    // Show error message
                    showError('Error saving invoice: ' + response.message);
                }
            } catch (e) {
                console.error('Error parsing save response:', e);
                showError('Error processing server response. Please try again.');
            }
        } else {
            console.error('Error saving invoice. Status:', this.status);
            showError('Error connecting to server. Please try again.');
        }
    };
    
    xhr.onerror = function() {
        console.error('Network error while saving invoice');
        showError('Network error. Please check your connection and try again.');
    };
    
    xhr.send(JSON.stringify(invoiceData));*/
}

function verficarComunicaion(){
    $.ajax({
        type:'POST',
        url: `${base_url}/Facturas/verificarComunicacion`,
        cache: false,
        dataType: 'json',
        success: function(data){
            if(data!='WSDL'){
                if(data.RespuestaComunicacion.transaccion==true){
                    //colocar al input
                    document.getElementById('badgeComuni').innerHTML = data.RespuestaComunicacion.mensajesList.descripcion;
                    document.getElementById('badgeComuni').classList.remove('badge-danger');
                    return;
                }
            }
        }
    });
}
function cuis(){
    $.ajax({
        type:'POST',
        url: `${base_url}/Facturas/cuis`,
        cache: false,
        dataType: 'json',
        success: function(data){
            if(data!='WSDL'){
                if(data.RespuestaCuis.transaccion==true || data.RespuestaCuis.mensajesList.codigo==980){
                    //colocar al input
                    console.log(data.RespuestaCuis.codigo);
                    document.getElementById('cuis').innerHTML = data.RespuestaCuis.codigo;
                    return;
                }
            }
        }
    });
}
function cufd(){
    $.ajax({
        type:'POST',
        url: `${base_url}/Facturas/cufd`,
        cache: false,
        dataType: 'json',
        success: function(data){
            if(data!='WSDL'){
                if(data.RespuestaCufd.transaccion==true){
                    //colocar al input
                    document.getElementById('cufd').innerHTML = data.RespuestaCufd.codigo;
                    return;
                }
            }
        }
    });
}

// Clear entire invoice form
function clearInvoiceForm() {
    // Clear customer info
    nitciEl.value = '';
    businessNameEl.value = '';
    emailEl.value = '';
    
    // Clear products
    invoiceProducts = [];
    renderProductTable();
    updateSummary();
    
    // Clear product form
    clearProductForm();
    
    // Generate new invoice number
    const currentInvoiceNumber = parseInt(invoiceNumberEl.value) || 0;
    invoiceNumberEl.value = (currentInvoiceNumber + 1).toString();
}

// Show error message
function showError(message) {
    // You can implement this with a toast notification or alert
    alert(message);
}

// Show success message
function showSuccess(message) {
    // You can implement this with a toast notification or alert
    alert(message);
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', initPage);