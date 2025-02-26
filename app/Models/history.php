<?php

namespace App\Models;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    protected $table = 'request';
    protected $guarded = [];

    public function inventory()
    {
        return $this->belongsTo(inventory::class, 'inventory_id');
    }
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }
    public function divisi()
    {
        return $this->belongsTo(divisi::class, 'divisi_id', 'id');
    }
    public function lokasi()
    {
        return $this->belongsTo(lokasi::class, 'lokasi_id', 'id');
    }
}
