<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tempat_pembuatan extends Model
{
    protected $fillable = [
        'nama_tempat',
        'alamat_tempat',
        'id_kota'
    ];
    
    //Table name
    protected $table = 'tempat_pembuatans';
    //Primary Key
    public $primaryKey = 'id_tempat_pembuatan';
    //Timestamps
    public $timestamps = true;
}
