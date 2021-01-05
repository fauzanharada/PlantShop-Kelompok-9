<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonfirmasiPesanan extends Model
{
    use HasFactory;
    protected $table = 'konfirmasi_pesanan';
    protected $primaryKey = 'uuid_konfirmasi_pesanan';
    public $incrementing = false;
}
