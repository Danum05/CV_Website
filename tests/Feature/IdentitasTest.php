<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\identitas;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class IdentitasTest extends TestCase
{
    public function testCreateIdentitas()
    {
        // Simulasikan file yang diunggah
        $image = UploadedFile::fake()->image('test.jpeg');
        
        // Data yang akan digunakan untuk membuat data Identitas baru
        $data = [
            'nama' => 'Yasmin',
            'pekerjaan' => 'Singer',
            'tempat_lahir' => 'Vietnam',
            'tanggal_lahir' => '2004-10-06',
            'jenis_kelamin' => 'Perempuan',
            'agama' => 'Islam',
            'kewarganegaraan' => 'Vietnam',
            'status' => 'Belum Menikah',
            'pas_foto' => $image
        ];

        // Lakukan permintaan POST ke endpoint pembuatan Identitas
        $response = $this->post('/identitas', $data);

        // Pastikan respons HTTP adalah 302 (redirect)
        $response->assertStatus(302);

        // Pastikan Identitas telah dibuat
        $this->assertDatabaseHas('identitas', ['nama' => 'Yasmin']);

        // Hapus file yang diunggah
        @unlink(storage_path('app/public/' . $image->hashName()));
    }


    /*
    public function testUpdateIdentitas()
    {
        // Data yang akan digunakan untuk mengupdate data Identitas
        $data = [
            'nama' => 'Updated Name',
            'pekerjaan' => 'Updated',
            'tempat_lahir' => 'Updated',
            'tanggal_lahir' => 'Updated',
            'jenis_kelamin' => 'Updated',
            'agama' => 'Updated',
            'kewarganegaraan' => 'Updated',
            'status' => 'Updated',
        ];

        // Lakukan permintaan PUT ke endpoint update Identitas
        $response = $this->put('/identitas/1', $data);

        // Pastikan respons HTTP adalah 302 (redirect)
        $response->assertStatus(302);

        // Pastikan Identitas telah diupdate
        $this->assertDatabaseHas('identitas', ['nama' => 'Updated Name']);
    }

    public function testDeleteIdentitas()
    {
        // Lakukan permintaan DELETE ke endpoint penghapusan Identitas
        $response = $this->delete('/identitas/1');

        // Pastikan respons HTTP adalah 302 (redirect)
        $response->assertStatus(302);

        // Pastikan Identitas telah dihapus
        $this->assertDatabaseMissing('identitas', ['id' => 1]);
    }
    */
}
?>