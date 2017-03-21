<!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

   
               
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" name="submit" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form> <!-- //form-->
                    <!-- /.input-group -->
                </div>
                
                <?php if(!isset($_SESSION['username'])){
    
                ?>
                <!-- Login -->
                <div class="well">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Enter Username">   
                    </div>
                    <div class="input-group">
                        <input type="password" name="user_password" class="form-control" placeholder="Enter Password">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" name="login" type="submit">Submit
                        </button>
                        </span>
                    </div>
                    <br>
                    <div class="input-group">
                        <h4 class="text-center">New to Blog Plus?</h4>
                        <a href="registration.php" class="btn btn-primary">Create an Account</a>
                        
                    </div>
                    </form> <!-- //form-->
                    <!-- /.input-group -->
                </div>

                <?php }?>
                
                 
         <?php
                
                
                    $query = ("SELECT * FROM categories");
                    $select_category_title = mysqli_query($connection,$query);          
                   
                ?> 
               
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                               
                               <?php
                                
                                while($row = mysqli_fetch_assoc($select_category_title)){
                                    
                                    $cat_id= $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    echo "<li><a href='category.php?cat_id=$cat_id'>{$cat_title}</a>
                                    </li>";

                                }
                                
                                ?>
    
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>

               
    <?php include "widget.php"?>