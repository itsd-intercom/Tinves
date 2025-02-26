<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Divisi;
use App\Models\Lokasi;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use  HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'type',
        'divisi_id',
        'lokais_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // protected function type()
    // {
    //     return new Attribute(
    //         get: fn ($value) =>  ["user", "admin"][$value],
    //     );
    // }

    // public function inventory(){
    //     return $this->belongsTo(inventory::class,'inventory_id','id');
    // }
    public function Divisi(){
        return $this->belongsTo(Divisi::class,'divisi_id','id');
    }

    public function Lokasi(){
        return $this->belongsTo(Lokasi::class,'lokasi_id','id');
    }

}