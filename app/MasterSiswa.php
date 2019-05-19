<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterSiswa extends Model
{
    protected $guarded = [];
    protected $table = 'master_siswa';
    protected $primaryKey = 'nis';
    public $incrementing = false;

    public function kelas()
    {
        return $this->belongsTo('App\Kelas','kode_kelas');
    }
}
