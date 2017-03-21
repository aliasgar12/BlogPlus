<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>



<?php

if(isset($_POST['submit'])){
    
$username = $_POST['username'];
$password= $_POST['password'];
$email = $_POST['email'];
    
    
$username = mysqli_real_escape_string($connection, $username);
$password= mysqli_real_escape_string($connection, $password);
$email = mysqli_real_escape_string($connection, $email);
    
$password = password_hash($password, PASSWORD_BCRYPT, array('cost'=>10 ));
    
//$query = "SELECT randSalt FROM users";
//$select_randSalt = mysqli_query($connection,$query);
//    if(!$select_randSalt){
//        die("Query Failed".mysqli_error($connection));
//    }
    
//$row=mysqli_fetch_array($select_randSalt);
//$salt = $row['randSalt'];
    
//$password = crypt($password, $salt);
    
if(empty($username)||empty($password)||empty($email)){
    
//    echo "<script>alert('Fields cannot be blank');</script>";
    $message="Fields cannot be empty.";
    
}else{
    
    $query= "INSERT INTO users(username, user_password, user_email) VALUES('{$username}','{$password}','{$email}')";
    $register_query= mysqli_query($connection, $query);
    if(!$register_query){
        die("Query Failed".mysqli_error($connection));
    }

    $message="Successfully Registered.";
}
    
}else{
    $message="";
}

?>
 
   
   
    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1 >Register</h1>
                   <h6 class="text-center bg-warning"><?php echo $message;?></h6>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
