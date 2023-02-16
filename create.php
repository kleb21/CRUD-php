<?php

include("conn.php");
$conn = conn();


if(isset($_POST['save'])) {
    $nameHomework= $_POST['name'];
    $description = $_POST['description'];

    $query = "INSERT INTO tasks (name, description) VALUES ('$nameHomework', '$description')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("valio verga");
    }

    $_SESSION['message'] = 'tarea guardada';
    $_SESSION['message_type'] = 'success';

   header("Location: index.php");
}




?>