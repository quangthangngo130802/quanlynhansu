@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('admin.updatehopdong.submit', ['MaHD' => $data->MaHD]) }}" method="POST">
                        @csrf

                        <h6 class="mb-4"><a href="{{ route('admin.hopdong.form') }}">Back</a></h6>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="tenhd"
                                value="{{ $data->TenHD }}" required>
                            <label for="floatingInput">Tên Hợp Đồng</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="loaihd">
                                @foreach ($loaihopdong as $item)
                                    <option value="{{ $item->MaLoaiHD }}"
                                        {{ $data->MaLoaiHD == $item->MaLoaiHD ? 'selected' : '' }}>{{ $item->TenLoaiHD }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Loại Hợp Đồng</label>
                        </div>


                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" name="ngayky"
                                value="{{ $data->NgayKy }}" required>
                            <label for="floatingInput">Ngày Ký</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" name="ngaybd"
                                value="{{ $data->NgayBatDau }}" required>
                            <label for="floatingInput">Ngày Bắt Đầu</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" name="ngaykt"
                                value="{{ $data->NgayKetThuc }}" required>
                            <label for="floatingInput">Ngày Kết Thúc</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="nhanvien" required>
                                <option value=""></option>
                                @foreach ($nhanvien as $item)
                                    <option value="{{ $item->MaNV }}" {{ $data->MaNV == $item->MaNV ? 'selected' : '' }}>
                                        {{ $item->Hoten }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Nhân Viên</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="trangthai" required>
                                <option value=""></option>

                                <option value="1" {{ $data->trangthai == '1' ? 'selected' : '' }}>Hoạt động</option>
                                <option value="2" {{ $data->trangthai == '2' ? 'selected' : '' }}>Hết hạn</option>
                            </select>
                            <label for="floatingSelect">Trạng thái</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
