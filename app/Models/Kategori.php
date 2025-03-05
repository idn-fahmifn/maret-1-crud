<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    
    protected $fillable = ['nama_kategori', 'thumbnail'];

    public function produk()
    {
        $this->hasMany(Produk::class, 'id_kategori');
    }

}
