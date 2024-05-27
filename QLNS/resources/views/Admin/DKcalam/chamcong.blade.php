@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('admin.chamcong.submit', ['Id' => $data->Id]) }}" method="POST">
                        @csrf

                        <h6 class="mb-4"><a href="{{ route('admin.dkcalam.form') }}">Back</a></h6>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" name="date"
                                value="{{ $data->date }}" readonly>
                            <label for="floatingInput">Ngày</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput"
                                value="{{ $data->nhanvien->Hoten }}" readonly>
                            <label for="floatingInput">Nhân Viên</label>

                        </div>
                        <input type="hidden" name="maca" value="{{ $data->calam->MaCa }}">
                        <input type="hidden" name="manv" value="{{ $data->nhanvien->MaNV }}">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput"
                                value="{{ $data->calam->TenCa }} {{ $data->calam->GioBatDau }}-{{ $data->calam->GioKetThuc }}"
                                readonly>
                            <label for="floatingInput">Ca Làm</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="dilam" id="inlineRadio1"
                                checked>
                            <label class="form-check-label" for="inlineRadio1">Đi Làm</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="nghilam" id="inlineRadio2"
                            {{ $data->dilam == 0 ? '<script>nghilamfc()</script>' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Nghỉ Làm</label>
                        </div>
                        <br>
                        <input type="hidden" id="giovao0" value="{{ $data->calam->GioBatDau }}">
                        <input type="hidden" id="giora0" value="{{ $data->calam->GioKetThuc }}">
                        <div id="vaora">
                            <div>

                                <div class="form-floating mb-3" style="float: left"  id="divgiovao">
                                    <input type="time" class="inputgio" id="giovao" name="giovao"
                                        style="width:150px">
                                    <label for="floatingInput">Vào:</label>
                                </div>
                                <div id="sosanhgiovao">
                                    {{-- <span class="labelgio">
                                        <label for="undefined">Làm thêm:</label>
                                    </span>
                                    <div>
                                        <input class="inputgio" type="number" min="0" name="gio">
                                        <span>giờ</span>
                                        <input class="inputgio" type="number" min="0" name="phut">
                                        <span>phút</span>

                                    </div> --}}
                                </div>
                            </div>
                            <div style="clear: both;">
                                <div class="form-floating mb-3" style="float: left" id="divgiora">
                                    <input type="time" class="inputgio" id="giora" name="giora"
                                        style="width:150px">
                                    <label for="floatingInput">Ra:</label>
                                </div>
                                <div id="sosanhgiora">
                                </div>
                                <div id="tangca">
                                </div>
                                <input type="hidden" id="tglamthemvao" name="tglamthemvao" value="0">
                                <input type="hidden" id="tglamthemra" name="tglamthemra" value="0">
                                <input type="hidden" id="tgvao" name="tgvao" value="0">
                                <input type="hidden" id="tgra" name="tgra" value="0">
                            </div>

                            <button  type="submit" class="btn btn-primary mt-3">Save</button>
                        </div>

                        {{-- <button type="submit" class="btn btn-primary mt-3">Save</button> --}}
                    </form>
                </div>
            </div>

        </div>
    </div>
    <script src="{{ asset('assetAdmin/js/chamcong.js') }}"></script>
@endsection
