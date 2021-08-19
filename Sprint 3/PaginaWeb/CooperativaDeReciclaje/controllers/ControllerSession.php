<?php
require_once './models/ModelUsuario.php';
require_once './views/ViewSession.php';
require_once 'helper.php';

class ControllerSession
{

    private $viewSession;
    private $modelSession;
    private $helper;

    function __construct() {
        $this->viewSession = new ViewSession();
        $this->modelSession = new ModelUsuario();
        $this->helper = new Helper();
    }

    function viewLogin() {
        $logged = $this->helper->checkLoggedIn();
        $this->viewSession->mostrarFormularioLogin($logged);
    }

    function verificarUsuario()
    {
        $logged = $this->helper->checkLoggedIn();
        $email=$_POST['inputEmail'];
        $password=$_POST['inputPassword'];
        if (empty($email) || !isset($email) || empty($password) || !isset($password))
        {
            $this->viewSession->mostrarMensaje("danger", "No se pudo iniciar sesion. Por favor complete todos los campos.", $logged);
        }
        else
        {
            $usuarioDB=$this->modelSession->getUsuario($email);
            if(isset($usuarioDB) && $usuarioDB)
            {
                if(password_verify($password, $usuarioDB->password))
                {
                    session_start();
                    $_SESSION["email"] = $usuarioDB->mail_usuario;
                    $_SESSION["password"] = $usuarioDB->password;
                    $this->viewSession->homeLocation();
                }
                else
                {
                    $this->viewSession->mostrarMensaje("danger", "La password ingresada es incorrecta. Por favor intente nuevamente", $logged);
                }
            }
            else
            {
                $this->viewSession->mostrarMensaje("danger", "El email ingresado no esta registrado. Por favor intente nuevamente", $logged);
            }
        }
    }

    function logout(){
        session_start();
        session_destroy();
        $this->viewSession->homeLocation('home');
    }
}