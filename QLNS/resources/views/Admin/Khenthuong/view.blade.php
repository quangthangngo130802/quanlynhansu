@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Nhân Viên</h6>
                    <div class="row">
                        <div class="col-1">
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.addSkhenthuong.form') }}">Add</a>

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

                                    <th scope="col">Mã NV</th>
                                    <th scope="col">Mức KTKL</th>
                                    <th scope="col">Thời gian</th>
                                    <th scope="col">Lý do</th>
                                    <th scope="col">Số tiền</th>
                                    <th scope="col">Thể loại</th>
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
                                        <td>{{ $item->MucKTKL }}</td>
                                        <td>{{ $item->ThoiGian }}</td>
                                        <td>{{ $item->LyDo }}</td>
                                        <td>{{ $item->SoTien }}</td>
                                        <td>{{ $item->theloai == 0?'Khen thưởng':'Kỷ luật' }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-primary"
                                                href="{{ route('admin.updatekhenthuong.form', ['MaKTKL' => $item->MaKTKL ]) }}">Edit</a>
                                            <a class="btn btn-sm btn-danger mt-1"
                                                href="{{ route('admin.deletekhenthuong', ['MaKTKL' => $item->MaKTKL ]) }}">Delete</a>
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
