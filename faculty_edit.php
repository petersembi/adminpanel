<?php
session_start();
  
include('includes/header.php');
include('includes/navbar1.php');

?>


<div class="container-fluid">

<!-- DataTales Example -->

<div class='card shadow mb-4'>
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">EDIT About Us page
      


    </h6>

  </div>
  <div class="card-body">
      <?php 
      $connection = mysqli_connect("localhost", "root", "", "adminpanel");
        if (isset($_POST['edit_btn'])) {
            $id = $_POST['edit_id'];
            $query = "SELECT * FROM faculty WHERE id='$id' ";
            $query_run = mysqli_query($connection, $query);
        }
      
        foreach($query_run as $row)                                  
        {
            ?>

      <form action="code.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id'] ; ?>" >
                  <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="edit_name" value="<?php echo $row['name'] ; ?>" class="form-control" placeholder="Enter username">
                  </div>

                  <div class="form-group">
                      <label>Designation</label>
                      <input type="text" name="edit_Design" value="<?php echo $row['design'] ; ?>" class="form-control" placeholder="Enter username">
                  </div>

                  <div class="form-group">
                      <label>Description</label>
                      <input type="text" name="edit_description"   value="<?php echo $row['descrip'] ; ?>" class="form-control" placeholder="Enter username">
                  </div>
                  <div class="form-group">
                      <label>Images</label>
                      <input type="file" name="faculty_image" class="form-control" placeholder="Enter username">
                  </div>
                    <a href="faculty.php" name="" class="btn btn-danger" > CANCEL </a>
                    <button class="btn btn-primary" name="updateFaculty" type="submit"> UPDATE</button>

      </form>
       <?php
        }
      ?>
  </div>

</div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');

?> 