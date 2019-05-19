<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $guarded = [];
    protected $table = 'kelas';
    protected $primaryKey = 'kode_kelas';
    public $incrementing = false;

    public function jurusan()
    {
        return $this->belongsTo('App\Jurusan');
    }
    public function siswa()
    {
        return $this->hasMany('App\MasterSiswa');
    }
}
