@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('admin.updatenhanvien.submit', ['MaNV' => $data->MaNV]) }}" method="POST">
                        @csrf

                        <h6 class="mb-4"><a href="{{ route('admin.nhanvien.form') }}">Back</a></h6>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="hoten"
                                value="{{ $data->Hoten }}" required>
                            <label for="floatingInput">Họ Tên</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="gioitinh">
                                <option value="Nam" {{ $data->GioiTinh == 'Nam' ? 'selected' : '' }}>Nam</option>
                                <option value="Nữ" {{ $data->GioiTinh == 'Nữ' ? 'selected' : '' }}>Nữ</option>

                            </select>
                            <label for="floatingSelect">Giới Tính</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" name="ngaysinh"
                                value="{{ $data->NgaySinh }}" }} required>
                            <label for="floatingInput">Ngày Sinh</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="diachi"
                                value="{{ $data->DiaChi }}" required>
                            <label for="floatingInput">Địa Chỉ</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" name="sdt"
                                value="{{ $data->SoDienThoai }}" required>
                            <label for="floatingInput">Số Điện Thoại</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="socccd"
                                value="{{ $data->SoCCCD }}" required>
                            <label for="floatingInput">Số CCCD</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" name="email"
                                value="{{ $data->Email }}" required>
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="quequan"
                                value="{{ $data->QueQuan }}" required>
                            <label for="floatingInput">Quê Quán</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="macv">
                                <option value=""></option>
                                @foreach ($chucvu as $item)
                                    <option value="{{ $item->MaCV }}" {{ $data->MaCV == $item->MaCV ? 'selected' : '' }}>
                                        {{ $item->TenCV }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Chức Vụ</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
