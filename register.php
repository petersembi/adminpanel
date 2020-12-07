<?php

include('security.php');
include('includes/header.php');
include('includes/navbar1.php');

?>


<div class="modal" tabindex="-1" id="addadminprofile">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" class="text-align-center">Add Admin Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="code.php" method="post">
                <div class="modal-body">
                  <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="username" class="form-control" placeholder="Enter username">
                  </div>

                  <div class="form-group">
                      <label>email</label>
                      <input type="email" name="email" class="form-control check_email" placeholder="Enter username">
                      <small class = "error_mail" style="color: red;"></small>
                    </div>

                  <div class="form-group">
                      <label>password</label>
                      <input type="password" name="password" class="form-control" placeholder="Enter username">
                  </div>
                  <div class="form-group">
                      <label>Confirm password</label>
                      <input type="password" name="cpassword" class="form-control" placeholder="Enter username">
                  </div>
                    <input type="hidden" name="usertype" value="admin">
                </div>
                
                <div class="modal-footer">
                  <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="registerbtn" class="btn btn-primary">Save </button>
                  
                </div>

      </form>
    
    </div>
  </div>
</div>

<div class="container-fluid">

<!-- DataTales Example -->

<div class='card shadow mb-4'>
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile"> 
        Add admin Profile
      </button>


    </h6>

  </div>
  <div class="card-body">


    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
          $connection = mysqli_connect("localhost", "root", "", "adminpanel");
          $query = 'SELECT * FROM register';
          $query_run = mysqli_query($connection,$query);

        ?>
      
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Usertype</th>
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
                <td><?php echo $row['id'];  ?></td>
                <td><?php  echo $row['username'];?></td>
                <td><?php  echo $row['email'];   ?></td>
                <td><?php  echo $row['password'];  ?></td>
                <td><?php  echo $row['usertype'];  ?></td>
                <td>
                  <form action="register_edit.php" method="post">
                  <input type="hidden" name="edit_id" value="<?php echo $row['id'];   ?>">

                    <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
                  </form>
                </td>
                <td>
                <form action="code.php" method="post">
                      <input type="hidden" name="delete_id" value="<?php echo $row['id'];   ?>">    
                  <button type="submit" class="btn btn-danger" name="delete_btn">DELETE</button>
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