<?php

namespace App\Models\Admin;

use App\Models\user\BarangPesanan;
use App\Models\User\Keranjang;
use App\Models\Admin\Kategori;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'uuid_produk';
    public $incrementing = false;
    public function hantu()
    {
        return $this->belongsTo(Kategori::class, 'uuid_kategori');
    }
    public function Keranjang()
    {
        return $this->hasOne(Keranjang::class, 'uuid_produk');
    }

    public function barang_pesanan()
    {
        return $this->hasOne(BarangPesanan::class, 'uuid_produk');
    }
}
