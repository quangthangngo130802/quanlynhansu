<?php

namespace App\Exports;

use App\Models\HopDong;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HopDongExcel implements FromCollection, WithTitle, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $title;
    protected $headings;
    protected $selectedColumns = ['MaHD','TenHD', 'TenLoaiHD', 'NgayKy', 'NgayBatDau', 'NgayKetThuc', 'Hoten'];
    public function __construct()
    {   // Khởi tạo tiêu đề và các tiêu đề cột mặc định
        $this->title = 'Danh sách Hợp đồng';
        $this->headings = [
            'Mã Hợp đồng',
            'Tên Hợp đồng',
            'Loại Hợp Đồng',
            'Ngày Ký',
            'Ngày Bắt Đầu',
            'Ngày Kết Thúc',
            'Nhân Viên'

        ];
    }
    public function collection()
    {
         return HopDong::
          join('loaihopdong', 'loaihopdong.MaLoaiHD', '=', 'hopdong.MaLoaiHD')
          ->join('nhanvien', 'nhanvien.MaNV', '=', 'hopdong.MaNV')
         ->get($this->selectedColumns);
    }
    public function title(): string
    {
        return $this->title;
    }
    public function headings(): array
    {
        return $this->headings;
    }

}
