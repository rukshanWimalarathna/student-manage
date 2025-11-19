<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration Form</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Background Color -->
    <style>
        html, body {
            height: 100% !important;
            background-color: #eaf4ff !important; /* Light blue */
            background-size: cover !important;
        }
    </style>



</head>

<body class="bg-light">


<div class="container mt-5">
    <div class="card shadow p-4 bg-secondary-subtle">

a
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
<script src="/js/validation.js"></script>
