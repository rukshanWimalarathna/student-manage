@extends('app')
@push('title')
    Student Register
@endpush
@push('page_header_title')
    Student Register
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
                <li class="breadcrumb-item active" aria-current="page">Student Register</li>
            </ol>
        </div>
    </div>
    <!--end::Row-->

    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="card shadow p-4 bg-secondary-subtle">
                <h3 class="text-center mb-4">Student Registration Form</h3>

                <form id="studentForm">
                    <!-- Row 1 -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Register Number</label>
                            <input type="text" id="regNo" class="form-control" placeholder="Enter Register Number">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Name</label>
                            <input type="text" id="name" class="form-control" placeholder="Enter Name">
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Address</label>
                            <input type="text" id="address" class="form-control" placeholder="Enter Address">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Date of Birth</label>
                            <input type="date" id="dob" class="form-control">
                        </div>
                    </div>

                    <!-- Row 3 -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Age</label>
                            <input type="number" id="age" class="form-control" placeholder="Enter Age">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Weight</label>
                            <input type="number" id="weight" class="form-control" placeholder="Enter Weight">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
                </form>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->

    <!-- Add your existing scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/validation.js"></script>
@endsection
