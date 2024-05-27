@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('admin.updatectbangluong.submit', ['MaCTLuong' => $data->MaCTLuong]) }}"
                        method="POST">
                        @csrf

                        <h6 class="mb-4"><a
                                href="{{ route('admin.ctbangluong.form', ['MaBangLuong' => $data->MaBangLuong]) }}">Back</a>
                        </h6>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nhanvien" name="nhanvien"
                                value="{{ $data->nhanvien->Hoten }}" required readonly>
                            <label for="floatingInput">Nhân Viên</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="luongchinh" name="luongchinh"
                                onchange="tinhluong()" value="{{ $data->TongLuongCB }}" required readonly>
                            <label for="floatingInput">Lương chính</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="lamthem" name="lamthem" onchange="tinhluong()"
                                value="{{ $data->TongLuongTC }}" required readonly>
                            <label for="floatingInput">Làm Thêm</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="phucap" name="phucap" onchange="tinhluong()"
                                value="{{ $data->TongPhuCap }}" required>
                            <label for="floatingInput">Phụ Cấp</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="thue" name="thue" onchange="tinhluong()"
                                value="{{ $data->TongThue }}" required>
                            <label for="floatingInput">Thuế</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="baohiem" name="baohiem" onchange="tinhluong()"
                                value="{{ $data->baohiem }}" required>
                            <label for="floatingInput">Bảo Hiểm</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="khenthuong" name="khenthuong"
                                onchange="tinhluong()" value="{{ $data->tienthuong }}" required>
                            <label for="floatingInput">Khen Thưởng</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="giamtru" name="giamtru" onchange="tinhluong()"
                                value="{{ $data->giamtru }}">
                            <label for="floatingInput">Giảm Trừ</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="tongluong" name="tongluong"
                                onchange="tinhluong()" value="{{ $data->LuongThucLinh }}" readonly>
                            <label for="floatingInput">Tổng Lương</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="datranv" name="datranv" onchange="tinhluong()"
                                value="{{ $data->danhan }}">
                            <label for="floatingInput">Đã Trả NV</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="concantra" name="concantra"
                                {{-- value="{{ $data->LuongThucLinh }}"  --}}>
                            <label for="floatingInput">Còn Cần Trả</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>

                    </form>
                </div>
            </div>

        </div>
    </div>
    <script src="{{ asset('assetAdmin/js/bangluong.js') }}"></script>
    <script>
        function tinhluong() {
            var luongchinh = parseFloat($('#luongchinh').val());
            var lamthem = parseFloat($('#lamthem').val());
            var phucap = parseFloat($('#phucap').val());
            var thue = parseFloat($('#thue').val());
            var baohiem = parseFloat($('#baohiem').val());
            var khenthuong = parseFloat($('#khenthuong').val());
            var giamtru = parseFloat($('#giamtru').val());
            var datranv = parseFloat($('#datranv').val());

            var tongluong1 = luongchinh + lamthem + phucap - baohiem - thue + khenthuong - giamtru;
            var concantra = tongluong1 - datranv;
            $('#concantra').val(concantra);
            $('#tongluong').val(tongluong1);
        }
    </script>
@endsection
