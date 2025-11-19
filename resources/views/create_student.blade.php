@extends('app')
@push('title')
Student Register
@endpush
@push('nav-brand')
    LMS
@endpush

@push('css')
    <style>

    </style>
@endpush
@section('content')
    <div class="container-fluid mt-5">
         <div class="row">
            <div class="col-12">
                 <h1 class="mt-5">Student Register Form</h1>
            </div>
        <div class="col-6">
            <form action="{{route('student.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Register No </label>
                    <input type="text" name="reg_no" class="form-control"  placeholder="Register NO" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Name </label>
                    <input type="text" name="name" class="form-control"  placeholder="name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="email" name="email" class="form-control"  placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Phone No</label>
                    <input type="text" name="Phoneno" class="form-control"  placeholder="Phone No" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">DOB</label>
                    <input type="date" name="Birthday" class="form-control"  placeholder="Birthday" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" name="Address" class="form-control"  placeholder="Address" required>
                </div>


                <button type="submit" class="btn btn-success mt-3  w-100">Register</button>
            </form>
        </div>
             <div class="col-6">
                 <table class="table">
                     <thead>
                     <tr>
                         <th scope="col">#</th>
                         <th scope="col">Reg No</th>
                         <th scope="col">Full Name</th>
                         <th scope="col">DOB</th>
                         <th scope="col">Email</th>
                         <th scope="col">Phone No</th>
                     </tr>
                     </thead>
                     <tbody>
                     <tr>
                         <th scope="row">1</th>
                         <td>Mark</td>
                         <td>Otto</td>
                         <td>1996.12.10</td>
                         <th scope="row">ruks@gmail.com</th>
                         <td>0124564751</td>


                     </tr>


                     </tbody>
                 </table>
             </div>
    </div>
    </div>


@endsection()
@push('script')
    <script>

    </script>
@endpush
