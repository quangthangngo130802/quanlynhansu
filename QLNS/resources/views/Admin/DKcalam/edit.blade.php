@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('admin.updatedkcalam.submit', ['Id' => $data->Id]) }}" method="POST">
                        @csrf

                        <h6 class="mb-4"><a href="{{ route('admin.dkcalam.form') }}">Back</a></h6>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" name="date"
                                value="{{ $data->date }}" readonly>
                            <label for="floatingInput">Ngày</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="nhanvien"
                                value="{{ $data->nhanvien->Hoten }}" readonly>
                            <label for="floatingInput">Nhân Viên</label>

                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="calam">
                                <option value="1" {{ $data->MaCa == 1 ? 'selected' : '' }}>Hành Chính</option>
                                <option value="2" {{ $data->MaCa == 2 ? 'selected' : '' }}>Sáng</option>
                                <option value="3" {{ $data->MaCa == 3 ? 'selected' : '' }}>Chiều</option>
                                <option value="4" {{ $data->MaCa == 4 ? 'selected' : '' }}>Tối</option>
                            </select>
                            <label for="floatingSelect">Ca Làm</label>
                        </div>


                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.deletedkcalam', ['Id' => $data->Id]) }}" class="btn btn-primary btn-danger">Delete</a>
                        <a href="{{ route('admin.chamcong.form', ['Id' => $data->Id]) }}" class="btn btn-primary btn-info">Chấm Công</a>

`                      </form>
                </div>
            </div>

        </div>
    </div>
@endsection
