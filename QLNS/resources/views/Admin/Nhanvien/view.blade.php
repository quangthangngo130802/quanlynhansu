@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Nhân Viên</h6>
                    <div class="row">
                        <div class="col-1">
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.addSnhanvien.form') }}">Add</a>

                        </div>
                        <div class="col-6"></div>
                        <div class="col-5">

                            <form action="{{ route('admin.searchnhanvien.submit') }}" method="GET"
                                class="d-none d-md-flex ms-4 " style="">
                                <select name="searchBy" id="" class="form-select"
                                    style="float: left; max-width: 100px; margin-right:20px">
                                    <option value="1">MaNV</option>
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
                                    <th scope="col">Họ tên</th>
                                    <th scope="col">Giới tính</th>
                                    <th scope="col">Ngày sinh</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Sđt</th>
                                    <th scope="col">Số CCCD</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Quê quán</th>
                                    <th scope="col">Chức vụ</th>
                                    <th scope="col">Phòng ban</th>
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
                                        <td>{{ $item->Hoten }}</td>
                                        <td>{{ $item->GioiTinh }}</td>
                                        <td>{{ $item->NgaySinh }}</td>
                                        <td>{{ $item->DiaChi }}</td>
                                        <td>{{ $item->SoDienThoai }}</td>
                                        <td>{{ $item->SoCCCD }}</td>
                                        <td>{{ $item->Email }}</td>
                                        <td>{{ $item->QueQuan }}</td>
                                        <td>{{ $item->chucvu->TenCV }}</td>
                                        <td>{{ $item->chucvu->phongban->TenPB }}</td>
                                        <td><a class="btn btn-sm btn-primary"
                                                href="{{ route('admin.updatenhanvien.form', ['MaNV' => $item->MaNV]) }}">Edit</a>
                                            <a class="btn btn-sm btn-danger mt-1"
                                                href="{{ route('admin.deletenhanvien', ['MaNV' => $item->MaNV]) }}">Delete</a>
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
