<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\identitas;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\Models\portofolio; // Gantilah dengan namespace yang sesuai dengan model portofolio di aplikasi Anda

class PortofolioTest extends TestCase
{
    // Tambah data valid
    public function testCreatePortofolio()
    {
        $image = UploadedFile::fake()->image('test.jpeg');
        $identitas = Identitas::find(1); // Ganti dengan ID yang benar
        $data = [
            'nama_proyek' => 'RENOVATING NATIONAL GALLERY',
            'deskripsi' => 'Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.',
            'foto_proyek' => $image
        ];
        $data['identitas_id'] = $identitas->id;
        $portofolio = portofolio::create($data);

        $this->assertNotNull($portofolio);
        $this->assertEquals('RENOVATING NATIONAL GALLERY', $portofolio->nama_proyek);
        $this->assertEquals('Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.', $portofolio->deskripsi);
        $this->assertFileExists(storage_path('app/public/' . $portofolio->foto_proyek));
    }

    /*
    public function testReadPortofolio() {
        // Data yang akan diuji untuk operasi Read (Contoh)
        $portofolio = Portofolio::find(1); // Gantilah dengan cara membaca portofolio sesuai dengan aplikasi Anda

        $this->assertInstanceOf(Portofolio::class, $portofolio);
    }

    public function testUpdateportofolio() {
        // Data yang akan diuji untuk operasi Update (Contoh)
        $portofolio = Portofolio::find(1); // Gantilah dengan cara membaca portofolio yang akan diperbarui

        $portofolio->nama_proyek = 'Updated portofolio Name'; // Gantilah dengan data perubahan yang sesuai
        $portofolio->foto_proyek = '';
        $portofolio->save(); // Gantilah dengan cara menyimpan perubahan sesuai dengan aplikasi Anda

        $updatedportofolio = Portofolio::find(1); // Gantilah dengan cara membaca portofolio yang telah diperbarui

        $this->assertEquals('Updated portofolio Name', $updatedportofolio->nama_proyek);
        $this->assertEquals('Updated portofolio Persen', $updatedportofolio->deskripsi_proyek);
    }

    public function testDeleteportofolio() {
        // Data yang akan diuji untuk operasi Delete (Contoh)
        $portofolio = Portofolio::find(1); // Gantilah dengan cara membaca portofolio yang akan dihapus

        $deleted = $portofolio->delete(); // Gantilah dengan cara menghapus portofolio sesuai dengan aplikasi Anda

        $this->assertTrue($deleted);
        $this->assertNull(Portofolio::find(1)); // Memastikan portofolio telah dihapus
    }
    */
}
?>