<?php

namespace App\Imports;

use App\Models\HopDong;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class HopDongExcel implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $create = HopDong::create([  // nếu create thât bại sẽ trả về giá trị null
            'TenHD' => $row['0'], // Thay đổi từ 'tenhd' thành 'TenHD' ở đây
            'MaLoaiHD' => $row['1'], // Đảm bảo tên cột phù hợp
            'NgayKy' => $row['2'],
            'NgayBatDau' => $row['3'],
            'NgayKetThuc' => $row['4'],
            'MaNV' => $row['5'],

        ]);
    }

    public function startRow(): int
    {
        return 2;
        //Bắt đầu import từ hàng 2 (để bỏ qua hàng tiêu đề)
    }
}
