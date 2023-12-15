<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'nisn',
        'nama_siswa',
        'tanggal_lahir',
        'jenis_kelamin',
        'telepon',
        'id_kelas',
        'foto',
    ];

    protected $dates = ['tanggal_lahir'];
    // Accessor (Digunakan saat data diambil dari database):
    public function getNamaSiswaAttribute($nama_siswa)
    {
        return ucwords($nama_siswa);
    }

    // Mutator (Digunakan sebelum data disimpan ke database):
    public function setNamaSiswaAttribute($nama_siswa)
    {
        $this->attributes['nama_siswa'] = strtolower($nama_siswa);
    }

    public function setTanggalLahirAttribute($tanggal_lahir)
    {
        $this->attributes['tanggal_lahir'] = $tanggal_lahir;
    }

    public function telepon()
    {
        return $this->hasOne('App\Models\Telepon', 'id_siswa');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id'); // Kunci luar di Siswa adalah 'id_kelas'
    }

    public function hobi()
    {
        return $this->belongsToMany(Hobi::class, 'hobi_siswa', 'id_siswa', 'id_hobi')->withTimeStamps();
    }

    public function getHobiSiswaAttribute()
    {
        return $this->hobi->pluck('id')->toArray();
    }

    public function scopeKelas($query, $id_kelas)
    {
        return $query->where('id_kelas', $id_kelas);
    }

    public function scopeJenisKelamin($query, $jenis_kelamin)
    {
        return $query->where('jenis_kelamin', $jenis_kelamin);
    }
}
