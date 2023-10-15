<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class pendidikan extends Model
{
    use HasFactory;
    protected $fillable = ['id','identitas_id', 'nama_instansi', 'nama_jurusan', 'tahun_masuk', 'tahun_lulus'];
    protected $table = 'pendidikan';
    public $timestamps = false;

    public function identitas()
    {
        return $this->belongsTo(Identitas::class);
    }
}