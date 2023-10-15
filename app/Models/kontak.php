<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontak extends Model
{
    use HasFactory;
    protected $fillable = ['id','identitas_id','email','alamat','no_telepon'];
    protected $table = 'kontak';
    public $timestamps = false;

    public function identitas()
    {
        return $this->belongsTo(Identitas::class);
    }
}
