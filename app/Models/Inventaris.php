<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $table = 'inventaris';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'status',
        'jumlah',
        'foto',
    ];
}
