<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class identitas extends Model
{
    use HasFactory;
    protected $fillable = ['id','nama','pekerjaan','tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'kewarganegaraan', 'status', 'pas_foto'];
    protected $table = 'identitas';
    public $timestamps = false;

    public function pendidikan()
    {
        return $this->hasMany(pendidikan::class);
    }

    public function skill()
    {
        return $this->hasMany(skill::class);
    }

    public function organisasi()
    {
        return $this->hasMany(organisasi::class);
    }

    public function portofolio()
    {
        return $this->hasMany(portofolio::class);
    }
}

