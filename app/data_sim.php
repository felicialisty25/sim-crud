<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_sim extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'pekerjaan',
        'no_sim',
        'kategori_sim',
        'foto',
        'id_tempat_pembuatan',
    ];
    
    //Table name
    protected $table = 'data_sims';
    //Primary Key
    public $primaryKey = 'id_sim';
    //Timestamps
    public $timestamps = true;
}
