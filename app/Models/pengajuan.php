<?php

namespace App\Models;

use App\Models\spk;
use App\Models\leasing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pengajuan extends Model
{
    protected $table = 'pengajuan';
    protected $guarded = [];

    public function leasing(){
        return $this->belongsTo(leasing::class,'leasing_id','id');
    }
    public function spk(){
        return $this->belongsTo(spk::class,'spk_id','id');
    }
}
