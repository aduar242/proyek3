<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'data_kategori';

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
    protected $fillable = ['nama', 'icon'];


    public function Maps()
    {
        return $this->hasMany('App\Map', 'kategori_id', 'id');
    }

}
