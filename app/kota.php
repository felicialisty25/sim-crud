<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
    protected $fillable = [
        'nama_kota'
    ];
    
    //Table name
    protected $table = 'kotas';
    //Primary Key
    public $primaryKey = 'id_kota';
    //Timestamps
    public $timestamps = true;
}
