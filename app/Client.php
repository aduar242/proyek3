<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    public function paket(){
        return $this->belongsTo('App\Paket','id_paket');
    }

    public function hclient(){
    	return $this->hasmany('App\Hclient');
    }
}
