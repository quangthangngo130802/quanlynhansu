@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Điều Chuyển Nhân Viên</h6>
                    <div class="row">
                        <div class="col-1">
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.adddieuchuyennv.form') }}">Add</a>

                        </div>
                        <div class="col-6"></div>
                        <div class="col-5">

                            <form action="{{ route('admin.searchdieuchuyennv.submit') }}" method="GET"
                                class="d-none d-md-flex ms-4 " style="">
                                <select name="searchBy" id="" class="form-select"
                                    style="float: left; max-width: 150px; margin-right:20px">
                                    <option value="1" {{ $searchBy == 1 ? 'selected' : '' }}>Tên Phiếu</option>
                                    <option value="2" {{ $searchBy == 2 ? 'selected' : '' }}>Nhân Viên</option>
                                    <option value="3" {{ $searchBy == 3 ? 'selected' : '' }}>Ngày Bắt Đầu</option>
                                    <option value="4" {{ $searchBy == 4 ? 'selected' : '' }}>Ngày Kết Thúc</option>
                                    <option value="5" {{ $searchBy == 5 ? 'selected' : '' }}>Ngày Duyệt</option>
                                    <option value="6" {{ $searchBy == 6 ? 'selected' : '' }}>Trạng Thái</option>

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
                                        <th scope="col">Tên phiếu</th>
                                        <th scope="col">Nhân viên</th>
                                        {{-- <th scope="col">PB hiện tại</th>
                                    <th scope="col">PB chuyển đến</th> --}}
                                        <th scope="col">CV hiện tại</th>
                                        <th scope="col">CV chuyển đến</th>
                                        <th scope="col">Ngày kết thúc</th>
                                        <th scope="col">Ngày bắt đầu</th>
                                        <th scope="col">Ngày duyệt</th>
                                        <th scope="col">Trạng thái</th>
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
                                            <td>{{ $item->TenPhieu }}</td>
                                            <td>{{ $item->nhanvien->Hoten }}</td>
                                            {{-- <td>{{ $item->phongban1->TenPB }}</td>
                                        <td>{{ $item->phongban2->TenPB }}</td> --}}
                                            <td>{{ $item->chucvu1->TenCV }}</td>
                                            <td>{{ $item->chucvu2->TenCV }}</td>
                                            <td>{{ $item->NgayKT }}</td>
                                            <td>{{ $item->NgayBD }}</td>
                                            <td>{{ $item->NgayDuyet }}</td>
                                            <td>
                                                @if ($item->TrangThai == 'Đang Chờ')
                                                    <button type="button"
                                                        class="btn btn-warning">{{ $item->TrangThai }}</button>
                                                @elseif ($item->TrangThai == 'Đã Duyệt')
                                                    <button type="button"
                                                        class="btn btn-info">{{ $item->TrangThai }}</button>
                                                @else
                                                    <button type="button"
                                                        class="btn btn-secondary">{{ $item->TrangThai }}</button>
                                                @endif
                                            </td>

                                            <td><a class="btn btn-sm btn-primary"
                                                    href="{{ route('admin.updatedieuchuyennv.form', ['MaPhieu' => $item->MaPhieu]) }}">Edit</a>
                                                <a class="btn btn-sm btn-danger mt-1"
                                                    href="{{ route('admin.deletedieuchuyennv', ['MaPhieu' => $item->MaPhieu]) }}">Delete</a>
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
