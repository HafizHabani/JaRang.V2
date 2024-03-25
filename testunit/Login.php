<?php

class Login
{
    public function validateForm($data)
    {
        $errors = [];

        if (empty ($data['email'])) {
            $errors['email'] = 'email tidak boleh kosong';
        }

        if (empty ($data['password'])) {
            $errors['password'] = 'password tidak boleh kosong';
        }

        if (!empty ($errors)) {
            return $errors;
        }

        return true;
    }
}
?>