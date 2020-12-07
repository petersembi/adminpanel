<?php


session_start();

 $connection = mysqli_connect("localhost","root","","adminpanel");


if (isset($_POST['check_submit_btn'])) {
    $email = $_POST['email_id'];
    $email_query = "SELECT * FROM register WHERE email = '$email' ";
    $email_query_run = mysqli_query($connection, $email_query);

    if(mysqli_num_rows( $email_query_run)>0)
    {
        $_SESSION['status']= 'Email Already exists. Please Try Another';
        header('Location: register.php');
    } else {
        echo 'Its available';
    }
}


 if(isset($_POST['registerbtn'])) {
    echo "isset";
    $username = $_POST['username'];
    $email = $_POST['email'];  
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $usertype = $_POST['usertype'];

    $email_query = "SELECT * FROM register WHERE email = '$email' ";
    $email_query_run = mysqli_query($connection, $email_query);

    if(mysqli_num_rows( $email_query_run)>0)
    {
        $_SESSION['status']= 'Email Already taken';
        $_SESSION['status_code']= 'error';
        header('Location: register.php');
    } else {
        if ($password===$cpassword) {
            $query = "INSERT INTO register (username, email, password, usertype) VALUES ('$username', '$email','$password', '$usertype');";
            $query_run = mysqli_query($connection, $query);
        if ($query_run) {
            $_SESSION['status']= "Admin Profile Added";
            $_SESSION['status_code']= 'success';
            header('Location: register.php');
        } else {
            $_SESSION['status']= 'Admin Profile not added';
            $_SESSION['status_code']= 'error';
            header('Location: register.php');
        }
} else {
    $_SESSION['status']= 'Password and Confirm Password Does Not Match';
    $_SESSION['status_code']= 'warning';
            header('Location: register.php');
}
    }

   

    
    
}










if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $usertype = $_POST['usertype_update'];

    $query = "UPDATE register SET  username='$username', email='$email',  password='$password', usertype='$usertype' WHERE id='$id'";
    
    $query_run = mysqli_query($connection,$query);

    if ($query_run) {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: register.php');
    } else 
    {
        $_SESSION['status'] = "Your Data is NOT updated";
        $_SESSION['status_code'] = "warning";
        header('Location: register.php');
    }


}




if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];
    
    $query = "DELETE FROM register WHERE id='$id'";
    $query_run =  mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: register.php');
    } else 
    {
        $_SESSION['status'] = "Your Data is NOT deleted";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');
    }

    
}







if (isset($_POST['login-btn'])) {
   
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM  register WHERE email='$email_login' AND password='$password_login'";
    $query_run = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($query_run);

    if ($row['usertype'] == 'admin' ) {

            
        $_SESSION['username'] = $row['email'];
        header('Location: index.php');
    } else if ($row['usertype']== 'user')
    {
        
        header('Location: user.html');
    } else {
        $_SESSION['status'] = 'Email id / Password is Invalid';
        header('Location: login.php');
    }

} 



if(isset($_POST['aboutsbtn'])) {
    echo "isset";
    $title = $_POST['title'];
    $sub_title = $_POST['sub_title'];  
    $description = $_POST['description'];
    $links = $_POST['links'];
    $query = "INSERT INTO abouts (title, sub_title, description, links) VALUES ('$title', '$sub_title','$description', '$links');";
    $query_run = mysqli_query($connection, $query);
    

    
               
            if ($query_run) {
                $_SESSION['success']= "About us Added";
                header('Location: about us.php');
            } else {
                $_SESSION['status']= 'About us not added';
                header('Location: about us.php');           
    } 

    
    
}






if (isset($_POST['updatebtnAbtUs'])) {
    $id = $_POST['edit_id'];
    $title = $_POST['edit_Title'];
    $subtitle = $_POST['edit_SubTitle'];
    $description = $_POST['edit_description'];
    $links = $_POST['edit_links'];

   
   $query =  "UPDATE abouts SET id='$id',title='$title',sub_title='$subtitle',description='$description',links='$links' WHERE  id='$id'";
    $query_run = mysqli_query($connection,$query);

    if ($query_run) {
        
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: about us.php');
    } else 
    {
        //echo mysqli_error($connection);
        $_SESSION['status'] = "Your Data is NOT updated";
        header('Location: about us.php');
    }


}




if (isset($_POST['aboutus_delete_btn'])) {
    $id = $_POST['delete_id'];
    
    $query = "DELETE FROM abouts WHERE id='$id'";
    $query_run =  mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Your Data is Deleted";
        header('Location: about us.php');
    } else 
    {
        $_SESSION['status'] = "Your Data is NOT deleted";
        header('Location: about us.php');
    }

    
}


