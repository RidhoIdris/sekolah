<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterGuru extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'nip';
    public $incrementing = false;
}
