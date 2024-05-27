@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('admin.updatecalam.submit', ['MaCa' => $data->MaCa]) }}" method="POST">
                        @csrf

                        <h6 class="mb-4"><a href="{{ route('admin.calam.form') }}">Back</a></h6>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="tenca">
                                <option value="Hành Chính" {{ $data->TenCa == 'Hành Chính' ? 'selected' : '' }}>Hành Chính
                                </option>
                                <option value="Sáng" {{ $data->TenCa == 'Sáng' ? 'selected' : '' }}>Sáng</option>
                                <option value="Chiều" {{ $data->TenCa == 'Chiều' ? 'selected' : '' }}>Chiều</option>
                                <option value="Tối" {{ $data->TenCa == 'Tối' ? 'selected' : '' }}>Tối</option>
                            </select>
                            <label for="floatingSelect">Tên Ca</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="loaica">
                                <option value="Cố Định" {{ $data->LoaiCa == 'Cố Định' ? 'selected' : '' }}>Cố Định</option>
                                <option value="Linh Hoạt" {{ $data->LoaiCa == 'Linh Hoạt' ? 'selected' : '' }}>Linh Hoạt</option>

                            </select>
                            <label for="floatingSelect">Loại Ca</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="giobd" value="{{ $data->GioBatDau }}" required>
                            <label for="floatingInput">Giờ Bắt Đầu</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="giokt" value="{{ $data->GioKetThuc }}" required>
                            <label for="floatingInput">Giờ Kết Thúc</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="sglv" value="{{ $data->SoGioLamViec }}" required>
                            <label for="floatingInput">Số Giờ Làm Việc</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
