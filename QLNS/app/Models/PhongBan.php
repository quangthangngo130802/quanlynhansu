<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongBan extends Model
{
    use HasFactory;
    protected $table = 'phongban';
    protected $primaryKey = 'MaPB';
    public $timestamps = false;
    protected $fillable = ['TenPB', 'SoLuongNV', 'updated_at'];
}
