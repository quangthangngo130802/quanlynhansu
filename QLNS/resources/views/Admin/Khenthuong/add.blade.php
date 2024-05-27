@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('admin.addkhenthuong.submit') }}" method="POST">
                        @csrf

                        <h6 class="mb-4"><a href="{{ route('admin.khenthuong.form') }}">Back</a></h6>


                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="nhanvien">
                                <option value=""></option>
                                @foreach ($nhanvien as $item)
                                    <option value="{{ $item->MaNV }}">{{ $item->Hoten }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Nhân viên</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" name="mucktkl" required>
                            <label for="floatingInput">Mức KTKL</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" name="thoigian" required>
                            <label for="floatingInput">Thời gian</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="lydo" required>
                            <label for="floatingInput">Lý do</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="sotien" required>
                            <label for="floatingInput">Số tiền</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="theloai">
                                <option value="0">Khen thưởng</option>
                                <option value="1">Kỷ luật</option>
                            </select>
                            <label for="floatingSelect">Nhân viên</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
