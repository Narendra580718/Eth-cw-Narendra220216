<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "narendra_cw";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $ord = $_POST['ord'];

    $sql = "INSERT INTO ord (name, email, ord) VALUES (?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $sql);
    
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $ord);

    if (mysqli_stmt_execute($stmt)) {
        echo "Data inserted successfully.";
        header("Location: index.html");
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);

    mysqli_close($conn);
}
?>
