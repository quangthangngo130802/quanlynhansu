<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KhenThuong;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KhenThuongController extends Controller
{
    public function getIndex()
    {
        $user = Auth::guard('admin')->user();
        if ($user) {
            $data = KhenThuong::with('nhanvien')->orderBy('MaKTKL', 'DESC')->paginate(10);
            return view('Admin.Khenthuong.view', compact('data'));
        }
        return redirect()->route('admin.login.form');
    }

    public function formAdd()
    {
        $user = Auth::guard('admin')->user();
        if ($user) {
            $nhanvien = NhanVien::get();
            return view('Admin.Khenthuong.add', compact('nhanvien'));
        }
        return redirect()->route('admin.login.form');
    }

    public function add(Request $request)
    {
        $data = $request->all();
        $create = KhenThuong::create([  // nếu create thât bại sẽ trả về giá trị null
            'MaNV' => $request->nhanvien,
            'MucKTKL' => $request->mucktkl,
            'ThoiGian' => $request->thoigian,
            'LyDo' => $request->lydo,
            'SoTien' => $request->sotien,
            'theloai' => $request->theloai

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
            $data = KhenThuong::where('MaKTKL', $id)->first();
            $nhanvien = NhanVien::get();
            return view('Admin.Khenthuong.edit', compact('data', 'nhanvien'));
        }
        return redirect()->route('admin.login.form');
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();

        $update = KhenThuong::where('MaKTKL', $id)->update([  // nếu create thât bại sẽ trả về giá trị null
            'MaNV' => $request->nhanvien,
            'MucKTKL' => $request->mucktkl,
            'ThoiGian' => $request->thoigian,
            'LyDo' => $request->lydo,
            'SoTien' => $request->sotien,
            'theloai' => $request->theloai

        ]);
        if ($update !== null) {
            return redirect()->route('admin.khenthuong.form')->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function delete($id)
    {
        $data = KhenThuong::where('MaKTKL', $id)->first();

        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete data');
        }
    }

    // public function search(Request $request)
    // {
    //     $user = Auth::guard('admin')->user();
    //     if ($user) {
    //         $keyword = $request->search;
    //         $searchBy = $request->searchBy;

    //         $query = NhanVien::query();

    //         if ($searchBy == '1') {
    //             $query->where('MaNV', $keyword);
    //         } elseif ($searchBy == '2') {
    //             $query->where('Hoten', 'like', '%' . $keyword . '%');
    //         } elseif ($searchBy == '3') {
    //             $query->where('DiaChi', 'like', '%' . $keyword . '%');
    //         } elseif ($searchBy == '4') {
    //             $query->where('SoDienThoai', $keyword);
    //         } else {
    //             $query->where('Email', 'like', '%' . $keyword . '%');
    //         }

    //         $data = $query->paginate(5);

    //         if ($data->isEmpty()) {
    //             $error = 'Không tìm thấy dữ liệu phù hợp.';
    //             return view('Admin.Nhanvien.search', compact('error', 'keyword', 'searchBy'));
    //         }

    //         // Trả về kết quả tìm kiếm
    //         return view('Admin.Nhanvien.search', compact('data', 'keyword', 'searchBy'));
    //     }
    //     return redirect()->route('admin.login.form');
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
