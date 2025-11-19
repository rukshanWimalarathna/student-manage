document.getElementById("studentForm").addEventListener("submit", function (event) {
    event.preventDefault();

    let regNo = document.getElementById("regNo").value.trim();
    let age = document.getElementById("age").value.trim();

    // Register Number Validation
    if (regNo === "") {
        Swal.fire({
            icon: 'warning',
            title: 'Please Enter Register Number'

        });
        return;
    }

    // Age Validation
    if (age === "" || age < 18) {
        Swal.fire({
            icon: 'error',
            title: 'Please Enter a Valid Age',
            text: 'Age must be 18 or above.'
        });
        return;
    }

    // Success Message
    Swal.fire({
        icon: 'success',
        title: 'Form Submitted Successfully!'
    }).then(() => {

        // Clear the form after success alert
        document.getElementById("studentForm").reset();
    });
});
