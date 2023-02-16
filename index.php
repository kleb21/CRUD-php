<?php
 include ("conn.php");
$conn = conn();?>

<?php include ("./includes/header.php");?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

        <?php  if(isset($_SESSION['message'])){  ?>
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        
        <?php session_unset();  } ?>
            
        <div class="card card-body">
        <form action="create.php" method="POST">
          <div class="mb-3 ">
            <input type="text" name="name" class="form-control" placeholder="nombre de tarea" autofocus>
          </div>
          <div class="mb-3">
            <textarea name="description" rows="2" class="form-control" placeholder="descripcion de la tarea"></textarea>
          </div>
          <input type="submit" name="save" class="btn btn-success btn-block" value="Guardar Tarea">
        </form>
      </div>
    </div>
   
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Creada</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM tasks";
                    $data =  mysqli_query( $conn, $query);
                    
                    while ($row= mysqli_fetch_array($data)) {  ?>
                    
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td>
                            <a href="./upload.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Editar</a>
                            <a href="./delete.php?id=<?php echo $row['id'] ?>" 
                            class="btn btn-danger">
                             Eliminar</a>

                        </td>
                    </tr>

                    <?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>

<?php include ("./includes/footer.php")?>