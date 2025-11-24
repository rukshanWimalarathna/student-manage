@extends('app')
@push('title')
    Student List
@endpush

@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">Student List</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Student List</li>
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
                        <form action="{{ route('student.list') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                       placeholder="Search students by any field"
                                       value="{{ request('search') }}">
                                <button class="btn btn-primary">Search</button>
                                <a href="{{ route('student.list') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Student Table -->
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Reg No</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">DOB</th>
                                <th scope="col">Phone No</th>
                                <th scope="col">Address</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->reg_no }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->date_of_birth }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>{{ $student->address }}</td>
                                    <td>
                                        <a href="{{ route('student.register') }}" class="btn btn-success btn-sm">Add</a>
                                        <button class="btn btn-warning btn-sm btn-update"
                                                data-id="{{ $student->id }}"
                                                data-reg_no="{{ $student->reg_no }}"
                                                data-name="{{ $student->name }}"
                                                data-email="{{ $student->email }}"
                                                data-phone="{{ $student->phone }}"
                                                data-date_of_birth="{{ $student->date_of_birth }}"
                                                data-address="{{ $student->address }}">
                                            Update
                                        </button>
                                        <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $student->id }}">Delete</button>

                                        <form id="delete-form-{{ $student->id }}" action="{{ route('student.delete', $student->id) }}" method="POST" style="display:none;">
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
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->

    <!-- Update Student Modal -->
    <div class="modal fade" id="updateStudentModal" tabindex="-1" aria-labelledby="updateStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateStudentModalLabel">Update Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateStudentForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Register Number</label>
                                <input type="text" name="reg_no" class="form-control" required>
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
                                <label>Date of Birth</label>
                                <input type="date" name="date_of_birth" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // SweetAlert for delete confirmation
            const deleteButtons = document.querySelectorAll('.btn-delete');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const studentId = this.getAttribute('data-id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-form-' + studentId).submit();
                        }
                    });
                });
            });

            // Update Student Modal
            const updateButtons = document.querySelectorAll('.btn-update');
            const updateModal = new bootstrap.Modal(document.getElementById('updateStudentModal'));
            const updateForm = document.getElementById('updateStudentForm');

            updateButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const studentId = this.getAttribute('data-id');
                    const regNo = this.getAttribute('data-reg_no');
                    const name = this.getAttribute('data-name');
                    const email = this.getAttribute('data-email');
                    const phone = this.getAttribute('data-phone');
                    const dateOfBirth = this.getAttribute('data-date_of_birth');
                    const address = this.getAttribute('data-address');

                    // Set form action
                    updateForm.action = `/student/update/${studentId}`;

                    // Fill form with current data
                    updateForm.querySelector('input[name="reg_no"]').value = regNo;
                    updateForm.querySelector('input[name="name"]').value = name;
                    updateForm.querySelector('input[name="email"]').value = email;
                    updateForm.querySelector('input[name="phone"]').value = phone;
                    updateForm.querySelector('input[name="date_of_birth"]').value = dateOfBirth;
                    updateForm.querySelector('input[name="address"]').value = address;

                    // Show modal
                    updateModal.show();
                });
            });

            // SweetAlert for success messages
            @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
            @endif
        });
    </script>
@endpush
