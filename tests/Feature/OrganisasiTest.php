<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\identitas;
use Mockery;
use Tests\TestCase;

use App\Models\organisasi; // Gantilah dengan namespace yang sesuai dengan model Skill di aplikasi Anda

class OrganisasiTest extends TestCase
{
    // Tambah data valid
    public function testCreateOrganisasi()
    {
        $identitas = Identitas::find(1); // Ganti dengan ID yang benar
        $data = [
            'nama_organisasi' => 'AIESEC',
            'jabatan' => 'Ketua AIESEC',
            'tahun_awal' => '2022',
            'tahun_akhir' => '2023',
        ];
        $data['identitas_id'] = $identitas->id;
        $organisasi = Organisasi::create($data);

        $this->assertNotNull($organisasi);
        $this->assertEquals('AIESEC', $organisasi->nama_organisasi);
        $this->assertEquals('Ketua AIESEC', $organisasi->jabatan);
        $this->assertEquals(2022, $organisasi->tahun_awal);
        $this->assertEquals(2023, $organisasi->tahun_akhir);
    }

    /*
    public function testReadOrganisasi() {
        // Data yang akan diuji untuk operasi Read (Contoh)
        $organisasi = Organisasi::find(1); // Gantilah dengan cara membaca organisasi sesuai dengan aplikasi Anda

        $this->assertInstanceOf(organisasi::class, $organisasi);
    }

    public function testUpdateorganisasi() {
        // Data yang akan diuji untuk operasi Update (Contoh)
        $organisasi = Organisasi::find(1); // Gantilah dengan cara membaca organisasi yang akan diperbarui

        $organisasi->nama_organisasi = 'Updated organisasi Name'; // Gantilah dengan data perubahan yang sesuai
        $organisasi->jabatan = '90';
        $organisasi->tahun_awal = '2020';
        $organisasi->tahun_akhir = '2022';
        $organisasi->save(); // Gantilah dengan cara menyimpan perubahan sesuai dengan aplikasi Anda

        $updatedorganisasi = organisasi::find(1); // Gantilah dengan cara membaca organisasi yang telah diperbarui

        $this->assertEquals('Updated organisasi Name', $updatedorganisasi->nama_organisasi);
        $this->assertEquals('Updated organisasi Persen', $updatedorganisasi->jabatan);
        $this->assertEquals('Updated organisasi Persen', $updatedorganisasi->tahun_awal);
        $this->assertEquals('Updated organisasi Persen', $updatedorganisasi->tahun_akhir);
    }

    public function testDeleteorganisasi() {
        // Data yang akan diuji untuk operasi Delete (Contoh)
        $organisasi = Organisasi::find(1); // Gantilah dengan cara membaca organisasi yang akan dihapus

        $deleted = $organisasi->delete(); // Gantilah dengan cara menghapus organisasi sesuai dengan aplikasi Anda

        $this->assertTrue($deleted);
        $this->assertNull(organisasi::find(1)); // Memastikan organisasi telah dihapus
    }
    */
}
?>