<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaLam;
use App\Models\DangKyCaLam;
use App\Models\NhanVien;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DangKyCaLamController extends Controller
{
    public function getIndex(Request $request)
    {
        $user = Auth::guard('admin')->user();
        if ($user) {
            $date = $request->input('date', Carbon::now()->toDateString());
            // Tạo đối tượng Carbon từ chuỗi ngày
            $carbonDate = Carbon::parse($date);

            // Chuyển đổi giá trị thứ từ dạng số sang dạng chữ
            $dayOfWeekName = $carbonDate->englishDayOfWeek;

            $data = DangKyCaLam::with('nhanvien')->where('date', $date)->get();
            // dd($data);
            $calam = CaLam::get();
            return view('Admin.DKcalam.view', compact('data', 'dayOfWeekName', 'calam', 'date'));
        }
        return redirect()->route('admin.login.form');
    }

    public function formAdd(Request $request)
    {
        $date = $request->input('date', Carbon::now()->toDateString());
        $user = Auth::guard('admin')->user();
        if ($user) {
            $nhanvien = NhanVien::get();
            return view('Admin.DKcalam.add', compact('nhanvien', 'date'));
        }
        return redirect()->route('admin.login.form');
    }

    public function add(Request $request)
    {
        $nhanviens = $request->input('nhanvien');
        DB::beginTransaction();
        foreach ($nhanviens as $nhanvien) {
            $dkcalam = DangKyCaLam::where('MaNV', $nhanvien)->where('MaCa', $request->calam)->where('date', $request->date)->first();
            if ($dkcalam !== null) {
                DB::rollback();
                return redirect()->back()->with('error', 'Trùng lịch');
            }
            DangKyCaLam::create([
                'MaNV' => $nhanvien,
                'MaCa' => $request->calam,
                'date' => $request->date,
                'dilam' => '2'
            ]);
        }
        // if ($create !== null) { // laravel sẽ tự chuyển đổi thành true/false nên có thể dùng if($student)
        DB::commit();
        return redirect()->back()->with('success', 'Data has been processed successfully.');
    }

    public function formUpdate($id)
    {
        $user = Auth::guard('admin')->user();
        if ($user) {

            $data = DangKyCaLam::with('nhanvien')->where('Id', $id)->first();

            return view('Admin.DKcalam.edit', compact('data'));
        }
        return redirect()->route('admin.login.form');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $update = DangKyCaLam::where('Id', $id)->update([  // nếu create thât bại sẽ trả về giá trị null

            'MaCa' => $request->calam

        ]);
        if ($update !== null) {
            return redirect()->route('admin.dkcalam.form')->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function delete($id)
    {
        $data = DangKyCaLam::where('Id', $id)->first();

        if ($data) {
            $data->delete();
            return redirect()->route('admin.dkcalam.form')->with('success', 'Deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete data');
        }
    }

    public function formchamcong($id)
    {
        $user = Auth::guard('admin')->user();
        if ($user) {

            $data = DangKyCaLam::with('nhanvien', 'calam')->where('Id', $id)->first();
            // dd($data);
            return view('Admin.DKcalam.chamcong', compact('data'));
        }
        return redirect()->route('admin.login.form');
    }

    public function chamcong($id, Request $request)
    {
        // dd($request->all());
        if ($request->nghilam !== null) {
            DangKyCaLam::where('Id', $id)->update([
                'MaNV' => $request->manv,
                'MaCa' => $request->maca,
                'date' => $request->date,
                'dilam' => '0'
            ]);
            return redirect()->route('admin.dkcalam.form')->with('success', 'Data has been processed successfully.');
        } else {
            $sogiolamhanhchinh = $request->tgra - $request->tgvao - $request->tglamthemvao - $request->tglamthemra;
            $sogio = round($sogiolamhanhchinh / 60, 2);

            $sogiotangca = $request->tglamthemvao + $request->tglamthemra;
            $sogiolamthem = round($sogiotangca / 60, 2);

            DangKyCaLam::where('Id', $id)->update([
                'MaNV' => $request->manv,
                'MaCa' => $request->maca,
                'date' => $request->date,
                'dilam' => '1',
                'sogiolamhanhchinh'=> $sogio,
                'sogiotangca'=> $sogiolamthem
            ]);
            return redirect()->route('admin.dkcalam.form')->with('success', 'Data has been processed successfully.');

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
