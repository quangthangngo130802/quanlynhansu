<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    use HasFactory;
    protected $table = 'laylaimatkhau';
    // protected $primaryKey = 'MaKTKL';
    public $timestamps = false;
    protected $fillable = ['email', 'token'];
    public function user(){
        return $this->hasOne(Admin::class, 'email', 'email');
    }

}
