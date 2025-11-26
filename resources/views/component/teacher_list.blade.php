@extends('app')
@push('title')
    Teacher List
@endpush

@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">Teacher List</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Teacher List</li>
            </ol>
        </div>
    </div>
    <!--end::Row-->

    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="card shadow p-4">
                <!-- Search Form -->
                <div class="row mb-3">
                    <div class="col-12">
                        <form action="{{ route('teacher.list') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                       placeholder="Search teachers by any field"
                                       value="{{ request('search') }}">
                                <button class="btn btn-primary">Search</button>
                                <a href="{{ route('teacher.list') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Teacher Table -->
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Teacher ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Gender</th>
                                <th>NIC No</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td>{{ $teacher->teacher_id }}</td>
                                    <td>{{ $teacher->name }}</td>
                                    <td>{{ $teacher->email }}</td>
                                    <td>{{ $teacher->phone }}</td>
                                    <td>{{ $teacher->subject }}</td>
                                    <td>{{ $teacher->gender }}</td>
                                    <td>{{ $teacher->nic_no }}</td>
                                    <td>{{ $teacher->address }}</td>
                                    <td>
                                        <a href="{{ route('teacher.register') }}" class="btn btn-success btn-sm">Add</a>
                                        <button class="btn btn-warning btn-sm btn-update-teacher"
                                                data-id="{{ $teacher->id }}"
                                                data-teacher_id="{{ $teacher->teacher_id }}"
                                                data-name="{{ $teacher->name }}"
                                                data-email="{{ $teacher->email }}"
                                                data-phone="{{ $teacher->phone }}"
                                                data-subject="{{ $teacher->subject }}"
                                                data-gender="{{ $teacher->gender }}"
                                                data-nic_no="{{ $teacher->nic_no }}"
                                                data-address="{{ $teacher->address }}">
                                            Update
                                        </button>
                                        <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $teacher->id }}">Delete</button>

                                        <form id="delete-form-{{ $teacher->id }}" action="{{ route('teacher.delete', $teacher->id) }}" method="POST" style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->


    <!-- Update Teacher Modal -->
    <div class="modal fade" id="updateTeacherModal" tabindex="-1" aria-labelledby="updateTeacherModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateTeacherModalLabel">Update Teacher</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateTeacherForm" method="POST" action="">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Teacher ID</label>
                                <input type="text" name="teacher_id" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Subject</label>
                                <input type="text" name="subject" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Gender</label>
                                <select name="gender" class="form-control" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>NIC Number</label>
                                <input type="text" name="nic_no" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Teacher</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Update modal script loaded');

            // UPDATE BUTTON CLICK EVENT
            document.querySelectorAll('.btn-update-teacher').forEach(btn => {
                btn.addEventListener('click', function () {

                    const teacherId = this.dataset.id;

                    // Fill modal inputs
                    document.querySelector('input[name="teacher_id"]').value = this.dataset.teacher_id;
                    document.querySelector('input[name="name"]').value = this.dataset.name;
                    document.querySelector('input[name="email"]').value = this.dataset.email;
                    document.querySelector('input[name="phone"]').value = this.dataset.phone;
                    document.querySelector('input[name="subject"]').value = this.dataset.subject;
                    document.querySelector('select[name="gender"]').value = this.dataset.gender;
                    document.querySelector('input[name="nic_no"]').value = this.dataset.nic_no;
                    document.querySelector('input[name="address"]').value = this.dataset.address;

                    // Update form action
                    document.getElementById('updateTeacherForm').action =
                        "{{ url('/teacher/update') }}/" + teacherId;

                    // Show modal
                    const modal = new bootstrap.Modal(document.getElementById('updateTeacherModal'));
                    modal.show();
                });
            });

            // DELETE BUTTON
            document.querySelectorAll('.btn-delete').forEach(btn => {
                btn.addEventListener('click', function () {
                    const id = this.dataset.id;

                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'This action cannot be undone!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, Delete',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-form-' + id).submit();
                        }
                    });
                });
            });

        });
    </script>
@endpush
