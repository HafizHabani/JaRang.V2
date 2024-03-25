<?php
use PHPUnit\Framework\TestCase;
require_once "Register.php";

class registertest extends TestCase
{
    public function testValidateFrom()
    {
        $Register = new register();
        
        $fakeData = [
            'username' => 'HafizHabani',
            'email' => 'Hafiz@gmail.com',
            'password' => 'Hafiz321',
            'cpassword' => 'Hafiz321'
            
        ];

        $result = $Register->validateForm($fakeData);
        
        $this->assertTrue($result);
    }
}

?>