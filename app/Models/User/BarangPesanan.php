<?php

namespace App\Models\user;

use App\Models\Admin\Produk;
use App\Models\User;
use App\Models\User\Biodata;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangPesanan extends Model
{
    use HasFactory;
    protected $table = 'barang_pesanan';
    protected $primaryKey = 'uuid_barang_pesanan';
    public $incrementing = false;

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'uuid_produk');
    }

    public function biodata()
    {
        return $this->belongsTo(Biodata::class, 'email');
    }
}
