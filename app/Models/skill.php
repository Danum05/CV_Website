<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skill extends Model
{
    use HasFactory;
    protected $fillable = ['id','nama_skill','persen_skill'];
    protected $table = 'skill';
    public $timestamps = false;
}
