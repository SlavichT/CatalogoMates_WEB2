<?php
require_once('app/models/user_model.php');
require_once('app/views/auth_view.php');
require_once('app/helpers/auth_helper.php');

class authController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new userModel();
        $username = authHelper::getUsername();
        $this->view = new authView($username);
    }


    //Muestra la plantilla del login
    public function showLogin()
    {
        return $this->view->showLogin();
    }


    //Verifica todos los datos del login
    public function login()
    {

        //Verificamos los datos
        if (!isset($_POST['username']) || empty($_POST['username'])) {
            return $this->view->showLogin('Falta completar el nombre de usuario');
        }
        if (!isset($_POST['password']) || empty($_POST['password'])) {
            return $this->view->showLogin('Falta completar la contraseña');
        }

        $username = $_POST['username'];
        $password = $_POST['password'];



        //Tenemos como usuario : webadmin y su contraseña admin (en este caso hasheada = $2y$10$.WoEuCMaMPTfNhJmqba.yeseGNBtlL8wIPcix0BGg3sUbimlBhety)
        //Traemos el user del model

        $userDB = $this->model->getUserByUsername($username);

        if ($userDB && password_verify($password, $userDB->password)) {

            authHelper::login($userDB);

            header('Location: ' . BASE_URL);
        } else {
            return $this->view->showLogin('Credenciales incorrectas');
        }
    }


    public function logout()
    {
        session_start();
        session_destroy();
        header('Location:' . BASE_URL);
    }
}
