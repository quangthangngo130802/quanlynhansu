@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('admin.addcalam.submit') }}" method="POST">
                        @csrf

                        <h6 class="mb-4"><a href="{{ route('admin.calam.form') }}">Back</a></h6>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="tenca">
                                <option value="Hành Chính">Hành Chính</option>
                                <option value="Sáng">Sáng</option>
                                <option value="Chiều">Chiều</option>
                                <option value="Tối">Tối</option>
                            </select>
                            <label for="floatingSelect">Tên Ca</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="loaica">
                                <option value="Cố Định">Cố Định</option>
                                <option value="Linh Hoạt">Linh Hoạt</option>

                            </select>
                            <label for="floatingSelect">Loại Ca</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="giobd" required>
                            <label for="floatingInput">Giờ Bắt Đầu</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="giokt" required>
                            <label for="floatingInput">Giờ Kết Thúc</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="sglv" required>
                            <label for="floatingInput">Số Giờ Làm Việc</label>
                        </div>


                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
