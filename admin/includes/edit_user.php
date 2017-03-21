
<?php 

if(isset($_GET['p_id'])){
    
    $user_id= $_GET['p_id'];

    
     $query = "SELECT * from users WHERE user_id= $user_id";
     $edit_user_query = mysqli_query($connection, $query);
    
    confirm_query($edit_user_query);

    while($row = mysqli_fetch_assoc($edit_user_query)){

            $user_password= $row['user_password'];
            $username= $row['username'];
            $user_firstname= $row['user_firstname'];
            $user_lastname= $row['user_lastname'];
            $user_email= $row['user_email'];
            $user_role= $row['user_role'];     
}}
?>   

<?php 

if(isset($_POST['update_user'])){
        
            $user_password= $_POST['user_password'];
            $username= $_POST['username'];
            $user_firstname= $_POST['user_firstname'];
            $user_lastname= $_POST['user_lastname'];
            $user_email= $_POST['user_email'];
            $user_role= $_POST['user_role']; 
//    
//   if(!empty($post_image))
//       move_uploaded_file($post_image_temp, "../images/$post_image");
    
    
    $crypted_password = password_hash($user_password, PASSWORD_BCRYPT , array('cost'=>10));
        
        $query= "UPDATE users ";
        $query.= "SET user_password='{$crypted_password}', ";     
        $query.= "username='{$username}', ";
        $query.= "user_firstname='{$user_firstname}', ";
        $query.= "user_lastname='{$user_lastname}', ";
        $query.= "user_email='{$user_email}', ";
        $query.= "user_role='{$user_role}' ";
        $query.= "WHERE user_id= {$user_id}";
    
    $update_user_query = mysqli_query($connection, $query);
    
    confirm_query($update_user_query);
//    header("Location: users.php");
    
}?>
   
       
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
                    echo "<option value='subscriber'>subscriber</option>";
                    echo "<option value='admin'>admin</option>";
                    
                }else{
                    echo "<option value='admin'>admin</option>";
                    echo "<option value='subscriber'>subscriber</option>";
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
        <input type="submit" name="update_user" class="btn btn-primary" value="Edit User">    
     </div> 

      
</form>