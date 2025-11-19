@extends('app')
@push('title')
Student List
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
                 <h1 class="mt-5">Student List</h1>
            </div>
        <div class="col-12">

        </div>
             <div class="col-6">
                 <table class="table">
                     <thead>
                     <tr>

                         <th scope="col">Reg No</th>
                         <th scope="col">Full Name</th>
                         <th scope="col">Email</th>
                         <th scope="col">DOB</th>
                         <th scope="col">Phone No</th>
                         <th scope="col">Address</th>
                         <th>Action</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($students as $student)
                         <tr>

                             <td>{{$student->reg_no}}</td>
                             <td>{{$student->name}}</td>
                             <td>{{$student->email}}</td>
                             <th scope="row">{{$student->date_of_birth}}</th>
                             <td>{{$student->phone}}</td>
                             <td>{{$student->address}}</td>
                             <td>
                                 <button class="btn btn-warning btn-sm">Update</button>
                                 <button class="btn btn-danger btn-sm">Delete</button>
                             </td>


                         </tr>
                     @endforeach



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
