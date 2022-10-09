<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "codimaths";

$conn = mysqli_connect($server, $username, $password, $db);

if ($conn === false) {
    echo
    '
            <h1>Cannot connect to the server</h1>
        ';
    die("Could not connect ." . mysqli_connect_error());
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
$name = test_input($_POST['name']);
$email = test_input($_POST['email']);
$phone = test_input($_POST['phone']);
$age = test_input($_POST['age']);
if (isset($_POST['submit-button'])) {
    if($name === NULL){
        echo
        '
            <script>
                alert("Please enter name");
            </script>
        ';
    }
    $query = "INSERT INTO student_data(Name , Email , Phone, Age) VALUES ('$name' , '$email' , '$phone' , '$age' )";


    if (mysqli_query($conn, $query)) {
        echo
        '
            <script>
                window.location.href = "http://www.codimaths.com/";
            </script>
        ';
    } else {
        echo
        '
            <h1>Error in progressing data</h1>
        ';
    }
}
}
mysqli_close($conn);
?>