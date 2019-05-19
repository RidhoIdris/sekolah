<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $guarded = [];

    public function kelas()
    {
        return $this->hasMany('App\Kelas');
    }
}
