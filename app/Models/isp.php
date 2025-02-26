<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class isp extends Model
{
    use HasFactory;
    protected $table = 'isp';
    protected $guarded = [];

    public function Lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id', 'id');
    }
}
