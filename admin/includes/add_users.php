<?php 

if(isset($_POST['create_user'])){

            $user_password= $_POST['user_password'];
            $username= $_POST['username'];
            $user_firstname= $_POST['user_firstname'];
            $user_lastname= $_POST['user_lastname'];
            $user_email= $_POST['user_email'];
            $user_role= $_POST['user_role'];
    
//    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    $user_password= password_hash($user_password, PASSWORD_BCRYPT, array('cost'=>10));
    
    $query = "INSERT INTO users(user_password,username,user_firstname,user_lastname,user_email,user_role)";
    
    $query .= "VALUES('{$user_password}','{$username}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_role}') ";
    
    $add_user_query = mysqli_query($connection, $query);

    confirm_query($add_user_query);
    
    echo "User Created:"." : "."<a href='./users.php'>View Users</a>";
    
}



?>
   

<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" name="user_firstname" class="form-control">    
     </div> 

     <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" name="user_lastname" class="form-control">    
     </div>  
     
     <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control">    
     </div> 
    
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" name="user_password" class="form-control">    
     </div> 
   
    <div class="form-group">
        <select name="user_role" id="">
            
            <option value="admin">admin</option>
            <option value="subscriber">subscriber</option>
        </select> 
    </div>

     <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" name="user_email" class="form-control"> 
     </div> 

      
      
      <div class="form-group">
        <input type="submit" name="create_user" class="btn btn-primary" value="Register User">    
     </div> 

      
</form>