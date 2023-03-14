<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransWorkflow extends Model
{
    protected $table = "transworkflow";

    protected $fillable = [
        'pengajuan_id',
        'wf_reference_id',
        'approved_by',
        'last_updated',
        
       
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function wf_reference(){
        return $this->belongsTo(WfReference::class);
    }

    public function pengajuan(){
        return $this->belongsTo(Pengajuan::class);
    }
}
