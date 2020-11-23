<?php
session_start();
include ("includes/header.php");

?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
          
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Log In Here!</h1>
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
                  </div>
                  <form class="user" action="code.php" method="POST">
                    <div class="form-group">
                      <input type="email"  name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    
                    <button class="btn btn-primary btn-user btn-block" type="submit" name="login-btn">Login</button>
                    </a>
                    <hr>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


<?php
include ("includes/scripts.php");
?>