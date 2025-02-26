<?php

namespace App\Models;

use PhpParser\Node\Expr\FuncCall;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;

class Divisi extends Model
{
    // public $incrementing = false;
    // public $keyType = 'string';
    // protected $primaryKey = 'code';
    protected $table = 'divisi';
    protected $guarded = [];

    public static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        $lastDivisi = static::orderBy('id', 'desc')->first();
        $nextId = ($lastDivisi) ? ((int)substr($lastDivisi->no, 2) + 1) : 1;
        $model->no = 'B-' . str_pad($nextId, 2, '0', STR_PAD_LEFT);
    });
}
}
