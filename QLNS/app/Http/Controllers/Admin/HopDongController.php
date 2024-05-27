<?php

namespace App\Http\Controllers\Admin;

use App\Exports\HopDongExcel as ExportsHopDongExcel;
use App\Http\Controllers\Controller;

use App\Imports\HopDongExcel;
use App\Models\HopDong;
use App\Models\LoaiHopDong;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class HopDongController extends Controller
{
    public function getIndex()
    {
        $user = Auth::guard('admin')->user();
        if ($user) {
            $data = HopDong::with('loaihopdong', 'nhanvien')->orderBy('MaHD', 'DESC')->paginate(10);
            return view('Admin.Hopdong.view', compact('data'));
        }
        return redirect()->route('admin.login.form');
    }

    public function formAdd()
    {
        $user = Auth::guard('admin')->user();
        if ($user) {
            $loaihopdong = LoaiHopDong::get();
            $nhanvien = NhanVien::get();

            return view('Admin.Hopdong.add', compact('loaihopdong', 'nhanvien'));
        }
        return redirect()->route('admin.login.form');
    }

    public function add(Request $request)
    {
        if ($request->trangthai == 1) {
            $trangthai = 'Hoạt động';
        } else {
            $trangthai = 'Hết hạn';
        }

        $data = $request->all();
        $create = HopDong::create([  // nếu create thât bại sẽ trả về giá trị null
            'TenHD' => $request->tenhd,
            'MaLoaiHD' => $request->loaihd,
            'NgayKy' => $request->ngayky,
            'NgayBatDau' => $request->ngaybd,
            'NgayKetThuc' => $request->ngaykt,
            'MaNV' => $request->nhanvien,
            'trangthai' => $trangthai

        ]);

        if ($create !== null) { // laravel sẽ tự chuyển đổi thành true/false nên có thể dùng if($student)

            return redirect()->back()->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function formUpdate($id)
    {
        $user = Auth::guard('admin')->user();
        if ($user) {

            $data = HopDong::where('MaHD', $id)->first();
            $loaihopdong = LoaiHopDong::get();
            $nhanvien = NhanVien::get();
            return view('Admin.Hopdong.edit', compact('data', 'loaihopdong', 'nhanvien'));
        }
        return redirect()->route('admin.login.form');
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();
        if ($request->trangthai == 1) {
            $trangthai = 'Hoạt động';
        } else {
            $trangthai = 'Hết hạn';
        }


        $update = HopDong::where('MaHD', $id)->update([  // nếu create thât bại sẽ trả về giá trị null
            'TenHD' => $request->tenhd,
            'MaLoaiHD' => $request->loaihd,
            'NgayKy' => $request->ngayky,
            'NgayBatDau' => $request->ngaybd,
            'NgayKetThuc' => $request->ngaykt,
            'MaNV' => $request->nhanvien,
            'trangthai' => $trangthai
        ]);
        if ($update !== null) {
            return redirect()->route('admin.hopdong.form')->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function delete($id)
    {
        $data = HopDong::where('MaHD', $id)->first();

        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete data');
        }
    }

    public function search(Request $request)
    {
        $user = Auth::guard('admin')->user();
        if ($user) {
            $keyword = $request->search;
            $searchBy = $request->searchBy;

            $query = HopDong::query();

            if ($searchBy == '1') {
                $query->where('MaHD', $keyword);
            } elseif ($searchBy == '2') {
                $query->where('TenHD', 'like', '%' . $keyword . '%');
            } elseif ($searchBy == '3') {
                $query->whereHas('loaihopdong', function ($query) use ($keyword) {
                    $query->where('TenLoaiHD', 'like', '%' . $keyword . '%');
                });
            } elseif ($searchBy == '4') {
                $query->whereDate('NgayKy', $keyword);
            } elseif ($searchBy == '5') {
                $query->whereDate('NgayBatDau', $keyword);
            } elseif ($searchBy == '6') {
                $query->whereDate('NgayKetThuc', $keyword);
            } elseif ($searchBy == '7') {
                $query->whereHas('nhanvien', function ($query) use ($keyword) {
                    $query->where('Hoten', 'like', '%' . $keyword . '%');
                });
            }

            // Phân trang
            $data = $query->paginate(5);

            if ($data->isEmpty()) {
                $error = 'Không tìm thấy dữ liệu phù hợp.';
                return view('Admin.Hopdong.search', compact('error', 'keyword', 'searchBy'));
            }

            // Trả về kết quả tìm kiếm với dữ liệu phân trang
            return view('Admin.Hopdong.search', compact('data', 'keyword', 'searchBy'));
        }
        return redirect()->route('admin.login.form');
    }



    public function export()
    {
        return Excel::download(new ExportsHopDongExcel, 'hop-dong.xlsx');
    }

    public function formImport()
    {
        return view('Admin.Hopdong.import');
    }

    // public function teamplateExport()
    // {
    //     return Excel::download(new TemplateStudent, 'template-student.xlsx');
    // }

    public function import(Request $request)
    {
        // dd($request->fileImport);
        if ($request->hasFile('fileImport')) {
            $file = $request->file('fileImport');
            $filePath = $file->getPathname();
            try {
                Excel::import(new HopDongExcel, $filePath);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Data import failed');
            }
            return redirect()->back()->with('success', 'Enter data successfully');
        } else {
            return redirect()->back()->with('error', 'File does not exist');
        }
    }

    // public function deleteStudent(Request $request)
    // {
    //     if ($request->has('selected_items')) {
    //         $selectedItems = $request->selected_items;
    //         DB::beginTransaction();
    //         StudentAccount::whereIn('student_id', $selectedItems)->delete();
    //         $deleteStudent = Student::whereIn('student_id', $selectedItems)->delete();
    //         if ($deleteStudent) {
    //             DB::commit();
    //             return response()->json(['success' => 'Student deleted successfully'], 200);
    //         } else {
    //             DB::rollback();
    //             return response()->json(['error' => 'Failed to delete students'], 500);
    //         }
    //     }
    // }
}
