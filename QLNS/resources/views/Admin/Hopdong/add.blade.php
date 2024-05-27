@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('admin.addhopdong.submit') }}" method="POST">
                        @csrf

                        <h6 class="mb-4"><a href="{{ route('admin.hopdong.form') }}">Back</a></h6>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="tenhd" required>
                            <label for="floatingInput">Tên Hợp Đồng</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="loaihd">
                                @foreach ($loaihopdong as $item)
                                    <option value="{{ $item->MaLoaiHD }}">{{ $item->TenLoaiHD }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Loại Hợp Đồng</label>
                        </div>


                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" name="ngayky" required>
                            <label for="floatingInput">Ngày Ký</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" name="ngaybd" required>
                            <label for="floatingInput">Ngày Bắt Đầu</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" name="ngaykt" required>
                            <label for="floatingInput">Ngày Kết Thúc</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="nhanvien" required>
                                <option value=""></option>
                                @foreach ($nhanvien as $item)
                                    <option value="{{ $item->MaNV }}">{{ $item->Hoten }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Nhân Viên</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="trangthai" required>
                                <option value=""></option>

                                <option value="1">Hoạt động</option>
                                <option value="2">Hết hạn</option>
                            </select>
                            <label for="floatingSelect">Trạng thái</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
