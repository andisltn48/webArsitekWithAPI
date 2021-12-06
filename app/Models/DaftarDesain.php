<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarDesain extends Model
{
    use HasFactory;
    public $table = "daftar_desain";
    protected $fillable = [
        'nama_desain',
        'deskripsi',
        'tipe_lantai',
        'harga'
    ];

    public function getUpdatedAtAttribute($value)
    {
        return date('d-m-Y H:i:s', strtotime($value));
    }
    public function getCreatedAtAttribute($value)
    {
        return date('d-m-Y H:i:s', strtotime($value));
    }
    public function getHargaAttribute($value)
    {
        return strrev(implode('.', str_split(strrev(strval($value)), 3)));
    }
}
