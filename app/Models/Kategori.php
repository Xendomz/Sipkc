<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['kategori'];

    public function wisatas()
    {
        return $this->hasMany(Wisata::class, 'kategori_id');
    }
}
