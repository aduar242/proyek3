<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    public $fillable = ['nama', 'harga'];
    protected $table = "pakets";
}
