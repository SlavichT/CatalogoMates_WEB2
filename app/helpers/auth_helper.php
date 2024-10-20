<?php

class authHelper
{
    public static function init()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function login($user)
    {
        authHelper::init();
        $_SESSION['ID_USER'] = $user->user;
        $_SESSION['USER_NAME'] = $user->username;
        $_SESSION['IS_LOGGED'] = true;
    }

    public static function getUsername()
    {
        authHelper::init();
        if (isset($_SESSION['USER_NAME'])) {
            return $_SESSION['USER_NAME'];
        };
    }

    public static function verify()
    {
        authHelper::init();
        if (!isset($_SESSION['USER_NAME'])) {
            header('Location: ' . BASE_URL . 'login');
            die();
        }
    }

    public static function logout()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        session_destroy();
    }
}
