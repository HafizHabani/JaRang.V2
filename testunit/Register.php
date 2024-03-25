<?php

class Register
{
    public function validateForm($data)
    {
        $errors = [];

        if (empty ($data['username'])) {
            $errors['username'] = 'username tidak boleh kosong';
        }

        if (empty ($data['email'])) {
            $errors['email'] = 'email tidak boleh kosong';
        }

        if (empty ($data['password'])) {
            $errors['password'] = 'password tidak boleh kosong';
        }

        if (empty($data['cpassword'])) {
            $errors['cpassword'] = 'Confirm password tidak boleh kosong';
        } elseif ($data['password'] !== $data['cpassword']) {
            $errors['cpassword'] = 'Confirm password harus sama dengan password';
        }

        if (!empty ($errors)) {
            return $errors;
        }

        return true;
    }
}
?>