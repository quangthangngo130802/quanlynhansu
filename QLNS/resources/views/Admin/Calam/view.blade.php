@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Ca Làm</h6>
                    <div class="row">
                        <div class="col-1">
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.addcalam.form') }}">Add</a>

                        </div>
                        <div class="col-6"></div>
                        <div class="col-5">

                            {{-- <form action="{{ route('admin.searchphongban.submit') }}" method="GET"
                                class="d-none d-md-flex ms-4 " style="">
                                <select name="searchBy" id="" class="form-select"
                                    style="float: left; max-width: 100px; margin-right:20px">
                                    <option value="1">MaPB</option>
                                    <option value="2">Tên PB</option>


                                </select>
                                <input class="form-control border-0" type="search" placeholder="Search" name="search"
                                    required>
                            </form> --}}
                        </div>

                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên ca</th>
                                    <th scope="col">Loại ca</th>
                                    <th scope="col">Giờ bắt đầu</th>
                                    <th scope="col">Giờ kết thúc</th>
                                    <th scope="col">Số giờ làm việc</th>
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
                                        <td>{{ $item->TenCa }}</td>
                                        <td>{{ $item->LoaiCa }}</td>
                                        <td>{{ $item->GioBatDau }}</td>
                                        <td>{{ $item->GioKetThuc }}</td>
                                        <td>{{ $item->SoGioLamViec }}</td>
                                        <td><a class="btn btn-sm btn-primary"
                                                href="{{ route('admin.updatecalam.form', ['MaCa' => $item->MaCa]) }}">Edit</a>
                                            <a class="btn btn-sm btn-danger mt-1"
                                                href="{{ route('admin.deletecalam', ['MaCa' => $item->MaCa]) }}">Delete</a>
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
