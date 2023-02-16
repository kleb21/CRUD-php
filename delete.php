<?php
include ('conn.php');
$cnx = conn();


if (isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM tasks WHERE id = $id";
    $data = mysqli_query($cnx, $query);

    if(!$data) {
        die("mamaste");
    }

    $_SESSION['message'] = 'tarea borrada';
    $_SESSION['message_type'] = 'danger';

    header("Location: index.php");
}


?>