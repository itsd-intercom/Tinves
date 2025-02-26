<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class network extends Model
{
    use HasFactory;
    protected $table = 'network';
    // protected $guarded = [];
    protected $fillable = ['title','start','end','color','backgroundColor'];
}