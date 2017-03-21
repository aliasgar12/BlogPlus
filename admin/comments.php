
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
        include "includes/view_all_comments.php";
        break;
        
}




?>
      
          
<?php 
                        
if(isset($_GET['delete_comment'])){
    
    $delete_comment_id=$_GET['delete_comment'];
    
    $query= "DELETE FROM comments WHERE comment_id={$delete_comment_id}";
    $delete_comment_query = mysqli_query($connection, $query);
    
    confirm_query($connection);
    header("Location: comments.php");
}  
                        

if(isset($_GET['approve'])){
    
    $approve_comment_id=$_GET['approve'];
    
    $query= "UPDATE comments SET comment_status = 'approved' WHERE comment_id=$approve_comment_id";
    $approve_comment = mysqli_query($connection, $query);
    
    confirm_query($connection);
    header("Location: comments.php");
}                        
 
                        
if(isset($_GET['unapprove'])){
    
    $unapprove_comment_id=$_GET['unapprove'];
    
    $query= "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id=$unapprove_comment_id";
    $unapprove_comment = mysqli_query($connection, $query);
    
    confirm_query($connection);
    header("Location: comments.php");
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