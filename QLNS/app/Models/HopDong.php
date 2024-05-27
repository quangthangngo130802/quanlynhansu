<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HopDong extends Model
{
    use HasFactory;
    protected $table = 'hopdong';
    protected $primaryKey = 'MaHD';
    public $timestamps = false;
    protected $fillable = ['TenHD', 'MaLoaiHD', 'NgayKy', 'NgayBatDau', 'NgayKetThuc', 'MaNV', 'trangthai'];

    public function loaihopdong(){
        return $this->hasOne(LoaiHopDong::class, 'MaLoaiHD', 'MaLoaiHD');
    }

    public function nhanvien(){
        return $this->hasOne(NhanVien::class, 'MaNV', 'MaNV');
    }
}
