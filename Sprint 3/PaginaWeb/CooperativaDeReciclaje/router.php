<?php
    require_once 'controllers/Controller.php';
    require_once 'controllers/ControllerCartonero.php';
    require_once 'controllers/ControllerMaterialAceptado.php';
    require_once 'controllers/ControllerRetiroMaterial.php';
    require_once 'controllers/ControllerRecoleccionMaterial.php';
    require_once 'controllers/ControllerSession.php';
    require_once 'routerclass.php';
    
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    $router = new Router();

    $router->addRoute("home", "GET", "Controller", "viewHome");
    // $router->addRoute("materiales", "GET", "ControllerMaterial", "viewMateriales");


    $router->addRoute("retiro", "GET", "ControllerRetiroMaterial", "viewRetiro");
    $router->addRoute("retiro", "POST", "ControllerRetiroMaterial", "retiro");

    

    //---- SPRINT 2 ----
    
    $router->addRoute("recoleccion", "GET", "ControllerRecoleccionMaterial", "buscarRecolecciones");
    $router->addRoute("buscarRecoleccionPorDNI", "POST", "ControllerRecoleccionMaterial", "buscarRecoleccionesPorDNI");
    $router->addRoute("recoleccion", "POST", "ControllerRecoleccionMaterial", "cargarRecoleccion");

    $router->addRoute("listadoPedidoRetiro", "GET", "ControllerRetiroMaterial", "viewListaRetiros");

    $router->addRoute("materialesAceptados", "GET", "ControllerMaterialAceptado", "viewMaterialesAceptados");
    $router->addRoute("material_aceptado", "POST", "ControllerMaterialAceptado", "insertMaterialAceptado");
    $router->addRoute("modificar_material", "POST", "ControllerMaterialAceptado", "updateMaterialAceptado");
    $router->addRoute("editar_material/:ID", "GET", "ControllerMaterialAceptado", "editarMaterialAceptado");
    $router->addRoute("borrar_material/:ID", "GET", "ControllerMaterialAceptado", "deleteMaterialAceptado");
    //--------

    //---- SPRINT 3 ----
    $router->addRoute("login", "GET", "ControllerSession", "viewLogin");
    $router->addRoute("verificarUsuario", "POST", "ControllerSession", "verificarUsuario");
    $router->addRoute("logout", "GET", "ControllerSession", "logout");

    $router->addRoute("materiales_acopiados", "GET", "ControllerRecoleccionMaterial", "viewMaterialesAcopiados");
    $router->addRoute("cartoneros", "GET", "ControllerCartonero", "viewCartoneros");
    $router->addRoute("editar_cartonero/:ID", "GET", "ControllerCartonero", "editarCartonero");
    $router->addRoute("modificar_cartonero", "POST", "ControllerCartonero", "updateCartonero");
    $router->addRoute("cartonero", "POST", "ControllerCartonero", "insertCartonero");
    $router->addRoute("borrar_cartonero/:ID", "GET", "ControllerCartonero", "borrarCartonero");
    //--------

    $router->setDefaultRoute("Controller", "viewHome");

    $router->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
