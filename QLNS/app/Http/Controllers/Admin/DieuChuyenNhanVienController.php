<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChucVu;
use App\Models\DieuChuyenNhanVien;
use App\Models\NhanVien;
use App\Models\PhongBan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DieuChuyenNhanVienController extends Controller
{
    public function getIndex()
    {
        $user = Auth::guard('admin')->user();
        if ($user) {
            $data = DieuChuyenNhanVien::with('phongban1', 'phongban2', 'nhanvien', 'chucvu1', 'chucvu2')->orderBy('MaPhieu', 'DESC')->paginate(10);
            return view('Admin.Dieuchuyennv.view', compact('data'));
        }
        return redirect()->route('admin.login.form');
    }

    public function formAdd()
    {
        $user = Auth::guard('admin')->user();
        if ($user) {
            $phongban = PhongBan::get();
            $nhanvien = NhanVien::get();
            $chucvu = ChucVu::get();
            return view('Admin.Dieuchuyennv.add', compact('phongban', 'nhanvien', 'chucvu'));
        }
        return redirect()->route('admin.login.form');
    }

    public function add(Request $request)
    {
        $data = $request->all();
        $create = DieuChuyenNhanVien::create([  // nếu create thât bại sẽ trả về giá trị null
            'TenPhieu' => $request->tenphieu,
            'MaNV' => $request->nhanvien,
            // 'PBHienTai' => $request->pbht,
            // 'PBChuyenDen' => $request->pbcd,
            'CVHienTai' => $request->cvht,
            'CVChuyenDen' => $request->cvcd,
            'NgayKT' => $request->ngaykt,
            'NgayBD' => $request->ngaybd,
            // 'NgayDuyet' => $request->ngayduyet,
            'TrangThai' => 'Đang Chờ'

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

            $data = DieuChuyenNhanVien::where('MaPhieu', $id)->first();
            $phongban = PhongBan::get();
            $nhanvien = NhanVien::get();
            $chucvu = ChucVu::with('phongban')->get();
            return view('Admin.Dieuchuyennv.edit', compact('data', 'phongban', 'nhanvien', 'chucvu'));
        }
        return redirect()->route('admin.login.form');
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();
        $item = DieuChuyenNhanVien::where('MaPhieu', $id)->first();
        $ngayduyet = null;
        if ($item->TrangThai != $request->trangthai) {
            $ngayduyet = Carbon::now();
        }
        $update = DieuChuyenNhanVien::where('MaPhieu', $id)->update([  // nếu create thât bại sẽ trả về giá trị null
            'TenPhieu' => $request->tenphieu,
            'MaNV' => $request->nhanvien,
            // 'PBHienTai' => $request->pbht,
            // 'PBChuyenDen' => $request->pbcd,
            'CVHienTai' => $request->cvht,
            'CVChuyenDen' => $request->cvcd,
            'NgayKT' => $request->ngaykt,
            'NgayBD' => $request->ngaybd,
            'NgayDuyet' => $ngayduyet,
            'TrangThai' => $request->trangthai
        ]);
        if ($update !== null) {
            return redirect()->route('admin.dieuchuyennv.form')->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function delete($id)
    {
        $data = DieuChuyenNhanVien::where('MaPhieu', $id)->first();

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

            $query = DieuChuyenNhanVien::query();

            if ($searchBy == '1') {
                $query->where('TenPhieu', 'like', '%' . $keyword . '%');
            } elseif ($searchBy == '2') {
                $query->whereHas('nhanvien', function ($query) use ($keyword) {
                    $query->where('Hoten', 'like', '%' . $keyword . '%');
                });
            } elseif ($searchBy == '3') {
                $query->whereDate('NgayBD', $keyword);
            } elseif ($searchBy == '4') {
                $query->whereDate('NgayKT', $keyword);
            } elseif ($searchBy == '5') {
                $query->whereDate('NgayDuyet', $keyword);
            } elseif ($searchBy == '6') {
                $query->where('TrangThai', 'like', '%' . $keyword . '%');
            }

            // Phân trang
            $data = $query->paginate(5);

            if ($data->isEmpty()) {
                $error = 'Không tìm thấy dữ liệu phù hợp.';
                return view('Admin.Dieuchuyennv.search', compact('error', 'keyword', 'searchBy'));
            }

            // Trả về kết quả tìm kiếm với dữ liệu phân trang
            return view('Admin.Dieuchuyennv.search', compact('data', 'keyword', 'searchBy'));
        }
        return redirect()->route('admin.login.form');
    }

    // public function searchStudent(Request $request)
    // {
    //     $keyword = $request->keyword;
    //     $keywords = explode(' ', $keyword);
    //     $firstName = $keywords[0];
    //     $lastName = $keywords[count($keywords) - 1];
    //     $students = Student::join('tbl_class', 'tbl_class.class_id', '=', 'tbl_student.class_id')
    //         ->join('tbl_course', 'tbl_class.course_id', '=', 'tbl_course.course_id')
    //         ->where('student_code', $keyword)
    //         ->orWhere('first_name', 'like', '%' . $firstName . '%')
    //         ->orWhere('last_name', 'like', '%' . $lastName . '%')
    //         ->orWhere('first_name', 'like', '%' . $lastName . '%')
    //         ->orWhere('last_name', 'like', '%' . $firstName . '%')
    //         ->paginate(5); // trả về 1 mảng
    //     if ($students->isNotEmpty()) {
    //         return view('Admin.Student.searchStudent', compact('students', 'keyword'));
    //     } else {
    //         $error = 'No matching data found';
    //         return view('Admin.Student.searchStudent', compact('error', 'keyword'));
    //     }
    // }

    // public function exportStudents()
    // {
    //     return Excel::download(new StudentsExport, 'list-student-export.xlsx');
    // }

    // public function formImportStudents()
    // {
    //     return view('Admin.Student.import');
    // }

    // public function teamplateExport()
    // {
    //     return Excel::download(new TemplateStudent, 'template-student.xlsx');
    // }

    // public function importStudents(Request $request)
    // {
    //     if ($request->hasFile('import-students')) {
    //         $file = $request->file('import-students');
    //         $filePath = $file->getPathname();
    //         try {
    //             Excel::import(new StudentsImport, $filePath);
    //         } catch (\Exception $e) {
    //             return redirect()->back()->with('error', 'Data import failed');
    //         }
    //         return redirect()->back()->with('success', 'Enter data successfully');
    //     } else {
    //         return redirect()->back()->with('error', 'File does not exist');
    //     }
    // }

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