if (isset($_POST['save_faculty'])) {
    
                        
    $name = $_POST['faculty_name'];
    $design = $_POST['faculty_designation'];
    $description = $_POST['faculty_description'];
   
    $images = $_FILES["faculty_image"]['name'];

    
    
                    $query = "INSERT INTO faculty (name, design, descrip, images) VALUES ('$name', '$design', '$description', '$images')";
                    $query_run = mysqli_query($connection, $query);

                    if ($query_run) {
                        
                        move_uploaded_file($_FILES["faculty_image"]["tmp_name"], "upload/".$_FILES["faculty_image"]["name"]);
                        $_SESSION['success'] = "Faculty Added";
                        header('Location: faculty.php');
                    } 
                    else {
                        $_SESSION['status'] = "Faculty Not Added";
                        header('Location: faculty.php');
                    }

             }


    // }   
if (isset($_POST['stations_btn'])) {
    $name = $_POST['name'];
    $station = $_POST['station'];
    $query = "INSERT INTO stations (name, station) VALUES ('$name', '$station');";
    $query_run = mysqli_query($connection, $query);

    // INSERT INTO `stations`(`id`, `name`, `station`) VALUES ([value-1],[value-2],[value-3])
} 




if (isset($_POST['updateFaculty'])) {
    $id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $design = $_POST['edit_Design'];
    $description = $_POST['edit_description'];
    

    $images = $_FILES["faculty_image"]['name'];
    
    
   // $images = $_FILES["faculty_image"]['name'];

   
   $query =  "UPDATE faculty SET name='$name', design='$design',descrip='$description', images='$images' WHERE  id='$id'";
    $query_run = mysqli_query($connection,$query);

    if ($query_run) {
        //move_uploaded_file($edit_faculty_image['tmp_name'], "upload/".$edit_faculty_image['name']);
        move_uploaded_file($_FILES["faculty_image"]["tmp_name"], "upload/".$_FILES["faculty_image"]["name"]);

        $_SESSION['success'] = "Your Faculty is Updated";
        header('Location: faculty.php');
    } else 
    {
        //echo mysqli_error($connection);
        $_SESSION['status'] = "Faculty NOT updated";
        header('Location: faculty.php');
    }


}




if (isset($_POST['faculty_delete_btn'])) {
    $id = $_POST['delete_id'];
    
    $query = "DELETE FROM faculty WHERE id='$id'";
    $query_run =  mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Your Data is Deleted";
        header('Location: faculty.php');
    } else 
    {
        $_SESSION['status'] = "Your Data is NOT deleted";
        header('Location: faculty.php');
    }

    
}

if (isset($_POST['search_data']))
{
    $id = $_POST['id'];
    $visible = $_POST['visible'];

    $query = "UPDATE faculty SET visible = '$visible' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
}


if (isset($_POST['departments_save_btn'])) {
    $deptName = $_POST['dept_name'];
    $description = $_POST['dept_description'];
    $deptImg = $_FILES["dept_img"]['name'];
    
    if (file_exists("upload/departments/".$_FILES["dept_img"]['name'])) 
    {
        $_SESSION['status'] = "Image already exists.'$deptImg.'";
        header("Location: departments.php");
    } else {
                $query = "INSERT INTO `departments`( `dept_name`, `descrip`, `image_names`) VALUES ('$deptName','$description','$deptImg')";
            $query_run = mysqli_query($connection, $query);

            if ($query_run) {
                move_uploaded_file($_FILES['dept_img']['tmp_name'], "upload/departments/".$_FILES['dept_img']['name'] );

                $_SESSION['success'] = 'Department Category added successfully';
                header('Location: departments.php');
            } else {
                $_SESSION['status'] = "Image not added";
                header('Location: departments.php');
            }
    }
    

    
}


if (isset($_POST['updateBtnDepts'])) {

    $id = $_POST['edit_id'];
    $edit_dept_name = $_POST['edit_dept_name'];
    $edit_dept_descrip = $_POST['edit_descrip'];
    $edit_dept_img_name = $_FILES['edit_dept_image']['name'];
    $edit_dept_tmpName =$_FILES['edit_dept_image']['tmp_name'];

    $query = "UPDATE `departments` SET `dept_name`='$edit_dept_name',`descrip`='$edit_dept_descrip',`image_names`=' $edit_dept_img_name' WHERE id= '$id' ";
    $query_run = mysqli_query($connection, $query);

  
     
    if($query_run){

        move_uploaded_file($edit_dept_tmpName, "upload/departments/". $edit_dept_img_name);
        $_SESSION['success'] = "Department Category updated successfully!";
        header("Location: departments.php");

    }
    else 
    {
        $_SESSION['status'] = "Department Category Not Updated!";
            header("Location: departments.php");
    }

    }

    
    if (isset($_POST['dept_delete_btn'])) {
        $id = $_POST['delete_id'];
        
        $query = "DELETE FROM departments WHERE id='$id'";
        $query_run =  mysqli_query($connection, $query);
    
        if ($query_run) {
            $_SESSION['success'] = "Your Data is Deleted";
            header('Location: departments.php');
        } else 
        {
            $_SESSION['status'] = "Your Data is NOT deleted";
            header('Location: departments.php');
        }
    
        
    }
?>