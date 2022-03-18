<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supir extends Model
{
    use HasFactory;
    protected $fillable = ['gambar', 'nama_supir', 'alamat', 'no_telpon', 'no_sim', 'tarif'];
    public $timestamps = true;

    public function image()
    {
        if ($this->gambar && file_exists(public_path('images/' . $this->gambar))) {
            return asset('images/' . $this->gambar);
        } else {
            return asset('images/no_image.png');
        }
    }


    public function transaksi()
    {
        $this->hasMany('App\Models\transaksi', 'supir_id');
    }

}
