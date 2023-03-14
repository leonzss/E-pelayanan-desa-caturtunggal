<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  

    protected $table = "user";
 
    protected $fillable = [
        'username',
        'password',
        'email',
        'phone',
        'nik',
        'user_level_id',
        'status'
       
    ];
   
    public function userLevel(){
        return $this->belongsTo(UserLevel::class);
    }

    public function nik(){
        return $this->belongsTo(Nik::class);
    }

    public function pengaduan(){
        return $this->hasMany(Pengaduan::class);
    }
   

    public function transworkflow(){
        return $this->hasMany(TransWorkflow::class);
    }

    public function berita(){
        return $this->hasMany(Berita::class);
    }

    public function pengajuan(){
        return $this->hasMany(Pengajuan::class);
    }

}
