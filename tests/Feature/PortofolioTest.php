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
        $identitas = Identitas::find(4); // Ganti dengan ID yang benar
        $data = [
            'nama_proyek' => 'Website Marketplace',
            'deskripsi' => 'Website menjual makanan',
            'foto_proyek' => $image
        ];
        $data['identitas_id'] = $identitas->id;

        // Lakukan permintaan POST ke endpoint pembuatan Identitas
        $response = $this->post('/portofolio', $data);

        // Pastikan respons HTTP adalah 302 (redirect)
        $response->assertStatus(302);

        // Pastikan Identitas telah dibuat
        $this->assertDatabaseHas('portofolio', ['nama_proyek' => 'Website Marketplace']);
        
        // Hapus file yang diunggah
        @unlink(storage_path('app/public/' . $image->hashName()));
        Portofolio::where('nama_proyek', 'Website Marketplace')->delete();
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