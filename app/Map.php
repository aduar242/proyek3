<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'data_maps';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['kategori_id','nama', 'lat', 'long'];


    public function Kategori()
    {
        return $this->belongsTo('App\Kategori', 'kategori_id', 'id');
    }
}
