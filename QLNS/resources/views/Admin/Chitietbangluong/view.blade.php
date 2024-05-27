@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Chi Tiết Bảng Lương</h6>
                    <div class="row">
                        <div class="col-1">
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.addbangluong.form') }}">Add</a>

                        </div>
                        <div class="col-6"></div>
                        <div class="col-5">

                            <form action="{{ route('admin.searchnhanvien.submit') }}" method="GET"
                                class="d-none d-md-flex ms-4 " style="">
                                <select name="searchBy" id="" class="form-select"
                                    style="float: left; max-width: 100px; margin-right:20px">
                                    <option value="1">Nhân viên</option>
                                    <option value="2">Họ tên</option>
                                    <option value="3">Địa chỉ</option>
                                    <option value="4">Sđt</option>
                                    <option value="5">Email</option>
                                </select>
                                <input class="form-control border-0" type="search" placeholder="Search" name="search"
                                    required>
                            </form>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nhân viên</th>
                                    <th scope="col">Lương chính</th>
                                    <th scope="col">Làm thêm</th>
                                    <th scope="col">Phụ cấp</th>
                                    <th scope="col">Thuế</th>
                                    <th scope="col">Bảo hiểm</th>
                                    <th scope="col">Khen thưởng</th>
                                    <th scope="col">Giảm trừ</th>
                                    <th scope="col">Tổng lương</th>
                                    <th scope="col">Đã trả NV</th>
                                    <th scope="col">Còn cần trả</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">@php
                                            echo $i;
                                            $i++;
                                        @endphp</th>
                                        <td>{{ $item->nhanvien->Hoten }}</td>
                                        <td>{{ $item->TongLuongCB }}</td>
                                        <td>{{ $item->TongLuongTC }}</td>
                                        <td>{{ $item->TongPhuCap }}</td>
                                        <td>{{ $item->TongThue }}</td>
                                        <td>{{ $item->baohiem }}</td>
                                        <td>{{ $item->tienthuong }}</td>
                                        <td>{{ $item->giamtru }}</td>
                                        <td>{{ $item->LuongThucLinh }}</td>
                                        <td>{{ $item->danhan }}</td>
                                        <td>{{ $item->LuongThucLinh - $item->danhan }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-primary"
                                                href="{{ route('admin.updatectbangluong.form', ['MaCTLuong' => $item->MaCTLuong]) }}">Edit</a><br>
                                            <a class="btn btn-sm btn-danger mt-1"
                                                href="{{ route('admin.deletectbangluong', ['MaCTLuong' => $item->MaCTLuong]) }}">Delete</a>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div>
                            {{ $data->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
