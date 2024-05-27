<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    use HasFactory;
    protected $table = 'chucvu';
    protected $primaryKey = 'MaCV';
    public $timestamps = false;
    protected $fillable = ['TenCV', 'CapBac', 'updated_at', 'MaPB'];

    public function phongban(){
        return $this->hasOne(PhongBan::class, 'MaPB', 'MaPB');
    }

}
