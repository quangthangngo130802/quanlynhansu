<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DieuChuyenNhanVien extends Model
{
    use HasFactory;

    protected $table = 'dieuchuyennhanvien';
    protected $primaryKey = 'MaPhieu';
    public $timestamps = false;
    protected $fillable = ['TenPhieu', 'MaNV', 'CVHienTai', 'CVChuyenDen', 'NgayKT', 'NgayBD', 'NgayDuyet', 'TrangThai'];

    public function phongban1(){
        return $this->hasOne(PhongBan::class, 'MaPB', 'PBHienTai');
    }
    public function phongban2(){
        return $this->hasOne(PhongBan::class, 'MaPB', 'PBChuyenDen');
    }
    public function nhanvien(){
        return $this->hasOne(NhanVien::class, 'MaNV', 'MaNV');
    }
    public function chucvu1(){
        return $this->hasOne(ChucVu::class, 'MaCV', 'CVHienTai');
    }
    public function chucvu2(){
        return $this->hasOne(ChucVu::class, 'MaCV', 'CVChuyenDen');
    }

}
