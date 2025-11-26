@extends('app')
@push('title')
    Admin Dashboard
@endpush
@push('page_header_title')
    Admin Dashboard
@endpush

@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">
                @stack('page_header_title')
            </h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
            </ol>
        </div>
    </div>
    <!--end::Row-->

    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <!-- Student Count Card -->
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3>{{ $studentCount }}</h3>
                            <p>Total Students</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z"></path>
                        </svg>
                        <a href="{{ route('student.list') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            View Students <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Teacher Count Card -->
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-success">
                        <div class="inner">
                            <h3>{{ $teacherCount }}</h3>
                            <p>Total Teachers</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z"></path>
                        </svg>
                        <a href="{{ route('teacher.list') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            View Teachers <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Total Users Card -->
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-info">
                        <div class="inner">
                            <h3>{{ $userCount }}</h3>
                            <p>System Users</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
                        </svg>
                        <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            Manage Users <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- System Status Card -->
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-warning">
                        <div class="inner">
                            <h3>Active</h3>
                            <p>System Status</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.516 2.17a.75.75 0 00-1.032 0 11.209 11.209 0 01-7.877 3.08.75.75 0 00-.722.515A12.74 12.74 0 002.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.749.749 0 00.374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 00-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08zm3.094 8.016a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="#" class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                            System Info <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!--end::Row-->

            <!-- Quick Actions -->
            <div class="row mt-5">
                <div class="col-12">
                    <h4 class="mb-3">Quick Actions</h4>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="bi bi-person-plus fs-1 text-primary"></i>
                            <h5 class="card-title mt-2">Add Student</h5>
                            <a href="{{ route('student.register') }}" class="btn btn-primary btn-sm">Go</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="bi bi-person-badge fs-1 text-success"></i>
                            <h5 class="card-title mt-2">Add Teacher</h5>
                            <a href="{{ route('teacher.register') }}" class="btn btn-success btn-sm">Go</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="bi bi-list-ul fs-1 text-info"></i>
                            <h5 class="card-title mt-2">View Students</h5>
                            <a href="{{ route('student.list') }}" class="btn btn-info btn-sm">Go</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="bi bi-people fs-1 text-warning"></i>
                            <h5 class="card-title mt-2">View Teachers</h5>
                            <a href="{{ route('teacher.list') }}" class="btn btn-warning btn-sm">Go</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
@endsection
