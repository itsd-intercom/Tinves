<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notes extends Model
{
    use HasFactory;
    protected $table = 'notes';
    protected $guarded = [];

    public function getIsFinishedAttribute()
    {
        return $this->attributes['status'] == 'selesai';
    }
}