<?php
use PHPUnit\Framework\TestCase;
require_once "datapengirimanbarang.php";

class datapengirimanbarangtest extends TestCase
{
    public function testValidateFrom()
    {
        $Datapengirimanbarang = new Datapengiriman();
        
        $fakeData = [
            'namakirim' => 'Aether',
            'alamatkirim' => 'Jl.Celestia',
            'nohpkirim' => '0811223344',
            'namaterima' => 'Lumine',
            'alamatterima' => 'Jl.Abyysal',
            'nohpterima' => '0899887766',
            'jumlahbarang' => '2',
            'namabarang' => 'Celestia Liquid',
            'kondisibarang' => 'Packing Kayu',
            'beratbarang' => '50kg',
        ];

        $result = $Datapengirimanbarang->validateForm($fakeData);
        
        $this->assertTrue($result);
    }
}

?>