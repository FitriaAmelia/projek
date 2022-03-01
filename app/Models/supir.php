<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supir extends Model
{
    use HasFactory;
    protected $fillable = ['nama_supir', 'alamat', 'no_telpon', 'no_sim', 'tarif'];
    public $timestamps = true;

    public function transaksi()
    {
        $this->hasMany('App\Models\transaksi', 'supir_id');
    }

}
