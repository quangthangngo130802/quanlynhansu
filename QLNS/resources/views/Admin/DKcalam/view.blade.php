@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Lịch Làm Việc</h6>
                    <div class="row">
                        <div class="col-1">
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.adddkcalam.form') }}">Add</a>

                        </div>
                        <div class="col-8"></div>

                        <div class="col-3">

                            <form id="btn_datecalam" action="" method="GET" class="d-none d-md-flex ms-4 "
                                style="">

                                <input class="form-control border-0" type="date" value="{{ $date }}"
                                    placeholder="Search" name="date" onchange="datecalam()">
                            </form>
                            <script>
                                function datecalam() {
                                    $('#btn_datecalam').submit();
                                }
                            </script>
                        </div>

                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 316px;">Ca làm việc</th>
                                    <th scope="col">{{ $dayOfWeekName }}</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($calam as $item)
                                    <tr>

                                        <td>Ca {{ $item->TenCa }} {{ $item->GioBatDau }}-{{ $item->GioKetThuc }}</td>
                                        <td>
                                            @foreach ($data as $item1)
                                                @if ($item1->MaCa == $item->MaCa)
                                                    @if ($item1->dilam == 2)
                                                        <a class="btn btn-sm btn-info dkcalamhover"
                                                            href="{{ route('admin.updatedkcalam.form', ['Id' => $item1->Id]) }}">{{ $item1->nhanvien->Hoten }}</a>
                                                    @elseif ($item1->dilam == 1)
                                                        <a class="btn btn-sm btn-success dkcalamhover"
                                                            href="{{ route('admin.updatedkcalam.form', ['Id' => $item1->Id]) }}">{{ $item1->nhanvien->Hoten }}</a>
                                                    @else
                                                        <a class="btn btn-sm btn-secondary dkcalamhover"
                                                            href="{{ route('admin.updatedkcalam.form', ['Id' => $item1->Id]) }}">{{ $item1->nhanvien->Hoten }}</a>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </td>



                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
