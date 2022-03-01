<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pelanggan;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['no_transaksi', 'tgl_pesan', 'tgl_pinjam', 'tgl_rencana', 'pelanggan_id', 'supir_id', 'kendaraan_id', 'total_bayar'];
    public $timestamps = true;

    public function pelanggans()
    {
        return $this->belongsTo('App\Models\pelanggan', 'pelanggan_id');
    }

    public function supirs()
    {
        return $this->belongsTo('App\Models\supir', 'supir_id');
    }

    public function kendaraans()
    {
        return $this->belongsTo('App\Models\kendaraan', 'kendaraan_id');
    }
}
