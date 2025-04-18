<?php
class Siat  {
    private static $wsdl = wsdl;
    private static $api_key = 'apikey: TokenApi '.token;
    public function verificarComunicacion() {
        
        $opciones = array(
            'http'=>array(
                'header' => self::$api_key,
                'timeout' => 5, //Espera de comunicacion con SIAT
            )
        );

        $contexto = stream_context_create($opciones);
        try{
            $cliente = new SoapClient(
                self::$wsdl,
                [
                    'stream_context' => $contexto,
                    'cache_wsdl' => WSDL_CACHE_NONE,
                    'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP| SOAP_COMPRESSION_DEFLATE
                ]
            );
            $resultado = $cliente->verificarComunicacion();
        }catch( SoapFault $e){
            $resultado = $e->faultcode;
        }
        return $resultado;
    }
    public function cuis() {
        // Parámetros
        $codigoAmbiente = 2;
        $codigoModalidad = 2;
        $codigoPuntoVenta = 0;
        $codigoSistema = "81699A7814CC5D46ED15D76";
        $codigoSucursal = 0;
        $nit = 4247012018;
    
        $parametros = array (
            "SolicitudCuis" => array(
                'codigoAmbiente' => $codigoAmbiente,
                'codigoModalidad' => $codigoModalidad,
                'codigoPuntoVenta' => $codigoPuntoVenta,
                'codigoSistema' => $codigoSistema,
                'codigoSucursal' => $codigoSucursal,
                'nit' => $nit
            )
        );
    
        $opciones = array(
            "http" => array(
                'header' => self::$api_key,
                'timeout' => 5,
            )
        );
    
        $contexto = stream_context_create($opciones);
    
        try {
            $cliente = new SoapClient(
                self::$wsdl,
                [
                    'stream_context' => $contexto,
                    'cache_wsdl' => WSDL_CACHE_NONE,
                    'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE
                ]
            );
    
            // Llamada correcta al método
            $resultado = $cliente->cuis($parametros);
    
            return $resultado;
        } catch (SoapFault $e) {
            return $e->faultcode;
        }
    }
    public function cufd() {
        // Parámetros
        $codigoAmbiente = 2;
        $codigoModalidad = 2;
        $codigoPuntoVenta = 0;
        $codigoSistema = "81699A7814CC5D46ED15D76";
        $codigoSucursal = 0;
        $cuis = '43FDB877';
        $nit = 4247012018;
        //BQT5CTcKhWUVBODUQ0NkVEMTVENzY=Q3lEMWZVV0RaVUFE2OTlBNzgxNENDN
        //BQT5CTcKhWUVBODUQ0NkVEMTVENzY=Q1VKV2dVV0RaVUFE2OTlBNzgxNENDN
        $parametros = array (
            "SolicitudCufd" => array(
                'codigoAmbiente' => $codigoAmbiente,
                'codigoModalidad' => $codigoModalidad,
                'codigoPuntoVenta' => $codigoPuntoVenta,
                'codigoSistema' => $codigoSistema,
                'codigoSucursal' => $codigoSucursal,
                'cuis' => $cuis,
                'nit' => $nit
            )
        );
    
        $opciones = array(
            "http" => array(
                'header' => self::$api_key,
                'timeout' => 5,
            )
        );
    
        $contexto = stream_context_create($opciones);
    
        try {
            $cliente = new SoapClient(
                self::$wsdl,
                [
                    'stream_context' => $contexto,
                    'cache_wsdl' => WSDL_CACHE_NONE,
                    'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE
                ]
            );
    
            // Llamada correcta al método
            $resultado = $cliente->cufd($parametros);
    
            return $resultado;
        } catch (SoapFault $e) {
            return $e->faultcode;
        }
    }
    public function sincronizarActividades() {
        $wsdl = "https://pilotosiatservicios.impuestos.gob.bo/v2/FacturacionSincronizacion";
        $codigoAmbiente = 2;
        $codigoPuntoVenta = 0;
        $codigoSistema = '81699A7814CC5D46ED15D76';
        $codigoSucursal = 0;
        $cuis = '43FDB877';
        $nit = 4247012018;

        $parametros = array (
            "SolicitudSincronizacion" => array(
                'codigoAmbiente' => $codigoAmbiente,
                'codigoPuntoVenta' => $codigoPuntoVenta,
                'codigoSistema' => $codigoSistema,
                'codigoSucursal' => $codigoSucursal,
                'cuis' => $cuis,
                'nit' => $nit
            )
        );
        $opciones = array(
            "http" => array(
                'header' => self::$api_key,
                'timeout' => 5,
            )
        );
        $contexto = stream_context_create($opciones);
    
        try {
            $cliente = new SoapClient(
                $wsdl,
                [
                    'stream_context' => $contexto,
                    'cache_wsdl' => WSDL_CACHE_NONE,
                    'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE
                ]
            );
    
            // Llamada correcta al método
            $resultado = $cliente->sincronizarActividades($parametros);
    
            return $resultado;
        } catch (SoapFault $e) {
            return $e->faultcode;
        }
    }
    public function sincronizarListaProductosServicios() {
        $wsdl = "https://pilotosiatservicios.impuestos.gob.bo/v2/FacturacionSincronizacion";
        $codigoAmbiente = 2;
        $codigoPuntoVenta = 0;
        $codigoSistema = '81699A7814CC5D46ED15D76';
        $codigoSucursal = 0;
        $cuis = '43FDB877';
        $nit = 4247012018;

        $parametros = array (
            "SolicitudSincronizacion" => array(
                'codigoAmbiente' => $codigoAmbiente,
                'codigoPuntoVenta' => $codigoPuntoVenta,
                'codigoSistema' => $codigoSistema,
                'codigoSucursal' => $codigoSucursal,
                'cuis' => $cuis,
                'nit' => $nit
            )
        );
        $opciones = array(
            "http" => array(
                'header' => self::$api_key,
                'timeout' => 5,
            )
        );
        $contexto = stream_context_create($opciones);
    
        try {
            $cliente = new SoapClient(
                $wsdl,
                [
                    'stream_context' => $contexto,
                    'cache_wsdl' => WSDL_CACHE_NONE,
                    'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE
                ]
            );
    
            // Llamada correcta al método
            $resultado = $cliente->sincronizarListaProductosServicios($parametros);
    
            return $resultado;
        } catch (SoapFault $e) {
            return $e->faultcode;
        }
    }
    public function sincronizarListaLeyendasFactura() {
        $codigoAmbiente = 2;
        $codigoPuntoVenta = 0;
        $codigoSistema = '81699A7814CC5D46ED15D76';
        $codigoSucursal = 0;
        $cuis = '43FDB877';
        $nit = 4247012018;

        $parametros = array (
            "SolicitudSincronizacion" => array(
                'codigoAmbiente' => $codigoAmbiente,
                'codigoPuntoVenta' => $codigoPuntoVenta,
                'codigoSistema' => $codigoSistema,
                'codigoSucursal' => $codigoSucursal,
                'cuis' => $cuis,
                'nit' => $nit
            )
        );
        $opciones = array(
            "http" => array(
                'header' => self::$api_key,
                'timeout' => 5,
            )
        );
        $contexto = stream_context_create($opciones);
    
        try {
            $cliente = new SoapClient(
                self::$wsdl,
                [
                    'stream_context' => $contexto,
                    'cache_wsdl' => WSDL_CACHE_NONE,
                    'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE
                ]
            );
    
            // Llamada correcta al método
            $resultado = $cliente->sincronizarListaLeyendasFactura($parametros);
    
            return $resultado;
        } catch (SoapFault $e) {
            return $e->faultcode;
        }
    }
    public function sincronizarListaMensajesServicios() {
        $codigoAmbiente = 2;
        $codigoPuntoVenta = 0;
        $codigoSistema = '81699A7814CC5D46ED15D76';
        $codigoSucursal = 0;
        $cuis = '43FDB877';
        $nit = 4247012018;

        $parametros = array (
            "SolicitudSincronizacion" => array(
                'codigoAmbiente' => $codigoAmbiente,
                'codigoPuntoVenta' => $codigoPuntoVenta,
                'codigoSistema' => $codigoSistema,
                'codigoSucursal' => $codigoSucursal,
                'cuis' => $cuis,
                'nit' => $nit
            )
        );
        $opciones = array(
            "http" => array(
                'header' => self::$api_key,
                'timeout' => 5,
            )
        );
        $contexto = stream_context_create($opciones);
    
        try {
            $cliente = new SoapClient(
                self::$wsdl,
                [
                    'stream_context' => $contexto,
                    'cache_wsdl' => WSDL_CACHE_NONE,
                    'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE
                ]
            );
    
            // Llamada correcta al método
            $resultado = $cliente->sincronizarListaMensajesServicios($parametros);
    
            return $resultado;
        } catch (SoapFault $e) {
            return $e->faultcode;
        }
    }
    public function sincronizarParametricaTipoDocumentoIdentidad() {
        $codigoAmbiente = 2;
        $codigoPuntoVenta = 0;
        $codigoSistema = '81699A7814CC5D46ED15D76';
        $codigoSucursal = 0;
        $cuis = '43FDB877';
        $nit = 4247012018;

        $parametros = array (
            "SolicitudSincronizacion" => array(
                'codigoAmbiente' => $codigoAmbiente,
                'codigoPuntoVenta' => $codigoPuntoVenta,
                'codigoSistema' => $codigoSistema,
                'codigoSucursal' => $codigoSucursal,
                'cuis' => $cuis,
                'nit' => $nit
            )
        );
        $opciones = array(
            "http" => array(
                'header' => self::$api_key,
                'timeout' => 5,
            )
        );
        $contexto = stream_context_create($opciones);
    
        try {
            $cliente = new SoapClient(
                self::$wsdl,
                [
                    'stream_context' => $contexto,
                    'cache_wsdl' => WSDL_CACHE_NONE,
                    'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE
                ]
            );
    
            // Llamada correcta al método
            $resultado = $cliente->sincronizarParametricaTipoDocumentoIdentidad($parametros);
    
            return $resultado;
        } catch (SoapFault $e) {
            return $e->faultcode;
        }
    }
    public function sincronizarParametricaUnidadMedida() {
        $codigoAmbiente = 2;
        $codigoPuntoVenta = 0;
        $codigoSistema = '81699A7814CC5D46ED15D76';
        $codigoSucursal = 0;
        $cuis = '43FDB877';
        $nit = 4247012018;

        $parametros = array (
            "SolicitudSincronizacion" => array(
                'codigoAmbiente' => $codigoAmbiente,
                'codigoPuntoVenta' => $codigoPuntoVenta,
                'codigoSistema' => $codigoSistema,
                'codigoSucursal' => $codigoSucursal,
                'cuis' => $cuis,
                'nit' => $nit
            )
        );
        $opciones = array(
            "http" => array(
                'header' => self::$api_key,
                'timeout' => 5,
            )
        );
        $contexto = stream_context_create($opciones);
    
        try {
            $cliente = new SoapClient(
                self::$wsdl,
                [
                    'stream_context' => $contexto,
                    'cache_wsdl' => WSDL_CACHE_NONE,
                    'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE
                ]
            );
    
            // Llamada correcta al método
            $resultado = $cliente->sincronizarParametricaUnidadMedida($parametros);
    
            return $resultado;
        } catch (SoapFault $e) {
            return $e->faultcode;
        }
    }
    public function recepcionFactura($archivo, $fechaEmision, $hashArchivo) {
        $wsdl = "https://pilotosiatservicios.impuestos.gob.bo/v2/ServicioFacturacionCompraVenta";
        $codigoAmbiente = 2;
        $codigoDocumentoSector = 1;
        $codigoEmision = 1; //En linea
        $codigoModalidad = 2; //Computarix¿zada en linea
        $codigoPuntoVenta = 0;
        $codigoSistema = '81699A7814CC5D46ED15D76';
        $codigoSucursal = 0;
        $cufd = '';
        $cuis = '43FDB877';
        $nit = 4247012018;
        $tipoFacturaDocumento = 1; //Factura con derecho a credito fiscal
        $archivo = $archivo;
        $fechaEnvio = $fechaEmision;
        $hashArchivo = $hashArchivo;

        $parametros = array (
            "SolicitudServicioRecepcionFactura" => array(
                'codigoAmbiente' => $codigoAmbiente,
                'codigoDocumentoSector' => $codigoDocumentoSector,
                'codigoEmision' => $codigoEmision,
                'codigoModalidad' => $codigoModalidad,
                'codigoPuntoVenta' => $codigoPuntoVenta,
                'codigoSistema' => $codigoSistema,
                'codigoSucursal' => $codigoSucursal,
                'cufd' => $cufd,
                'cuis' => $cuis,
                'nit' => $nit,
                'tipoFacturaDocumento' => $tipoFacturaDocumento,
                'fechaEnvio' => $fechaEnvio,
                'hashArchivo' => $hashArchivo
            )
        );
        $opciones = array(
            "http" => array(
                'header' => self::$api_key,
                'timeout' => 5,
            )
        );
        $contexto = stream_context_create($opciones);
    
        try {
            $cliente = new SoapClient(
                self::$wsdl,
                [
                    'stream_context' => $contexto,
                    'cache_wsdl' => WSDL_CACHE_NONE,
                    'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE
                ]
            );
    
            // Llamada correcta al método
            $resultado = $cliente->sincronizarParametricaUnidadMedida($parametros);
    
            return $resultado;
        } catch (SoapFault $e) {
            return $e->faultcode;
        }
    }

}
?>