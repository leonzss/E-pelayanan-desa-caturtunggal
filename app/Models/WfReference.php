<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WfReference extends Model
{
    protected $table ="wf_reference";

     public function transworkflow(){
        return $this->hasMany(TransWorkflow::class);
    }
}
