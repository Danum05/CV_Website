<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class organisasi extends Model
{
    use HasFactory;
    protected $fillable = ['nama_organisasi','jabatan','tahun_awal','tahun_akhir'];
    protected $table = 'organisasi';
    public $timestamps = false;
}
