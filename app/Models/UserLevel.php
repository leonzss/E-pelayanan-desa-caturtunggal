<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    protected $table ="user_level";

    public function user(){
        return $this->hasMany(User::class);
    }

    public function pengaduan(){
        return $this->hasMany(Pengaduan::class);
    }
}
