<?php

class authView
{
    private $username;

    function __construct($username)
    {
        $this->username = $username;
    }

    function showLogin($error = '')
    {
        require_once 'templates/header.phtml';
        require_once 'templates/form_login.phtml';
        require_once 'templates/footer.phtml';
    }
}
