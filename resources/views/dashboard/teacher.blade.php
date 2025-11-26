@extends('app')
@push('title')
    Teacher Dashboard
@endpush
@push('page_header_title')
    Teacher Dashboard
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
                <li class="breadcrumb-item active" aria-current="page">Teacher Dashboard</li>
            </ol>
        </div>
    </div>
    <!--end::Row-->

    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!-- Welcome Message -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="alert alert-info">
                        <h4 class="alert-heading">Welcome, {{ $teacher->name }}!</h4>
                        <p class="mb-0">This is your teacher dashboard. You can manage your classes and students here.</p>
                    </div>
                </div>
            </div>

            <!-- Teacher Stats -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3>5</h3>
                            <p>My Subjects</p>
                        </div>
                        <i class="small-box-icon bi bi-journal-text"></i>
                        <a href="#" class="small-box-footer link-light">
                            View Subjects <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-success">
                        <div class="inner">
                            <h3>3</h3>
                            <p>My Classes</p>
                        </div>
                        <i class="small-box-icon bi bi-people-fill"></i>
                        <a href="#" class="small-box-footer link-light">
                            View Classes <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-info">
                        <div class="inner">
                            <h3>45</h3>
                            <p>Total Students</p>
                        </div>
                        <i class="small-box-icon bi bi-person-check"></i>
                        <a href="#" class="small-box-footer link-light">
                            View Students <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-warning">
                        <div class="inner">
                            <h3>12</h3>
                            <p>Pending Tasks</p>
                        </div>
                        <i class="small-box-icon bi bi-clock-history"></i>
                        <a href="#" class="small-box-footer link-dark">
                            View Tasks <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Teacher Information -->
            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">My Profile</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Name:</strong> {{ $teacher->name }}</p>
                            <p><strong>Email:</strong> {{ $teacher->email }}</p>
                            <p><strong>Username:</strong> {{ $teacher->username }}</p>
                            <p><strong>Role:</strong> <span class="badge bg-success">Teacher</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Quick Links</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-primary text-start">
                                    <i class="bi bi-journal-text me-2"></i>My Subjects
                                </button>
                                <button class="btn btn-outline-success text-start">
                                    <i class="bi bi-people me-2"></i>My Classes
                                </button>
                                <button class="btn btn-outline-info text-start">
                                    <i class="bi bi-person-lines-fill me-2"></i>Student Lists
                                </button>
                                <button class="btn btn-outline-warning text-start">
                                    <i class="bi bi-clock me-2"></i>Attendance
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
@endsection
