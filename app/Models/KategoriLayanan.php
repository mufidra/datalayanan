<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriLayanan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function layanan()
    {
        return $this->hasMany(layanan::class, 'kategori_layanan', 'id');
    }
}
