
<?php include "includes/admin_header.php" ?>        

    <div id="wrapper">
        
        <!-- Navigation -->
   
<?php include "includes/admin_navigation.php" ?>        
     

        <div id="page-wrapper">

            <div class="container-fluid">

                
                <!-- Page Heading -->
                
                <div class="row">
                   
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
<?php                  
if(isset($_GET['source'])){
    
    $source= $_GET['source'];
        
}
else{
    $source="";
}

switch ($source){
        
    case 'add_user':
        include "includes/add_users.php";
        break;
        
        case'edit_user':
        include "includes/edit_user.php";
        break;
        
    default:
        include "includes/view_all_users.php";
        break;
        
}




?>
                   
<?php 
                        
if(isset($_GET['delete'])){
    
    $delete_user_id=$_GET['delete'];
    
    $query= "DELETE FROM users WHERE user_id={$delete_user_id}";
    $delete_user_query = mysqli_query($connection, $query);
    
    confirm_query($connection);
    header("Location: users.php");
}                        
                                            
 
                        
                        
                        
if(isset($_GET['admin'])){
    
    $change_to_admin_id=$_GET['admin'];
    
    $query= "UPDATE users SET user_role = 'admin' WHERE user_id=$change_to_admin_id";
    $change_admin_query = mysqli_query($connection, $query);
    
    confirm_query($connection);
    header("Location: users.php");
}                        
 
if(isset($_GET['subscriber'])){
    
    $change_to_subscriber_id=$_GET['subscriber'];
    
    $query= "UPDATE users SET user_role = 'subscriber' WHERE user_id=$change_to_subscriber_id";
    $change_subscriber_query = mysqli_query($connection, $query);
    
    confirm_query($connection);
    header("Location: users.php");
}     
                        
                        
                        
                        
                        
                        
?>             
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