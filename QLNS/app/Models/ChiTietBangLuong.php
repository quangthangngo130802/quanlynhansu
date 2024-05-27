<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietBangLuong extends Model
{
    use HasFactory;

    protected $table = 'chitietbangluong';
    protected $primaryKey = 'MaCTLuong';
    public $timestamps = false;
    protected $fillable = [
        'MaBangLuong', 'MaNV', 'NgayNhanLuong', 'TongLuongCB', 'TongLuongTC',
        'tienthuong', 'baohiem', 'TongPhuCap', 'TongThue', 'LuongThucLinh',
        'giamtru', 'danhan'
    ];

    public function nhanvien()
    {
        return $this->hasOne(NhanVien::class, 'MaNV', 'MaNV');
    }
    public function bangluong()
    {
        return $this->hasOne(BangLuong::class, 'MaBangLuong', 'MaBangLuong');
    }
}
