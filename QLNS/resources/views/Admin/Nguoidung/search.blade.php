@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Chức Vụ</h6>
                    <div class="row">
                        <div class="col-1">
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.addchucvu.form') }}">Add</a>

                        </div>
                        <div class="col-6"></div>
                        <div class="col-5">

                            <form action="{{ route('admin.searchchucvu.submit') }}" method="GET"
                                class="d-none d-md-flex ms-4 " style="">
                                <select name="searchBy" id="" class="form-select"
                                    style="float: left; max-width: 100px; margin-right:20px">
                                    <option value="1" {{ $searchBy == 1 ? 'selected' : '' }}>MaCV</option>
                                    <option value="2" {{ $searchBy == 2 ? 'selected' : '' }}>Tên CV</option>
                                    <option value="3" {{ $searchBy == 3 ? 'selected' : '' }}>Phòng Ban</option>

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
                                        <th scope="col">Tên chức vụ</th>
                                        <th scope="col">Cấp bậc</th>
                                        <th scope="col">Phòng ban</th>
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
                                            <td>{{ $item->TenCV }}</td>
                                            <td>{{ $item->CapBac }}</td>
                                            <td>{{ $item->phongban->TenPB }}</td>
                                            <td>{{ $item->updated_at }}</td>
                                            <td><a class="btn btn-sm btn-primary"
                                                    href="{{ route('admin.updatechucvu.form', ['MaCV' => $item->MaCV]) }}">Edit</a>
                                                <a class="btn btn-sm btn-danger mt-1"
                                                    href="{{ route('admin.deletechucvu', ['MaCV' => $item->MaCV]) }}">Delete</a>
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
