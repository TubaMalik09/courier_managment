<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once("navbar.php")
    ?>
<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-header">
            About us
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $run = mysqli_query($conn, "SELECT * FROM about");
                    if ($run && mysqli_num_rows($run) > 0) {
                        while ($row = mysqli_fetch_array($run)) {
                            ?>
                            <tr>
                                <td><?php echo $row[1]; ?></td>
                                <td><?php echo $row[2]; ?></td> 
                                <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button></td>
                            </tr>

                            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit About us </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="UpdateAbout.php" method="POST">
            <input type="hidden" name="id" id="" value="<?php echo $row[0] ?>">
            <label for="name">Name</label>
            <input type="text" placeholder="name" class="form-control" value="<?php echo $row[1] ?>" name="a">
            <label for="desc">Description</label>
            <input type="text" placeholder="description" class="form-control" value="<?php echo $row[2] ?>" name="b">
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="btn" >Save changes</button>
      </div>




        </form>
      </div>
   
    </div>
  </div>
                            <?php
                        }
                    } else {
                        echo '<tr><td colspan="6" class="no-data">No data found</td></tr>';
                    }

                    
                    ?>
                    <!-- Button trigger modal -->


</div>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
    include_once("footer.php")
    ?>
</body>
</html>