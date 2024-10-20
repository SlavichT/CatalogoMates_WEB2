<?php

class AuthView {
    private $user = null;

    public function showSignup($error = '') {
        require 'templates/form_signup.phtml';
    }
}