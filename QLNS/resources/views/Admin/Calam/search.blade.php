@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Phòng Ban</h6>
                    <div class="row">
                        <div class="col-1">
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.addphongban.form') }}">Add</a>

                        </div>
                        <div class="col-6"></div>
                        <div class="col-5">

                            <form action="{{ route('admin.searchphongban.submit') }}" method="GET"
                                class="d-none d-md-flex ms-4 " style="">
                                <select name="searchBy" id="" class="form-select"
                                    style="float: left; max-width: 100px; margin-right:20px">
                                    <option value="1">MaPB</option>
                                    <option value="2">Tên PB</option>


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
                                        <th scope="col">Tên phòng ban</th>
                                        <th scope="col">Số lượng NV</th>

                                        <th scope="col">Update</th>
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
                                            <td>{{ $item->TenPB }}</td>
                                            <td>{{ $item->SoLuongNV }}</td>

                                            <td>{{ $item->updated_at }}</td>
                                            <td><a class="btn btn-sm btn-primary"
                                                    href="{{ route('admin.updatephongban.form', ['MaPB' => $item->MaPB]) }}">Edit</a>
                                                <a class="btn btn-sm btn-danger mt-1"
                                                    href="{{ route('admin.deletephongban', ['MaPB' => $item->MaPB]) }}">Delete</a>
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
