@extends('app')
@push('title')
    Teacher Register
@endpush
@push('page_header_title')
    Teacher Register
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
                <li class="breadcrumb-item active" aria-current="page">Teacher Register</li>
            </ol>
        </div>
    </div>
    <!--end::Row-->

    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="card shadow p-4 bg-secondary-subtle">
                <h3 class="text-center mb-4">Teacher Registration Form</h3>

                <form action="{{ isset($teacher) ? route('teacher.update', $teacher->id) : route('teacher.store') }}" method="POST">
                    @csrf
                    @if(isset($teacher))
                        @method('PUT')
                    @endif

                    <!-- Row 1 -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Teacher ID</label>
                            <input type="text" name="teacher_id" class="form-control" placeholder="Enter Teacher ID"
                                   value="{{ old('teacher_id', $teacher->teacher_id ?? '') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                   value="{{ old('name', $teacher->name ?? '') }}" required>
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email"
                                   value="{{ old('email', $teacher->email ?? '') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number"
                                   value="{{ old('phone', $teacher->phone ?? '') }}" required>
                        </div>
                    </div>

                    <!-- Row 3 -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Subject</label>
                            <input type="text" name="subject" class="form-control" placeholder="Enter Subject"
                                   value="{{ old('subject', $teacher->subject ?? '') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Gender</label>
                            <select name="gender" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="Male" {{ (old('gender', $teacher->gender ?? '') == 'Male') ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ (old('gender', $teacher->gender ?? '') == 'Female') ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ (old('gender', $teacher->gender ?? '') == 'Other') ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                    </div>

                    <!-- Row 4 -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>NIC Number</label>
                            <input type="text" name="nic_no" class="form-control" placeholder="Enter NIC Number"
                                   value="{{ old('nic_no', $teacher->nic_no ?? '') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Enter Address"
                                   value="{{ old('address', $teacher->address ?? '') }}" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-3">
                        {{ isset($teacher) ? 'Update Teacher' : 'Register Teacher' }}
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
