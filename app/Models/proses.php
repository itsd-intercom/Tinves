<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proses extends Model
{
    protected $table = 'proses';
    protected $guarded = [];

    public function history(){
        return $this->belongsTo(history::class,'request_id','id');
    }
    public function inventory(){
        return $this->belongsTo(inventory::class,'inventory_id','id');
    }
}