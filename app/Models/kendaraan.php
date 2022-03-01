<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kendaraan extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['kode_kendaraan', 'merk', 'plat_no', 'tarif_pinjam', 'status', 'deskripsi', 'gambar'];
    public $timestamps = true;

    public function image()
    {
        if ($this->gambar && file_exists(public_path('images/mobil/' . $this->gambar))) {
            return asset('images/mobil/' . $this->gambar);
        } else {
            return asset('images/no_image.png');
        }
    }

    public function deleteImage()
    {
        if ($this->gambar && file_exists(public_path('images/mobil/' . $this->gambar))) {
            return unlink(public_path('images/mobil/' . $this->gambar));
        }

    }

    public function transaksi()
    {
        $this->hasMany('App\Models\transaksi', 'kendaraan_id');
    }

}
