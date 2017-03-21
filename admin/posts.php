
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
        
    case 'add_post':
        include "includes/add_posts.php";
        break;
        
        case'edit_post':
        include "includes/edit_post.php";
        break;
        
    default:
        include "includes/view_all_posts.php";
        break;
        
}




?>
                   
<?php 
                        
if(isset($_GET['delete'])){
    
    $delete_post_id=$_GET['delete'];
    
    $query= "DELETE FROM posts WHERE post_id={$delete_post_id}";
    $delete_post_query = mysqli_query($connection, $query);
    
    confirm_query($connection);
    header("Location: posts.php");
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