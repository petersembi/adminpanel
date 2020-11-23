<?php
session_start();
  

 
      $connection = mysqli_connect("localhost", "root", "", "adminpanel");
        if (isset($_POST['delete_btn'])) {
            $id = $_POST['edit_id'];
            $query = "SELECT * FROM register WHERE id='$id' ";
            $query_run = mysqli_query($connection, $query);


            $row = mysqli_fetch_assoc($query_run);
            

        }
      
        foreach($query_run as $row)
        {
            ?>

      <form action="code.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id'] ; ?>" >
                  <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="edit_username" value="<?php echo $row['username'] ; ?>" class="form-control" placeholder="Enter username">
                  </div>

                  <div class="form-group">
                      <label>email</label>
                      <input type="email" name="edit_email" value="<?php echo $row['email'] ; ?>" class="form-control" placeholder="Enter username">
                  </div>

                  <div class="form-group">
                      <label>password</label>
                      <input type="password" name="edit_password"   value="<?php echo $row['password'] ; ?>" class="form-control" placeholder="Enter username">
                  </div>
                    <a href="register.php" name="" class="btn btn-danger" > CANCEL </a>
                    <button class="btn btn-primary" name="updatebtn"> Update</button>

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