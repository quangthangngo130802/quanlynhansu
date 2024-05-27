@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('admin.updatedieuchuyennv.submit', ['MaPhieu' => $data->MaPhieu]) }}" method="POST">
                        @csrf

                        <h6 class="mb-4"><a href="{{ route('admin.dieuchuyennv.form') }}">Back</a></h6>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="tenphieu"
                                value="{{ $data->TenPhieu }}" required>
                            <label for="floatingInput">Tên Phiếu</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="nhanvien" required>
                                <option value=""></option>
                                @foreach ($nhanvien as $item)
                                    <option value="{{ $item->MaNV }}" {{ $item->MaNV == $data->MaNV ? 'selected' : '' }}>
                                        {{ $item->Hoten }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Nhân Viên</label>
                        </div>
                        {{-- <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="pbht" required>
                                <option value=""></option>
                                @foreach ($phongban as $item)
                                    <option value="{{ $item->MaPB }}"
                                        {{ $item->MaPB == $data->PBHienTai ? 'selected' : '' }}>
                                        {{ $item->TenPB }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Phòng Ban Hiện Tại</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="pbcd" required>
                                <option value=""></option>
                                @foreach ($phongban as $item)
                                    <option value="{{ $item->MaPB }}"
                                        {{ $item->MaPB == $data->PBChuyenDen ? 'selected' : '' }}>{{ $item->TenPB }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Phòng Ban Chuyển Đến</label>
                        </div> --}}
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="cvht" required>
                                <option value=""></option>
                                @foreach ($chucvu as $item)
                                    <option value="{{ $item->MaCV }}" {{ $item->MaCV == $data->CVHienTai ? 'selected' : '' }}>{{ $item->TenCV }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Chức Vụ Hiện Tại</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="cvcd" required>
                                <option value=""></option>
                                @foreach ($chucvu as $item)
                                    <option value="{{ $item->MaCV }}"  {{ $item->MaCV == $data->CVChuyenDen ? 'selected' : '' }}>{{ $item->TenCV }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Chức Vụ Chuyển Đến</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" name="ngaykt"
                                value="{{ $data->NgayKT }}" required>
                            <label for="floatingInput">Ngày Kết Thúc</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" name="ngaybd"
                                value="{{ $data->NgayBD }}" required>
                            <label for="floatingInput">Ngày Bắt Đầu</label>
                        </div>


                        {{-- Phân quyền --}}
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="trangthai" required>
                                <option value="Đang Chờ">Đang Chờ</option>
                                <option value="Đã Duyệt">Đã Duyệt</option>
                                <option value="Từ Chối">Từ Chối</option>
                            </select>
                            <label for="floatingSelect">Trạng Thái</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
