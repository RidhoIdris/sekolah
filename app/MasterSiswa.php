<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterSiswa extends Model
{
    protected $guarded = [];
    protected $table = 'master_siswa';
    protected $primaryKey = 'nis';
}
