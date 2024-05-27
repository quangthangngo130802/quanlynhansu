@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('admin.addphongban.submit') }}" method="POST">
                        @csrf

                        <h6 class="mb-4"><a href="{{ route('admin.phongban.form') }}">Back</a></h6>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="tenpb" required>
                            <label for="floatingInput">Tên Phòng Ban</label>
                        </div>



                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
