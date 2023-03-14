<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nik extends Model
{

    protected $table = "nik";

    protected $fillable = [
        'nama' ,
        'alamat' ,
        'tempat_lahir' ,
        'tanggal_lahir' ,
        'status_perkawinan' ,
        'pekerjaan' ,
        'jenis_kelamin' ,
        'dusun' ,
        'rt' ,
        'rw' ,
        'agama' ,
        'kk' ,
        'kecamatan' ,
        'kelurahan' ,
        'kabupaten' ,
        'nama_ayah' ,
        'nama_ibu' ,
        'kewarganegaraan' ,
        'Lampiran_1' ,
        'Lampiran_2' ,
        'Lampiran_3' ,      
        'id_ktp' ,       
    ];

    public function user(){
        return $this->hasOne(User::class);
    }
}
