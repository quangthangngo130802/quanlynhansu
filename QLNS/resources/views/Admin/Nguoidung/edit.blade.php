@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('admin.updatenguoidung.submit', ['id' => $data->id]) }}" method="POST">
                        @csrf

                        <h6 class="mb-4"><a href="{{ route('admin.nguoidung.form') }}">Back</a></h6>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" name="email" value="{{ $data->email }}" readonly >
                            <label for="floatingInput">Email</label>
                            @if ($errors->has('email'))
                                {{ $errors }}
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="password" value="{{ $data->password }}" required>
                            <label for="floatingInput">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="nhanvien" required>
                                <option value=""></option>
                                @foreach ($nhanvien as $item)
                                    <option value="{{ $item->MaNV  }}" {{ $item->MaNV == $data->MaNV?'selected':'' }}>{{ $item->Hoten }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Nhân Viên</label>
                        </div>


                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
