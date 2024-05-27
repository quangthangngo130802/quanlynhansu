<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'admin';

    public $timestamps = false;
    protected $fillable = ['email', 'password', 'MaNV'];

    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'admin_role', 'admin_id', 'role_id');
    }

    public function nhanvien(){
        return $this->hasOne(NhanVien::class, 'MaNV', 'MaNV');
    }

    // public function getAuthPassword()
    // {
    //     return $this->admin_password;
    // }

    public function hasRole($role) // mảng
    {
        return null !== $this->roles()->whereIn('name', $role)->first();
    }


}
