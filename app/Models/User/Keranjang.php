<?php

namespace App\Models\User;

use App\Models\Admin\Produk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang';
    protected $primaryKey = 'uuid_keranjang';
    public $incrementing = false;

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'uuid_produk');
    }
}
