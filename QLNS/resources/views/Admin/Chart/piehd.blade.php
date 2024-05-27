@extends('LayoutAdmin.index')
@section('admin_content')
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
                                            <label class="col-lg-2 col-form-label pr-0 text-center" for="val-skill">Course
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
            width: 500px !important;
            height: 500px !important;
        }
    </style>
    <script src="{{ asset('assetAdmin/js/charhd.js') }}"></script>
@endsection
