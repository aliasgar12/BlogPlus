
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
                        
                        <div class="col-xs-6">
                           
<!--ADD CATEGORY-->

<?php
    insert_categories();
?>

                            <form action="" method="post">
                                <div class="form-group"> 
                                    <label for="cat-title">Add Category</label>
                                    <input type="text" name="cat-title" class="form-control">
                                </div>  
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
                                </div>
                            </form>
                        
<?php //UPDATE AND INCLUDE

if(isset($_GET['edit'])){
    
    include"/includes/update_categories.php";


}
?>     

                        </div> <!-- Add Category Form-->
                        
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Title</th>
                                    </tr>
                                </thead>
                                <tbody>
    
                                   
<!--SHOW ALL CATEGORY -->

<?php showAllCategories(); ?>
                                  
                                  
                                  
<!-- DELETE CATEGORY -->
<?php deleteCategories(); ?>
                                  
                                   
                                     
                                </tbody>
                            </table>
                        </div>  
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