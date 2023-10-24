<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\identitas;
use Mockery;
use Tests\TestCase;

use App\Models\pendidikan; // Gantilah dengan namespace yang sesuai dengan model pendidikan di aplikasi Anda

class PendidikanTest extends TestCase
{
    // Tambah data valid
    public function testCreatePendidikan()
    {
        $identitas = Identitas::find(1); // Ganti dengan ID yang benar
        $data = [
            'nama_instansi' => 'Stanford University',
            'nama_jurusan' => 'Master of Business Administration',
            'tahun_masuk' => '2019',
            'tahun_lulus' => '2021',
        ];
        $data['identitas_id'] = $identitas->id;
        $pendidikan = Pendidikan::create($data);

        $this->assertNotNull($pendidikan);
        $this->assertEquals('Stanford University', $pendidikan->nama_instansi);
        $this->assertEquals('Master of Business Administration', $pendidikan->nama_jurusan);
        $this->assertEquals('2019', $pendidikan->tahun_masuk);
        $this->assertEquals('2021', $pendidikan->tahun_lulus);
    }

    /*
    public function testReadPendidikan() {
        // Data yang akan diuji untuk operasi Read (Contoh)
        $pendidikan = Pendidikan::find(1); // Gantilah dengan cara membaca pendidikan sesuai dengan aplikasi Anda

        $this->assertInstanceOf(Pendidikan::class, $pendidikan);
    }

    public function testUpdatependidikan() {
        // Data yang akan diuji untuk operasi Update (Contoh)
        $pendidikan = Pendidikan::find(1); // Gantilah dengan cara membaca pendidikan yang akan diperbarui

        $pendidikan->nama_instansi = 'Updated pendidikan Name'; // Gantilah dengan data perubahan yang sesuai
        $pendidikan->nama_jurusan = '90';
        $pendidikan->tahun_masuk = '2020';
        $pendidikan->tahun_lulus = '2022';
        $pendidikan->save(); // Gantilah dengan cara menyimpan perubahan sesuai dengan aplikasi Anda

        $updatedpendidikan = pendidikan::find(1); // Gantilah dengan cara membaca pendidikan yang telah diperbarui

        $this->assertEquals('Updated pendidikan Name', $updatedpendidikan->nama_instansi);
        $this->assertEquals('Updated pendidikan Persen', $updatedpendidikan->nama_jurusan);
        $this->assertEquals('Updated pendidikan Persen', $updatedpendidikan->tahun_masuk);
        $this->assertEquals('Updated pendidikan Persen', $updatedpendidikan->tahun_lulus);
    }

    public function testDeletePendidikan() {
        // Data yang akan diuji untuk operasi Delete (Contoh)
        $pendidikan = Pendidikan::find(1); // Gantilah dengan cara membaca pendidikan yang akan dihapus

        $deleted = $pendidikan->delete(); // Gantilah dengan cara menghapus pendidikan sesuai dengan aplikasi Anda

        $this->assertTrue($deleted);
        $this->assertNull(pendidikan::find(1)); // Memastikan pendidikan telah dihapus
    }
    */
}
?>