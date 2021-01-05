<?php

namespace App\Models\user;

use App\Models\User\Biodata;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;
    protected $table = 'pesan';
    protected $primaryKey = 'uuid_pesan';
    public $incrementing = false;

    public function biodata()
    {
        return $this->belongsTo(Biodata::class, 'email');
    }
}
