<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaBarang extends Model
{
    protected $table = 'inventoryga';
    protected $guarded = [];

    protected $primaryKey = 'id';
    public $incrementing = false;

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function MasterInventory()
    {
        return $this->belongsTo(MasterInventory::class, 'master_id', 'id');
    }

    public function Lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id', 'id');
    }
}
