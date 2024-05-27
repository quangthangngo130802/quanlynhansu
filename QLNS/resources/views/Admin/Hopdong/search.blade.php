@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Hợp Đồng</h6>
                    <div class="row">
                        <div class="col-1">
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.addhopdong.form') }}">Add</a>

                        </div>
                        <div class="col-6"></div>
                        <div class="col-5">

                            <form action="{{ route('admin.searchhopdong.submit') }}" method="GET"
                                class="d-none d-md-flex ms-4 " style="">
                                <select name="searchBy" id="" class="form-select"
                                    style="float: left; max-width: 100px; margin-right:20px">
                                    <option value="1" {{ $searchBy == 1 ? 'selected' : '' }}>Mã HĐ</option>
                                    <option value="2" {{ $searchBy == 2 ? 'selected' : '' }}>Tên HĐ</option>
                                    <option value="3" {{ $searchBy == 3 ? 'selected' : '' }}>Loại HĐ</option>
                                    <option value="4" {{ $searchBy == 4 ? 'selected' : '' }}>Ngày ký</option>
                                    <option value="5" {{ $searchBy == 5 ? 'selected' : '' }}>Ngày Bắt Đầu</option>
                                    <option value="6" {{ $searchBy == 6 ? 'selected' : '' }}>Ngày Kết Thúc</option>
                                    <option value="7" {{ $searchBy == 7 ? 'selected' : '' }}>Nhân Viên</option>
                                </select>
                                <input class="form-control border-0" type="search" placeholder="Search" name="search"
                                    required>
                            </form>
                        </div>

                    </div>
                    <div class="table-responsive">
                        @if (@isset($error))
                            <p class="error-p">{{ $error }}</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên HĐ</th>
                                        <th scope="col">Loại HĐ</th>
                                        <th scope="col">Ngày ký</th>
                                        <th scope="col">Ngày bắt đầu</th>
                                        <th scope="col">Ngày kết thúc</th>
                                        <th scope="col">Nhân viên</th>
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
                                            <td>{{ $item->TenHD }}</td>
                                            <td>{{ $item->loaihopdong->TenLoaiHD }}</td>
                                            <td>{{ $item->NgayKy }}</td>
                                            <td>{{ $item->NgayBatDau }}</td>
                                            <td>{{ $item->NgayKetThuc }}</td>
                                            <td>{{ $item->nhanvien->Hoten }}</td>
                                            <td><a class="btn btn-sm btn-primary"
                                                    href="{{ route('admin.updatehopdong.form', ['MaHD' => $item->MaHD]) }}">Edit</a>
                                                <a class="btn btn-sm btn-danger mt-1"
                                                    href="{{ route('admin.deletehopdong', ['MaHD' => $item->MaHD]) }}">Delete</a>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div>
                                {{ $data->appends(['search' => $keyword, 'searchBy' => $searchBy])->links() }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
