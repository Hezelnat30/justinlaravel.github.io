<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telepon extends Model
{
    protected $table = 'telepon';

    protected $primaryKey = 'id_siswa';

    public $incrementing = false; // Non-incrementing primary key

    protected $fillable = [
        'id_siswa',
        'nomor_telepon'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
}
