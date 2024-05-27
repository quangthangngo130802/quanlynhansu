<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\NhanVien;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NguoiDungController extends Controller
{

    public function getIndex()
    {
        $user = Auth::guard('admin')->user();
        if ($user) {
            $data = Admin::with('nhanvien')->orderBy('id', 'DESC')->paginate(10);
            return view('Admin.Nguoidung.view', compact('data'));
        }
        return redirect()->route('admin.login.form');
    }

    public function formAdd()
    {
        $user = Auth::guard('admin')->user();
        if ($user) {

            $nhanvien = NhanVien::get();
            return view('Admin.Nguoidung.add', compact('nhanvien'));
        }
        return redirect()->route('admin.login.form');
    }

    public function add(Request $request)
    {
        $request->validate([
            'email' => 'unique:admin,email'
        ]);
        $data = $request->all();
        $create = Admin::create([  // nếu create thât bại sẽ trả về giá trị null
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'MaNV' => $data['nhanvien']
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
            $data = Admin::where('id', $id)->first();
            $nhanvien = NhanVien::get();

            return view('Admin.Nguoidung.edit', compact('data', 'nhanvien'));
        }
        return redirect()->route('admin.login.form');
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();

        $update = Admin::where('id', $id)->update([  // nếu create thât bại sẽ trả về giá trị null
            // 'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'MaNV' => $data['nhanvien']

        ]);
        if ($update !== null) {
            return redirect()->route('admin.nguoidung.form')->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function delete($id)
    {

        $data = Admin::where('id', $id)->first();

        if ($data) {
            if ($data->hasRole(['Admin'])) {
                return redirect()->back()->with('error', 'Can not delete Admin');
            }
            $data->delete();
            return redirect()->back()->with('success', 'Deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete data');
        }
    }

    public function assignRoles(Request $request)
    {
        $admin = Admin::where('id', $request->admin_id)->first();
        $admin->roles()->detach(); //xóa all bản ghi  trong bảng trung gian liên quan đến tk này
        if ($request->adminChecked) {
            $role = Roles::where('name', 'Admin')->first();
            $admin->roles()->attach($role->id);
        }
        if ($request->addChecked) {
            $role = Roles::where('name', 'Add')->first();
            $admin->roles()->attach($role->id);
        }
        if ($request->editorChecked) {
            $role = Roles::where('name', 'Edit')->first();
            $admin->roles()->attach($role->id);
        }
        if ($request->deleteChecked) {
            $role = Roles::where('name', 'Delete')->first();
            $admin->roles()->attach($role->id);
        }

        return redirect()->back()->with('success', 'Successful role assignment');
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
