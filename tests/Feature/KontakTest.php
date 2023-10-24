<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\identitas;
use Mockery;
use Tests\TestCase;

use App\Models\kontak; // Gantilah dengan namespace yang sesuai dengan model kontak di aplikasi Anda

class KontakTest extends TestCase
{
    // Tambah data valid
    public function testCreateKontak()
    {
        $identitas = Identitas::find(1); // Ganti dengan ID yang benar
        $data = [
            'email' => 'hanni.pham@gmail.com',
            'alamat' => '198 West 21th Street, Suite 721 New York NY 10016',
            'no_telepon' => '+621234567890'
        ];
        $data['identitas_id'] = $identitas->id;
        $kontak = Kontak::create($data);

        $this->assertNotNull($kontak);
        $this->assertEquals('hanni.pham@gmail.com', $kontak->email);
        $this->assertEquals('198 West 21th Street, Suite 721 New York NY 10016', $kontak->alamat);
        $this->assertEquals('+621234567890', $kontak->no_telepon);
    }

    /*
    public function testReadKontak() {
        // Data yang akan diuji untuk operasi Read (Contoh)
        $kontak = Kontak::find(1); // Gantilah dengan cara membaca kontak sesuai dengan aplikasi Anda

        $this->assertInstanceOf(Kontak::class, $kontak);
    }

    public function testUpdateKontak() {
        // Data yang akan diuji untuk operasi Update (Contoh)
        $kontak = Kontak::find(1); // Gantilah dengan cara membaca kontak yang akan diperbarui

        $kontak->email = 'Updated kontak Name'; // Gantilah dengan data perubahan yang sesuai
        $kontak->alamat = 'Updated';
        $kontak->no_telepon = 'Updated';
        $kontak->save(); // Gantilah dengan cara menyimpan perubahan sesuai dengan aplikasi Anda

        $updatedkontak = kontak::find(1); // Gantilah dengan cara membaca kontak yang telah diperbarui

        $this->assertEquals('Updated kontak Name', $updatedkontak->email);
        $this->assertEquals('Updated kontak Name', $updatedkontak->alamat);
        $this->assertEquals('Updated kontak Name', $updatedkontak->no_telepon);
    }

    public function testDeleteKontak() {
        // Data yang akan diuji untuk operasi Delete (Contoh)
        $kontak = Kontak::find(1); // Gantilah dengan cara membaca kontak yang akan dihapus

        $deleted = $kontak->delete(); // Gantilah dengan cara menghapus kontak sesuai dengan aplikasi Anda

        $this->assertTrue($deleted);
        $this->assertNull(Kontak::find(1)); // Memastikan kontak telah dihapus
    }
    */
}
?>