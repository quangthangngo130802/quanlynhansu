<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhenThuong extends Model
{
    use HasFactory;
    protected $table = 'khenthuongkiluat';
    protected $primaryKey = 'MaKTKL';
    public $timestamps = false;
    protected $fillable = ['MaNV', 'MucKTKL', 'ThoiGian', 'LyDo', 'SoTien', 'theloai'];

    public function nhanvien(){
        return $this->hasOne(NhanVien::class, 'MaNV', 'MaNV');
    }
}
