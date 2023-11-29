// validate_employee_form.js
function validateEmployeeForm() {
    var employeeName = document.getElementById("employeeName").value;
    var employeeID = document.getElementById("employeeID").value;
    var departmentName = document.getElementById("departmentName").value;
    var phoneNumber = document.getElementById("phoneNumber").value;
    var joiningDate = document.getElementById("joiningDate").value;

    // Check if fields are empty
    if (employeeName === "" || employeeID === "" || departmentName === "" || phoneNumber === "" || joiningDate === "") {
        alert("All fields must be filled out");
        return false;
    }

    // Validate phone number format
    var phoneRegex = /^\d{10}$/;
    if (!phoneRegex.test(phoneNumber)) {
        alert("Invalid phone number. Please enter a 10-digit number.");
        return false;
    }

    // Additional validation can be added as needed

    // If all validations pass, return true to submit the form
    return true;
}
