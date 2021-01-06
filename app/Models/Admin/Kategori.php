<?php

namespace App\Models\Admin;
use App\Models\Admin\Produk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'uuid_kategori';
    public $incrementing = false;

    public function produk()
    {
        return $this->hasMany(Produk::class, 'uuid_kategori');
    }

}
