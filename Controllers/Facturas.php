<?php
class Facturas extends Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->views->getView($this,'index');
    }
    public function listar() {
        $data = $this->model->listar();
        foreach($data as &$obj){
            // Generar el atributo "acciones" con botones para editar y eliminar
            $obj['acciones'] = "<button class='btn btn-sm' data-id='" . $obj['id_factura'] . "'><i class='far fa-edit'></i></button> ";
            $obj['acciones'] .= "<button class='btn btn-sm' data-id='" . $obj['id_factura'] . "'>".($obj['factura_estado']?"<i class='fas fa-minus-circle'></i>": "<i class='fas fa-check-circle'></i>")."</button>";
            // Colocamos el estado en literal
            $obj['factura_estado'] = ($obj['factura_estado'] == 0) ? '<span class="badge badge-danger">Inactivo</span>': '<span class="badge badge-success">Activo</span>';
        }
        // Responder con JSON directamente
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        exit();
    }
    public function nuevo_pedido() {
        $this->requireAuth();
        $this->views->getView($this,'nuevo_pedido');
    }
    public function buscar_cliente(){
        $doc = $_POST['doc'];
        echo json_encode('Hola');
    }
    public function verificarComunicacion(){
        require 'Siat.php';
        $siat = new Siat();
        $res = $siat->verificarComunicacion();
        echo json_encode($res);
    }
    public function cuis(){
        require 'Siat.php';
        $siat = new Siat();
        $res = $siat->cuis();
        if($res->RespuestaCuis->mensajesList->codigo ==980){
            $_SESSION['scuis'] = $res->RespuestaCuis->codigo;
            $_SESSION['svigenciaFechaCuis'] = $res->RespuestaCuis->fechaVigencia;
        }
        echo json_encode($res);
    }
    public function cufd(){
        require 'Siat.php';
        $siat = new Siat();
        $res = $siat->cufd();
        echo json_encode($res);
    }
    public function sincronizarActividades(){
        require 'Siat.php';
        $siat = new Siat();
        $res = $siat->sincronizarActividades();
        echo json_encode($res);
    }
    public function sincronizarListaProductosServicios(){
        require 'Siat.php';
        $siat = new Siat();
        $res = $siat->sincronizarListaProductosServicios();
        echo json_encode($res);
    }
    public function sincronizarListaLeyendasFactura(){
        require 'Siat.php';
        $siat = new Siat();
        $res = $siat->sincronizarListaLeyendasFactura();
        echo json_encode($res);
    }
    public function sincronizarListaMensajesServicios(){
        require 'Siat.php';
        $siat = new Siat();
        $res = $siat->sincronizarListaMensajesServicios();
        echo json_encode($res);
    }
    public function sincronizarParametricaTipoDocumentoIdentidad(){
        require 'Siat.php';
        $siat = new Siat();
        $res = $siat->sincronizarParametricaTipoDocumentoIdentidad();
        echo json_encode($res);
    }
    public function sincronizarParametricaUnidadMedida(){
        require 'Siat.php';
        $siat = new Siat();
        $res = $siat->sincronizarParametricaUnidadMedida();
        echo json_encode($res);
    }
    public function emitirFactura() {
        // Comprimir a un formato gzip
        $archivoXml = '';
        $file = fopen("docs/factura.xml","r");
        while(!feof($file)){
            $linea = fgets($file);
            $archivoXml .= $linea;
        }
        fclose($file);
        $gzip = gzencode($archivoXml,9);
        $file = fopen("docs/factura.xml.gz","w");
        fwrite($file,$gzip);
        fclose($file);
        $archivo = $gzip;
        // Cifrar a SHA-256
        $hashArchivo = hash("sha256",$archivoXml);
        //Envio
        require "Siat.php";
        $siat = new Siat();
        $res = $siat->recepcionFactura($archivo,'',$hashArchivo);
        echo json_encode($res);
    }
    public function imprimirFactura() {
    }
}
?>