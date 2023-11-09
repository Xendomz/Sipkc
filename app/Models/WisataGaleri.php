<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WisataGaleri extends Model
{
    use HasFactory;
    protected $fillable = ['path', 'wisata_id'];
}
