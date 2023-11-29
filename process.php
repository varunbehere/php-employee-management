<?php
include('dbconnections.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $operation = $_POST["operation"];

    switch ($operation) {
        case 'insert':
            insertEmployee();
            break;

        case 'delete':
            deleteEmployee();
            break;

        case 'update':
            updateEmployee();
            break;

        case 'display':
            displayEmployees();
            break;

        default:
            echo "Invalid operation";
    }
}

function insertEmployee() {
    global $con;

    $employeeName = $_POST["employeeName"];
    $employeeID = $_POST["employeeID"];
    $departmentName = $_POST["departmentName"];
    $phoneNumber = $_POST["phoneNumber"];
    $joiningDate = $_POST["joiningDate"];

    $query = "INSERT INTO employees (employeeName, employeeID, departmentName, phoneNumber, joiningDate) VALUES ('$employeeName', '$employeeID', '$departmentName', '$phoneNumber', '$joiningDate')";

    if (mysqli_query($con, $query)) {
        echo "Employee details inserted successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

function deleteEmployee() {
    global $con;

    $employeeID = $_POST["employeeID"];

    $query = "DELETE FROM employees WHERE employeeID = '$employeeID'";

    if (mysqli_query($con, $query)) {
        echo "Employee record deleted successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

function updateEmployee() {
    global $con;

    $employeeID = $_POST["employeeID"];
    $newPhoneNumber = $_POST["newPhoneNumber"];

    $query = "UPDATE employees SET phoneNumber = '$newPhoneNumber' WHERE employeeID = '$employeeID'";

    if (mysqli_query($con, $query)) {
        echo "Employee details updated successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

function displayEmployees() {
    global $con;

    $query = "SELECT * FROM employees";
    $result = mysqli_query($con, $query);

    echo "<table border='1'>
            <tr>
                <th>Employee Name</th>
                <th>Employee ID</th>
                <th>Department Name</th>
                <th>Phone Number</th>
                <th>Joining Date</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['employeeName']}</td>
                <td>{$row['employeeID']}</td>
                <td>{$row['departmentName']}</td>
                <td>{$row['phoneNumber']}</td>
                <td>{$row['joiningDate']}</td>
            </tr>";
    }

    echo "</table>";

    mysqli_free_result($result);
}

mysqli_close($con);
?>
