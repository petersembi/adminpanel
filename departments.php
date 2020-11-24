<?php

include('security.php');
include('includes/header.php');
include('includes/navbar1.php');

?>


<div class="modal" tabindex="-1" id="deptmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" class="text-align-center">Add Department </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="code.php" method="post">
                <div class="modal-body">
                  <div class="form-group">
                      <label>Dept Name</label>
                      <input type="text" name="dept_name" class="form-control" placeholder="Enter Department Name">
                  </div>

                  <div class="form-group">
                      <label>Description</label>
                      <input type="email" name="dept_description" class="form-control" placeholder="Enter Description">
                  </div>

                  <div class="form-group">
                      <label>Dept Image</label>
                      <input type="file" name="dept_img" class="form-control" placeholder="upload department image">
                  </div>
                
                    <input type="hidden" name="usertype" value="admin">
                </div>
                
                <div class="modal-footer">
                  <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="aboutsbtn" class="btn btn-primary">Save </button>
                  
                </div>

      </form>
    
    </div>
  </div>
</div>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Departments
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deptmodal"> 
        Add Department
      </button>


    </h6>

  </div>
<div class='card shadow mb-4'>
 
  <div class="card-body">
    <?php
      if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
        echo '<h2 class="bg-primary text-white">'.$_SESSION['success'].'</h2>';
        unset($_SESSION['success']);
      }
      if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
        echo '<h2 class="bg-info text-white">'.$_SESSION['status'].'</h2>';
        unset($_SESSION['status']);
      }
    ?>

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
          $connection = mysqli_connect("localhost", "root", "", "adminpanel");
          $query = 'SELECT * FROM abouts';
          $query_run = mysqli_query($connection,$query);

        ?>
      
        <thead>
          <tr>
            <th>ID</th>
            <th>Dept Name</th>
            <th>Description</th>
            <th>Image </th>
            <th>EDIT</th>
            <th>DELETE</th>
            
          </tr>
        </thead> 
        <tbody>
          <?php
            if (mysqli_num_rows($query_run) > 0) {
              while($row=mysqli_fetch_assoc($query_run))
              {
                 ?>
                <tr>
                <td><?php  echo $row['id'];  ?></td>
                <td><?php  echo $row['title'];?></td>
                <td><?php  echo $row['sub_title'];   ?></td>
                <td><?php  echo $row['description'];  ?></td>
                <td><?php  echo $row['links'];  ?></td>
                <td>
                  <form action="aboutUsEdit.php" method="post">
                  <input type="hidden" name="edit_id" value="<?php echo $row['id'];   ?>">

                    <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
                  </form>
                </td>
                <td>
                <form action="code.php" method="post">
                      <input type="hidden" name="delete_id" value="<?php echo $row['id'];   ?>">    
                  <button type="submit" class="btn btn-danger" name="aboutus_delete_btn">DELETE</button>
                </form>
                </td>
              </tr>
                <?php    
                 
              }
            }
            else {
              echo "No record found";
            }

          ?>
         
        </tbody>

      </table>
    </div>


  </div>

</div>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');

?> 