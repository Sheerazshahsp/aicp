<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $fullname = mysqli_real_escape_string($conn, $_POST["name"]);
    $mobileNumber = mysqli_real_escape_string($conn, $_POST["mobile"]);
    $dateOfBirth = mysqli_real_escape_string($conn, $_POST["birth"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $occupation = mysqli_real_escape_string($conn, $_POST["occupation"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $idnum = mysqli_real_escape_string($conn, $_POST["idnu"]);
    $issueDate = mysqli_real_escape_string($conn, $_POST["issue"]);
    $issueState = mysqli_real_escape_string($conn, $_POST["issuestate"]);
    $issueAuthority = mysqli_real_escape_string($conn, $_POST["issueauthority"]);
    $expiryDate = mysqli_real_escape_string($conn, $_POST["expiry"]);

    // Attempt insert query execution
    $sql = "INSERT INTO users (full_name, date_of_birth, email, mobile_number, gender, occupation, id_type, id_number, issue_authority, issue_date, issue_state, expiry_date)
    VALUES ('$fullname', '$dateOfBirth', '$email', '$mobileNumber', '$gender', '$occupation', '$id', '$idnum', '$issueAuthority', '$issueDate', '$issueState', '$expiryDate')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>
