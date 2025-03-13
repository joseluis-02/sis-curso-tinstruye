<?php
// Iniciamos la sesión del sistema
session_start();
//Cargamos las configuraciones para el sistema
require_once 'Config/Config.php';
$ruta = !empty($_GET['url']) ? $_GET['url'] : 'Home';
$array = explode('/',$ruta);
//echo json_encode($array);
$controller = $array[0];
$metodo = 'index';
$parametros = '';
//Validamos metodo
if(!empty($array[1])){
    if(!empty($array[1])!=""){
        $metodo = $array[1];
    }
}
//Validamos parametros
if(!empty($array[2])){
    if(!empty($array[2])!=""){
        for($i=2;$i<count($array);$i++){
            $parametros .= $array[$i].',';
        }
        $parametros = trim($parametros,',');
    }
}
// Autoload
require_once 'Config/App/autoload.php';
//Validar controlador
$dirController = 'Controllers/'.$controller.'.php';
if(file_exists($dirController)){
    require_once($dirController);
    $controller = new $controller();
    if(method_exists($controller,$metodo)){
        $controller->{$metodo}($parametros);
    }else{
        echo 'Método no encontrado';
    }
}else{
    echo 'Controlador no encontrado';
}
//$parametros = $array[2];
?>