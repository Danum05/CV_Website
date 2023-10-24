<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\identitas;
use Mockery;
use Tests\TestCase;

use App\Models\skill; // Gantilah dengan namespace yang sesuai dengan model Skill di aplikasi Anda

class SkillTest extends TestCase
{
    // Tambah data valid
    public function testCreateSkill()
    {
        $identitas = identitas::find(1);
        $data = [
            'nama_skill' => 'Photoshop',
            'persen_skill' => '75'
        ];
        $data['identitas_id'] = $identitas->id;
        $skill = Skill::create($data);

        $this->assertNotNull($skill);
        $this->assertEquals('Photoshop', $skill->nama_skill);
        $this->assertEquals('75', $skill->persen_skill);
    }

    /*
    public function testReadSkill() {
        // Data yang akan diuji untuk operasi Read (Contoh)
        $skill = Skill::find(1); // Gantilah dengan cara membaca Skill sesuai dengan aplikasi Anda

        $this->assertInstanceOf(Skill::class, $skill);
    }

    public function testUpdateSkill() {
        // Data yang akan diuji untuk operasi Update (Contoh)
        $skill = Skill::find(1); // Gantilah dengan cara membaca Skill yang akan diperbarui

        $skill->nama_skill = 'Updated Skill Name'; // Gantilah dengan data perubahan yang sesuai
        $skill->persen_skill = '90';
        $skill->save(); // Gantilah dengan cara menyimpan perubahan sesuai dengan aplikasi Anda

        $updatedSkill = Skill::find(1); // Gantilah dengan cara membaca Skill yang telah diperbarui

        $this->assertEquals('Updated Skill Name', $updatedSkill->nama_skill);
        $this->assertEquals('Updated Skill Persen', $updatedSkill->persen_skill);
    }

    public function testDeleteSkill() {
        // Data yang akan diuji untuk operasi Delete (Contoh)
        $skill = Skill::find(1); // Gantilah dengan cara membaca Skill yang akan dihapus

        $deleted = $skill->delete(); // Gantilah dengan cara menghapus Skill sesuai dengan aplikasi Anda

        $this->assertTrue($deleted);
        $this->assertNull(Skill::find(1)); // Memastikan Skill telah dihapus
    }
    */
}
?>