<?php

class Profil
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

        if (empty ($data['opassword'])) {
            $errors['opassword'] = 'Old password tidak boleh kosong';
        }

        if (empty($data['cpassword'])) {
            $errors['cpassword'] = 'Confirm password tidak boleh kosong';
        } elseif ($data['password'] !== $data['cpassword']) {
            $errors['cpassword'] = 'Confirm password harus sama dengan password';
        }

        if ($data['password'] === $data['opassword']) {
            $errors['opassword'] = 'Old password tidak boleh sama dengan password baru';
        }

        if (!empty ($errors)) {
            return $errors;
        }

        return true;
    }
}
?>