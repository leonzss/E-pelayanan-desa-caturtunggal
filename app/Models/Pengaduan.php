<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Pengaduan extends Model
{

    protected $table = "pengaduan";
    protected $dates = ['created_date'];

    protected $fillable = [
        'judul_pengaduan',
        'detail_pengaduan',
        'lokasi_kejadian',
        'status',
        'remark',
        'created_by',
        'created_date',
        'closed_by'       
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function userLevel(){
        return $this->belongsTo(UserLevel::class);
    }

   
}
