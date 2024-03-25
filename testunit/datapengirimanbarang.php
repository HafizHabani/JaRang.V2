<?php

class Datapengiriman
{
    public function validateForm($data)
    {
        $errors = [];

        if (empty ($data['namakirim'])) {
            $errors['namakirim'] = 'nama tidak boleh kosong';
        }

        if (empty ($data['alamatkirim'])) {
            $errors['alamatkirim'] = 'alamat tidak boleh kosong';
        }

        if (empty ($data['nohpkirim'])) {
            $errors['nohpkirim'] = 'no hp tidak boleh kosong';
        }elseif (!is_numeric($data['nohpkirim'])) {
            $errors['nohpkirim'] = 'nohpkirim harus berupa angka';
        }

        if (empty ($data['namaterima'])) {
            $errors['namaterima'] = 'nama tidak boleh kosong';
        }

        if (empty ($data['alamatterima'])) {
            $errors['alamatterima'] = 'alamat tidak boleh kosong';
        }

        if (empty ($data['nohpterima'])) {
            $errors['nohpterima'] = 'no hp tidak boleh kosong';
        }elseif (!is_numeric($data['nohpterima'])) {
            $errors['nohpterima'] = 'nohpterima harus berupa angka';
        }

        if (empty ($data['jumlahbarang'])) {
            $errors['jumlahbarang'] = 'jumlah barang tidak boleh kosong';
        }elseif (!is_numeric($data['jumlahbarang'])) {
            $errors['jumlahbarang'] = 'Jumlah barang harus berupa angka';
        }

        if (empty ($data['namabarang'])) {
            $errors['namabarang'] = 'nama barang tidak boleh kosong';
        }

        if (empty ($data['kondisibarang'])) {
            $errors['kondisibarang'] = 'kondisi barang tidak boleh kosong';
        }

        if (empty ($data['beratbarang'])) {
            $errors['beratbarang'] = 'berat barang tidak boleh kosong';
        }

        if (!empty ($errors)) {
            return $errors;
        }

        return true;
    }
}
?>