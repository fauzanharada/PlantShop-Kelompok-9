<?php

namespace App\Models\User;

use App\Models\user\Pesan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $table = 'biodata';
    protected $primaryKey = 'uuid_biodata';
    public $incrementing = false;

    public function pesan()
    {
        return $this->hasOne(Pesan::class, 'email');
    }
}
