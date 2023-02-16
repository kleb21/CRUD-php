<?php
include ('conn.php');
$conn = conn();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tasks WHERE id = $id";
    $data = mysqli_query($conn, $query);
    if(mysqli_num_rows($data) == 1 ){
        $row = mysqli_fetch_array($data);
        $name = $row['name'];
        $description = $row['description'];
    }
}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $query = "UPDATE tasks set name= '$name', description = '$description' WHERE id = $id";

    $_SESSION['message'] ="datos actualizados";
    $_SESSION['message_type'] = 'secondary';
    mysqli_query($conn, $query);

    header("Location: index.php");
}

?>

<?php include("./includes/header.php")  ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="upload.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="mb-3">
                        <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" placeholder="nombre">
                    </div>
                    <div class="mb-3">
                        <textarea name="description" rows="2" class="form-control" placeholder="description"><?php echo $description?></textarea>
                    </div>

                    <button class="btn btn-success" name="update">actualizar</button>
                </form>

            </div>
        </div>
    </div>
</div>

<?php include("./includes/footer.php")  ?>