@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Người dùng</h6>
                    <div class="row">
                        <div class="col-1">
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.addnguoidung.form') }}">Add</a>

                        </div>
                        <div class="col-6"></div>
                        <div class="col-5">

                            <form action="{{ route('admin.searchchucvu.submit') }}" method="GET"
                                class="d-none d-md-flex ms-4 " style="">
                                <select name="searchBy" id="" class="form-select"
                                    style="float: left; max-width: 100px; margin-right:20px">
                                    <option value="1">MaCV</option>
                                    <option value="2">Tên CV</option>
                                    <option value="3">Phòng Ban</option>

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
                                    <th scope="col">Email</th>
                                    <th>Nhân viên</th>
                                    <th>Admin</th>

                                    <th>Add</th>
                                    <th>Editor</th>
                                    <th>Delete</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($data as $item)

                                    <form action="{{ route('admin.assignRoles.submit') }}" method="POST">
                                        @csrf
                                        <tr>
                                            <th scope="row">@php
                                                echo $i;
                                                $i++;
                                            @endphp</th>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->nhanvien->Hoten }}</td>
                                            <td><input type="checkbox" name="adminChecked"
                                                    {{ $item->hasRole(['Admin']) ? 'checked' : '' }}></td>
                                            <td><input type="checkbox" name="addChecked"
                                                    {{ $item->hasRole(['Add']) ? 'checked' : '' }}></td>
                                            <td><input type="checkbox" name="editorChecked"
                                                    {{ $item->hasRole(['Edit']) ? 'checked' : '' }}></td>
                                            <td><input type="checkbox" name="deleteChecked"
                                                    {{ $item->hasRole(['Delete']) ? 'checked' : '' }}></td>
                                            <td><a class="btn btn-sm btn-primary"
                                                    href="{{ route('admin.updatenguoidung.form', ['id' => $item->id]) }}">Edit</a>
                                                <a class="btn btn-sm btn-danger mt-1"
                                                    href="{{ route('admin.deletenguoidung', ['id' => $item->id]) }}">Delete</a>
                                                {{-- save --}}
                                                    <button type="submit" class="btn btn-info"><i
                                                        class="fa-solid fa-floppy-disk"></i></button>
                                            </td>
                                            <input type="hidden" name="admin_id" value="{{ $item->id }}">


                                        </tr>
                                    </form>
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
