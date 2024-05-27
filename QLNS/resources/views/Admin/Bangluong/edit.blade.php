@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('admin.updatebangluong.submit', ['MaBangLuong' => $data->MaBangLuong]) }}"
                        method="POST">
                        @csrf

                        <h6 class="mb-4"><a href="{{ route('admin.bangluong.form') }}">Back</a></h6>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="hoten"
                                value="{{ $data->Ten }}" required readonly>
                            <label for="floatingInput">Tên Bảng Lương</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="hoten"
                                value="{{ $data->nhanvien->Hoten }}" required readonly>
                            <label for="floatingInput">Người Tạo</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="hoten"
                                value="{{ $data->TongSoNV }}" required readonly>
                            <label for="floatingInput">Tổng Số NV</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="hoten"
                                value="{{ $data->TongLuong }}" required readonly>
                            <label for="floatingInput">Tổng Lương</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="hoten"
                                value="{{ $data->DaTra }}" required readonly>
                            <label for="floatingInput">Đã Trả</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="hoten"
                                value="{{ $data->ConCanTra }}" required readonly>
                            <label for="floatingInput">Còn Cần Trả</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="hoten"
                                value="{{ $data->KyLamViec }}" required readonly>
                            <label for="floatingInput">Kỳ Làm Việc</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="ghichu"
                                value="{{ $data->GhiChu }}">
                            <label for="floatingInput">Ghi Chú</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a style="margin-left: 20px"
                            href="{{ route('admin.ctbangluong.form', ['MaBangLuong' => $data->MaBangLuong]) }}">Xem Bảng
                            Lương</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
