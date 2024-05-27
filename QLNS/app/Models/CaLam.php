<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaLam extends Model
{
    use HasFactory;

    protected $table = 'calam';
    protected $primaryKey = 'MaCa';
    public $timestamps = false;
    protected $fillable = ['TenCa', 'LoaiCa', 'GioBatDau', 'GioKetThuc', 'SoGioLamViec'];

}
