<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengembalian extends Model
{
    use HasFactory;
    protected $fillable = ['tgl_pinjam', 'tgl_pengembalian', 'pelanggan_id', 'kendaraan_id', 'denda'];
    protected $visible = ['tgl_pinjam', 'tgl_pengembalian', 'pelanggan_id', 'kendaraan_id', 'denda'];
    public $timestamps = true;


    public function pelanggans()
    {
        return $this->belongsTo('App\Models\pelanggan', 'pelanggan_id');
    }

    public function kendaraans()
    {
        return $this->belongsTo('App\Models\kendaraan', 'kendaraan_id');
    }
}
