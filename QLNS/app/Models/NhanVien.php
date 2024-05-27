<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;
    protected $table = 'nhanvien';
    protected $primaryKey = 'MaNV';
    public $timestamps = false;
    protected $fillable = [
        'Hoten',
        'GioiTinh',
        'NgaySinh',
        'DiaChi',
        'SoDienThoai',
        'SoCCCD',
        'Email',
        'QueQuan',

        'MaCV',
        'MaHD'
    ];

    public function chucvu(){
        return $this->hasOne(ChucVu::class, 'MaCV', 'MaCV')->with('phongban');
    }

}
