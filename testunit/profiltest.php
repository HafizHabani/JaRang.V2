<?php
use PHPUnit\Framework\TestCase;
require_once "Profil.php";

class profiltest extends TestCase
{
    public function testValidateFrom()
    {
        $Profil = new profil();
        
        $fakeData = [
            'username' => 'HafizHabani',
            'email' => 'Hafiz@gmail.com',
            'password' => 'Rica321',
            'opassword' => 'Hafiz321',
            'cpassword' => 'Rica321'
        ];

        $result = $Profil->validateForm($fakeData);
        
        $this->assertTrue($result);
    }
}

?>