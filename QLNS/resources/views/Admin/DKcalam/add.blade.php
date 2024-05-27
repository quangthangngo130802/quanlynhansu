@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('admin.adddkcalam.submit') }}" method="POST">
                        @csrf

                        <h6 class="mb-4"><a href="{{ route('admin.dkcalam.form') }}">Back</a></h6>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" name="date" value="{{ $date }}" required>
                            <label for="floatingInput">Ngày</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="calam">
                                <option value="1">Hành Chính</option>
                                <option value="2">Sáng</option>
                                <option value="3">Chiều</option>
                                <option value="4">Tối</option>
                            </select>
                            <label for="floatingSelect">Ca Làm</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select style="height: 150px" class="form-select" id="nhanvien" name="nhanvien[]"  multiple required>

                                @foreach ($nhanvien as $item)
                                    <option value="{{ $item->MaNV }}">{{ $item->Hoten }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Nhân Viên</label>
                        </div>



                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
