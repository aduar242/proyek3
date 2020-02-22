<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hclient extends Model
{
    protected $table = 'history_p';

    protected $fillable = [
    	'id_cl', 
    	'id_paket',
    	'invoice',
    	'masa_aktif',
    	'masa_kadaluwarsa'
    ];

    public function client(){
    	return $this->belongsTo('App\Client','id_cl');
    }

    public function paket(){
    	return $this->belongsTo('App\Paket','id_paket');
    }
}
