<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\transaksi;

class pelanggan extends Model
{
    use HasFactory;
    protected $fillable = ['no_ktp', 'nama', 'alamat', 'telpon'];
    public $timestamps = true;


    public function pengembalians()
    {
        $this->hasMany('App\Models\pengembalian', 'pelanggan_id');
    }

    public function transaksis()
    {
        $this->hasMany('App\Models\transaksi', 'pelanggan_id');
    }

}
