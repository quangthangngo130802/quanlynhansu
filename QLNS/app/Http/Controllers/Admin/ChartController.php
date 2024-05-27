<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HopDong;
use App\Models\NhanVien;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function form()
    {
        // $course = Course::orderBy('course_id', 'DESC')
        //     ->get();
        return view('Admin.Chart.pie');
    }
    public function pieChart()
    {
        $maleCount = NhanVien::where('GioiTinh', 'nam')->count();

        $femaleCount = NhanVien::where('GioiTinh', 'nữ')->count();

        return response()->json([
            'male' => $maleCount,
            'female' => $femaleCount,
        ]);
    }

    public function formhd()
    {
        // $course = Course::orderBy('course_id', 'DESC')
        //     ->get();
        return view('Admin.Chart.piehd');
    }
    public function pieCharthd()
    {
        $maleCount = HopDong::where('trangthai', 'Hết hạn')->count();

        $femaleCount = HopDong::where('trangthai', 'Hoạt động')->count();

        return response()->json([
            'male' => $maleCount,
            'female' => $femaleCount,
        ]);
    }
}
