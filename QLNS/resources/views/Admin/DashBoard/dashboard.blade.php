@extends('LayoutAdmin.index')
@section('admin_content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row g-4 pt-5 pb-5">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Nhân viên</p>
                        <h6 class="mb-0">{{ $totalNV }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Hợp đồng</p>
                        <h6 class="mb-0">{{ $totalHD }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Phòng ban</p>
                        <h6 class="mb-0">{{  $totalPB }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Chức vụ</p>
                        <h6 class="mb-0">{{ $totalCV }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label pr-0 text-center" for="val-skill">Biểu đồ hợp đồng
                                            <span class="text-danger">*</span>
                                        </label>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="chart py-4">
                            {{-- <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div> --}}

                            <canvas id="genderCharthd" width="300" height="150"  class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<style>
    #genderCharthd {
        width: 400px !important;
        height: 400px !important;
    }
</style>
<script src="{{ asset('assetAdmin/js/charhd.js') }}"></script>
<div class="content-body">
    <div class="container-fluid">

        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label pr-0 text-center" for="val-skill">Biểu đồ nhân viên
                                            <span class="text-danger">*</span>
                                        </label>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="chart py-4">
                            {{-- <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div> --}}
                            <canvas id="genderChart" width="300" height="150"  class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<style>
    #genderChart {
        width: 400px !important;
        height: 400px !important;
    }
</style>
<script src="{{ asset('assetAdmin/js/char.js') }}"></script>
@endsection
