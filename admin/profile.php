
<?php include "includes/admin_header.php" ?>        

    <div id="wrapper">
        
        <!-- Navigation -->
   
<?php include "includes/admin_navigation.php" ?>        
     

       
<?php 
        
    if(isset($_SESSION['id'])){
        
        $user_id= $_SESSION['id'];
      
        $query= "SELECT * FROM users WHERE user_id = $user_id";
        $select_user_profile_query= mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_user_profile_query)){
            
            $user_password= $row['user_password'];
            $username= $row['username'];
            $user_firstname= $row['user_firstname'];
            $user_lastname= $row['user_lastname'];
            $user_email= $row['user_email'];
            $user_role= $row['user_role'];   
            
            
        }
        
    }      
        
?>   
      
<?php 

if(isset($_POST['update_profile'])){
        
            $user_password= $_POST['user_password'];
            $username= $_POST['username'];
            $user_firstname= $_POST['user_firstname'];
            $user_lastname= $_POST['user_lastname'];
            $user_email= $_POST['user_email'];
            $user_role= $_POST['user_role']; 
            $_SESSION['firstname']= $user_firstname;
            $_SESSION['lastname']= $user_lastname;
//    
//   if(!empty($post_image))
//       move_uploaded_file($post_image_temp, "../images/$post_image");
    
    
        $query= "UPDATE users ";
        $query.= "SET user_password='{$user_password}', ";     
        $query.= "username='{$username}', ";
        $query.= "user_firstname='{$user_firstname}', ";
        $query.= "user_lastname='{$user_lastname}', ";
        $query.= "user_email='{$user_email}', ";
        $query.= "user_role='{$user_role}' ";
        $query.= "WHERE user_id= {$user_id}";
    
    $update_user_query = mysqli_query($connection, $query);
    
    confirm_query($update_user_query);
    header("Location: users.php");
    
}?>    
       
        <div id="page-wrapper">

            <div class="container-fluid">

                
                <!-- Page Heading -->
                
                <div class="row">
                   
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small><?php echo $_SESSION['firstname']; ?></small>
                        </h1>
               
               
<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input value="<?php echo $user_firstname;?>" type="text" name="user_firstname" class="form-control">    
     </div> 

     <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input value="<?php echo $user_lastname;?>" type="text" name="user_lastname" class="form-control">    
     </div>  
     
     <div class="form-group">
        <label for="username">Username</label>
        <input value="<?php echo $username;?>" type="text" name="username" class="form-control">    
     </div> 
    
    <div class="form-group">
        <label for="user_password">Password</label>
        <input value="<?php echo $user_password;?>" type="password" name="user_password" class="form-control">    
     </div> 
   
   
    <div class="form-group">
        <select name="user_role" id="">
            
            <?php 
            
            
            $query= "SELECT user_role FROM users WHERE user_id=$user_id";
            $result= mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($result)){
                $role= $row['user_role'];
                if($role=='subscriber'){
                    echo "<option value='admin'>admin</option>";
                    echo "<option value='subscriber'>subscriber</option>";
                }else{
                    echo "<option value='subscriber'>subscriber</option>";
                    echo "<option value='admin'>admin</option>";
                }
            }
    
            ?>

        </select> 
    </div>

    
     <div class="form-group">
        <label for="user_email">Email</label>
        <input value="<?php echo $user_email;?>" type="email" name="user_email" class="form-control"> 
     </div> 

      
      
      <div class="form-group">
        <input type="submit" name="update_profile" class="btn btn-primary" value="Edit Profile">    
     </div> 

      
</form>               
               
               
       
                    </div>
                </div>
                
                <!-- /.row --> 

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    
    
<?php include "includes/admin_footer.php" ?>