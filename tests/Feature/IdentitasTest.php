<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\identitas;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class IdentitasTest extends TestCase
{
    // Tambah data valid
    public function testCreateIdentitas()
    {
        $image = UploadedFile::fake()->image('test.jpeg');
        $identitas = Identitas::find(1); // Ganti dengan ID yang benar
        $data = [
            'nama' => 'Hanni Pham',
            'pekerjaan' => 'Singer',
            'tempat_lahir' => 'Vietnam',
            'tanggal_lahir' => '2004-10-06',
            'jenis_kelamin' => 'Perempuan',
            'agama' => 'Islam',
            'kewarganegaraan' => 'Vietnam',
            'status' => 'Belum Menikah',
            'pas_foto' => $image
        ];
        $data['identitas_id'] = $identitas->id;
        $identitas = identitas::create($data);

        $this->assertNotNull($identitas);
        $this->assertEquals('Hanni Pham', $identitas->nama);
        $this->assertEquals('Singer', $identitas->pekerjaan);
        $this->assertEquals('Vietnam', $identitas->tempat_lahir);
        $this->assertEquals('2004-10-06', $identitas->tanggal_lahir);
        $this->assertEquals('Perempuan', $identitas->jenis_kelamin);
        $this->assertEquals('Islam', $identitas->agama);
        $this->assertEquals('Vietnam', $identitas->kewarganegaraan);
        $this->assertEquals('Belum Menikah', $identitas->status);
        $this->assertFileExists(storage_path('app/public/' . $identitas->foto_proyek));
    }

    /*
    public function testReadidentitas() {
        // Data yang akan diuji untuk operasi Read (Contoh)
        $identitas = Identitas::find(1); // Gantilah dengan cara membaca identitas sesuai dengan aplikasi Anda

        $this->assertInstanceOf(identitas::class, $identitas);
    }

    public function testUpdateIdentitas() {
        // Data yang akan diuji untuk operasi Update (Contoh)
        $identitas = Identitas::find(1); // Gantilah dengan cara membaca identitas yang akan diperbarui

        $identitas->nama = 'Updated identitas Name'; // Gantilah dengan data perubahan yang sesuai
        $identitas->pekerjaan = 'Updated';
        $identitas->tempat_lahir = 'Updated';
        $identitas->tanggal_lahir = 'Updated';
        $identitas->jenis_kelamin = 'Updated';
        $identitas->agama = 'Updated';
        $identitas->kewarganegaraan = 'Updated';
        $identitas->status = 'Updated';
        $identitas->foto_proyek = 'Updated';
        $identitas->save(); // Gantilah dengan cara menyimpan perubahan sesuai dengan aplikasi Anda

        $updatedidentitas = identitas::find(1); // Gantilah dengan cara membaca identitas yang telah diperbarui

        $this->assertEquals('Updated identitas Name', $updatedidentitas->nama);
        $this->assertEquals('Updated identitas Name', $updatedidentitas->pekerjaan);
        $this->assertEquals('Updated identitas Name', $updatedidentitas->tempat_lahir);
        $this->assertEquals('Updated identitas Name', $updatedidentitas->tanggal_lahir);
        $this->assertEquals('Updated identitas Name', $updatedidentitas->jenis_kelamin);
        $this->assertEquals('Updated identitas Name', $updatedidentitas->agama);
        $this->assertEquals('Updated identitas Name', $updatedidentitas->kewarganegaraan);
        $this->assertEquals('Updated identitas Name', $updatedidentitas->status);
        $this->assertEquals('Updated identitas Name', $updatedidentitas->foto_proyek);
    }

    public function testDeleteIdentitas() {
        // Data yang akan diuji untuk operasi Delete (Contoh)
        $identitas = Identitas::find(1); // Gantilah dengan cara membaca identitas yang akan dihapus

        $deleted = $identitas->delete(); // Gantilah dengan cara menghapus identitas sesuai dengan aplikasi Anda

        $this->assertTrue($deleted);
        $this->assertNull(Identitas::find(1)); // Memastikan identitas telah dihapus
    }
    */
}
?>