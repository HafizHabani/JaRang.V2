<?php
use PHPUnit\Framework\TestCase;
require_once "login.php";

class logintest extends TestCase
{
    public function testValidateFrom()
    {
        $Login = new login();
        
        $fakeData = [
            'email' => 'Hafiz@gmail.com',
            'password' => 'Hafiz321',
        ];

        $result = $Login->validateForm($fakeData);
        
        $this->assertTrue($result);
    }
}

?>