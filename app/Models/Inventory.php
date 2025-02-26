<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    // protected $guarded = [];
    protected $table = 'inventory';
    protected $guarded = [];

    protected $primaryKey = 'id';
    public $incrementing = false;


    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function Divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function history()
    {
        return $this->hasMany(history::class);
    }

    protected static function booted()
    {
        // Dijalankan sebelum menyimpan data
        static::creating(function ($inventory) {

            // Ambil id terakhir
            $lastId = self::orderBy('id', 'desc')->first();

            // Tentukan awalan
            $prefix = 'IT-';

            // Buat nomor urut baru
            $newNumber = $lastId ? intval(substr($lastId->id, strlen($prefix))) + 1 : 1;

            // Format nomor urut
            $formattedNumber = str_pad($newNumber, 3, '0', STR_PAD_LEFT);

            // Set id baru
            $inventory->id = $prefix . $formattedNumber;
        });
    }
}
