<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaLam;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaLamController extends Controller
{
    public function getIndex()
    {
        $user = Auth::guard('admin')->user();
        if ($user) {
            $data = CaLam::orderBy('MaCa', 'DESC')->paginate(10);
            return view('Admin.Calam.view', compact('data'));
        }
        return redirect()->route('admin.login.form');
    }

    public function formAdd()
    {
        $user = Auth::guard('admin')->user();
        if ($user) {
            return view('Admin.Calam.add');
        }
        return redirect()->route('admin.login.form');
    }

    public function add(Request $request)
    {
        $data = $request->all();
        $create = CaLam::create([  // nếu create thât bại sẽ trả về giá trị null
            'TenCa' => $request->tenca,
            'LoaiCa'=> $request->loaica,
            'GioBatDau'=> $request->giobd,
            'GioKetThuc'=> $request->giokt,
            'SoGioLamViec'=> $request->sglv

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

            $data = CaLam::where('MaCa', $id)->first();
            return view('Admin.Calam.edit', compact('data'));
        }
        return redirect()->route('admin.login.form');
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();

        $update = CaLam::where('MaCa', $id)->update([  // nếu create thât bại sẽ trả về giá trị null
            'TenCa' => $request->tenca,
            'LoaiCa'=> $request->loaica,
            'GioBatDau'=> $request->giobd,
            'GioKetThuc'=> $request->giokt,
            'SoGioLamViec'=> $request->sglv
        ]);
        if ($update !== null) {
            return redirect()->route('admin.calam.form')->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function delete($id)
    {
        $data = CaLam::where('MaCa', $id)->first();

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

    //         $query = PhongBan::query();

    //         if ($searchBy == '1') {
    //             $query->where('MaPB', $keyword);
    //         } elseif ($searchBy == '2') {
    //             $query->where('TenPB', 'like', '%' . $keyword . '%');
    //         }

    //         // Phân trang
    //         $data = $query->paginate(5);

    //         if ($data->isEmpty()) {
    //             $error = 'Không tìm thấy dữ liệu phù hợp.';
    //             return view('Admin.Phongban.search', compact('error', 'keyword', 'searchBy'));
    //         }

    //         // Trả về kết quả tìm kiếm với dữ liệu phân trang
    //         return view('Admin.Phongban.search', compact('data', 'keyword', 'searchBy'));
    //     }
    //     return redirect()->route('admin.login.form');
    // }
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


