<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    use HasFactory;
    protected $fillable = ['id','identitas_id','foto'];
    protected $table = 'gallery';
    public $timestamps = false;

    public function identitas()
    {
        return $this->belongsTo(Identitas::class);
    }
}
