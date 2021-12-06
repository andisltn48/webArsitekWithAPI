<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPemesanan extends Model
{
    use HasFactory;
    public $table = "data_pemesanan";
    protected $fillable = [
        'nama_pemesan',
        'id_pemesan',
        'alamat_pemesan',
        'kontak_pemesan',
        'nama_pesanan',
        'id_pesanan',
        'tipe_lantai',
        'luas_bangunan',
        'harga_pesanan',
        'pembayaran_via',
        'bukti_pembayaran',
        'status_pengerjaan',
        'no_pemesanan',
    ];

    public function getUpdatedAtAttribute($value)
    {
        return date('d-m-Y H:i:s', strtotime($value));
    }
    public function getCreatedAtAttribute($value)
    {
        return date('d-m-Y H:i:s', strtotime($value));
    }
    public function getHargaPesananAttribute($value)
    {
        return strrev(implode('.', str_split(strrev(strval($value)), 3)));
    }
}
