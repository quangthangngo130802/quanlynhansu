<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3" style="width:280px">
        <nav class="navbar bg-light navbar-light">
            <a href="{{ route('admin.dashboard') }}" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>HRM</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    @if (Auth::guard('admin')->check())
                        <?php

                        $MaNV = Auth::guard('admin')->user()->MaNV;
                        $nhanvien = App\Models\NhanVien::where('MaNV', $MaNV)->first();
                        $admin_avatar = $nhanvien->anh;
                        ?>
                        @if ($admin_avatar !== null)
                            <img class="rounded-circle me-lg-2" src="{{ asset('assetAdmin/img/' . $admin_avatar) }}"
                                alt="" style="width: 40px; height: 40px;">
                        @endif
                    @endif
                    <div
                        class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                    </div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">
                        @if (Auth::guard('admin')->check())
                            <?php

                            $MaNV = Auth::guard('admin')->user()->MaNV;
                            $nhanvien = App\Models\NhanVien::where('MaNV', $MaNV)->first();
                            $admin_name = $nhanvien->Hoten;
                            ?>
                            @if ($admin_name !== null)
                                {{ $admin_name }}
                            @endif
                        @endif
                    </h6>
                    <span>
                        @if (Auth::guard('admin')->check())
                        <?php

                        $MaNV = Auth::guard('admin')->user()->MaNV;
                        $nhanvien = App\Models\NhanVien::where('MaNV', $MaNV)->first();
                        $MaCV = $nhanvien->MaCV;
                        $chucvu = App\Models\ChucVu::where('MaCV', $MaCV)->first();

                        ?>
                        @if ($chucvu !== null)
                            {{ $chucvu->TenCV }}
                        @endif
                    @endif
                    </span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a  href="{{ route('admin.dashboard') }}" class="nav-item nav-link active"><i
                        class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                        {{-- <a href="{{ route('admin.nhanvien.form') }}" class="nav-item nav-link"><i class="fa-solid fa-user"></i>Nhân
                            Viên</a> --}}
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-user"></i>Quản lý nhân viên</a>
                    <div class="dropdown-menu bg-transparent border-0" style="line-height: 30px;">
                        <a href="{{ route('admin.nhanvien.form') }}" class="dropdown-item">DS Nhân viên</a>
                        <a href="{{ route('admin.chucvu.form') }}" class="dropdown-item">Chức vụ</a>
                        <a href="{{ route('admin.dieuchuyennv.form') }}" class="dropdown-item">Điều chuyển NV</a>
                        <a href="{{ route('admin.hopdong.form') }}" class="dropdown-item">Điều chuyển NV</a>
                    </div>
                </div>
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-user"></i>Quản lý phòng ban</a>
                    <div class="dropdown-menu bg-transparent border-0" style="line-height: 30px;">
                        <a href="{{ route('admin.phongban.form') }}" class="dropdown-item">Phòng ban</a>
                        {{-- <a href="{{ route('admin.chucvu.form') }}" class="dropdown-item">Chức vụ</a>
                        <a href="{{ route('admin.dieuchuyennv.form') }}" class="dropdown-item">Điều chuyển NV</a>
                        <a href="{{ route('admin.hopdong.form') }}" class="dropdown-item">Điều chuyển NV</a> --}}
                    {{-- </div>
                </div> --}}
                <a href="{{ route('admin.phongban.form') }}" class="nav-item nav-link"><i class="fa-solid fa-building-user"></i>Phòng Ban</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-user"></i>Quản lý chấm công</a>
                    <div class="dropdown-menu bg-transparent border-0" style="line-height: 30px;">
                        <a href="{{ route('admin.calam.form') }}" class="dropdown-item">Ca làm</a>
                        <a href="{{ route('admin.dkcalam.form') }}" class="dropdown-item">Dk Ca làm</a>
                        {{-- <a href="{{ route('admin.dieuchuyennv.form') }}" class="dropdown-item">Điều chuyển NV</a>
                        <a hr"{{ route('admin.hopdong.form') }}" class="dropdown-item">Điều chuyển NV</a> --}}
                    </div>
                </div>

                <a href="{{ route('admin.khenthuong.form') }}" class="nav-item nav-link"><i class="fa-solid fa-money-bill-trend-up"></i>Khen thưởng</a>
                {{-- <a href="{{ route('admin.chart.form') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Biểu đồ giới tính</a>
                <a href="{{ route('admin.charthd.form') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Biểu đồ hợp đồng</a> --}}


                {{-- <a href="{{ route('admin.chucvu.form') }}" class="nav-item nav-link"><i class="fa-solid fa-calendar-plus"></i>Chức --}}
                    {{-- Vụ</a> --}}
                {{-- <a href="{{ route('admin.phongban.form') }}" class="nav-item nav-link"><i class="fa-solid fa-building-user"></i>Phòng Ban</a> --}}
                {{-- <a href="{{ route('admin.calam.form') }}" class="nav-item nav-link"><i class="fa-brands fa-upwork"></i>Ca --}}
                    {{-- Làm</a> --}}
                {{-- <a href="{{ route('admin.hopdong.form') }}" class="nav-item nav-link"><i class="fa-solid fa-file-lines"></i>Hợp --}}
                    {{-- Đồng</a> --}}
                {{-- <a href="{{ route('admin.dieuchuyennv.form') }}" class="nav-item nav-link"><i class="fa-solid fa-scroll"></i>Điều Chuyển NV</a> --}}
                {{-- <a href="{{ route('admin.dkcalam.form') }}" class="nav-item nav-link"><i class="fa-solid fa-list-check"></i>ĐK Ca Làm</a> --}}
                <a href="{{ route('admin.bangluong.form') }}" class="nav-item nav-link"><i class="fa-brands fa-cc-amazon-pay"></i>Bảng Tính Lương</a>
                <a href="{{ route('admin.nguoidung.form') }}" class="nav-item nav-link"><i class="fa-solid fa-users"></i>Người dùng</a>




            </div>
        </nav>
    </div>
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>

            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    {{-- <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-envelope me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">Message</span>
                    </a> --}}
                    {{-- <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="img/user.jpg" alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="img/user.jpg" alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="img/user.jpg" alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item text-center">See all message</a>
                    </div> --}}
                </div>
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-bell me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">Notificatin</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">Profile updated</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">New user added</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">Password changed</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item text-center">See all notifications</a>
                    </div>
                </div> --}}
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        @if (Auth::guard('admin')->check())
                            <?php

                            $MaNV = Auth::guard('admin')->user()->MaNV;
                            $nhanvien = App\Models\NhanVien::where('MaNV', $MaNV)->first();
                            $admin_avatar = $nhanvien->anh;
                            ?>
                            @if ($admin_avatar !== null)
                                <img class="rounded-circle me-lg-2"
                                    src="{{ asset('assetAdmin/img/' . $admin_avatar) }}" alt=""
                                    style="width: 40px; height: 40px;">
                            @endif
                        @endif

                        <span class="d-none d-lg-inline-flex">
                            @if (Auth::guard('admin')->check())
                                <?php

                                $MaNV = Auth::guard('admin')->user()->MaNV;
                                $nhanvien = App\Models\NhanVien::where('MaNV', $MaNV)->first();
                                $admin_name = $nhanvien->Hoten;
                                ?>
                                @if ($admin_name !== null)
                                    {{ $admin_name }}
                                @endif
                            @endif
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        {{-- <a href="#" class="dropdown-item">My Profile</a>
                        <a href="#" class="dropdown-item">Settings</a> --}}
                        <a href="{{ route('admin.logout') }}" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->
