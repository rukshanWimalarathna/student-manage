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

                <form action="{{ isset($student) ? route('student.update', $student->id) : route('student.store') }}" method="POST">
                    @csrf
                    @if(isset($student))
                        @method('PUT')
                    @endif

                    <!-- Row 1 -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Register Number</label>
                            <input type="text" name="reg_no" class="form-control" placeholder="Enter Register Number"
                                   value="{{ old('reg_no', $student->reg_no ?? '') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                   value="{{ old('name', $student->name ?? '') }}" required>
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email"
                                   value="{{ old('email', $student->email ?? '') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number"
                                   value="{{ old('phone', $student->phone ?? '') }}" required>
                        </div>
                    </div>

                    <!-- Row 3 -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Date of Birth</label>
                            <input type="date" name="date_of_birth" class="form-control"
                                   value="{{ old('date_of_birth', $student->date_of_birth ?? '') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Enter Address"
                                   value="{{ old('address', $student->address ?? '') }}" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-3">
                        {{ isset($student) ? 'Update Student' : 'Submit' }}
                    </button>
                </form>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->

    <!-- SweetAlert Script -->
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Validation Error!',
                html: `@foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach`,
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endsection
