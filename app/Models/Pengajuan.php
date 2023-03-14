<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{

    protected $table = "pengajuan";
    protected $dates = ['created_date'];

    protected $fillable = [
        'jenis_surat',
        'kebutuhan',
        'lampiran_1',
        'lampiran_2',
        'lampiran_3',
        'created_by',
        'created_date',
        'current_wp'       
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function transworkflow(){
        return $this->hasMany(TransWorkflow::class);
    }
}
