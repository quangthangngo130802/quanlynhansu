<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BangLuong extends Model
{
    use HasFactory;

    protected $table = 'bangluong';
    protected $primaryKey = 'MaBangLuong';
    public $timestamps = false;
    protected $fillable = ['Ten', 'NguoiTao', 'TongSoNV', 'TongLuong', 'DaTra', 'ConCanTra', 'KyLamViec', 'GhiChu'];

    public function nhanvien(){
        return $this->hasOne(NhanVien::class, 'MaNV', 'NguoiTao');
    }
}
