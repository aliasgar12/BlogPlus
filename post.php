<?php include "includes/db.php";?>
<?php include "includes/header.php";?>
   
    

    <!-- Navigation -->
    
    <?php include "includes/navigation.php";?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php
                
                
                if(isset($_GET['p_id'])){
                    
                    $the_post_id= $_GET['p_id'];
                
                $query= "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id={$the_post_id}";
                $update_post_view_query= mysqli_query($connection, $query);
                    
                $query = "SELECT * from posts WHERE post_id= $the_post_id";
                $post_selected = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($post_selected)){
                    
                    $post_id= $row['post_id'];
                    $post_title= $row['post_title'];
                    $post_author= $row['post_author'];
                    $post_date= $row['post_date'];
                    $post_image= $row['post_image'];
                    $post_content= $row['post_content'];
                    
                    
                    ?>
                    
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title?></a>
                </h2>
                <p class="lead">
                    by <a href="author_post.php?post_author=<?php echo $post_author ?>&p_id=<?php echo $post_id ?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>

                <hr>
                
            <?php 
                }
                }
                ?>
                
                
                <!-- Blog Comments -->
                
                
                
                
                
                
                <?php if(isset($_POST['create_comment'])){
    
                $comment_post_id = $_GET['p_id'];

                $comment_email= $_POST['comment_email'];
                $comment_author= $_POST['comment_author'];
                $comment_content= $_POST['comment_content'];
                
                if(empty($comment_email) || empty($comment_author) || empty($comment_content)) {
                    
                    echo "<script>alert('Fields cannot be empty.');</script>";
                       
                }else{
    
                    $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status , comment_date)";   
                    $query.= "VALUES($comment_post_id , '{$commment_author}', '{$comment_email}', '{$comment_content}', 'Unapproved', now())";

                    $comment_query = mysqli_query($connection, $query);

                    if(!$comment_query){
                        die("Query Failed! ". mysqli_error($connection));
                    }
                }   
    }
                
                ?>
                
                
                
                

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                       <div class="form-group">
                           <label for="comment_author">Author</label>
                            <input type="text" name="comment_author" class="form-control">
                        </div>
                        <div class="form-group">
                           <label for="comment_email">Email</label>
                            <input type="email" name="comment_email" class="form-control" >
                        </div>
                        <div class="form-group">
                           <label for="comment_content"></label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
            
               
                <?php 
                
                $query= "SELECT * FROM comments WHERE comment_post_id=$the_post_id ";
                $query.= "AND comment_status='approved' ";
                $query.= "ORDER BY comment_id DESC";

                $comment_approved = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($comment_approved)){
                    
                    $comment_date= $row['comment_date'];
                    $comment_author= $row['comment_author'];
                    $comment_content= $row['comment_content'];
                    
               
                ?>
                
                
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                       <?php echo $comment_content; ?>
                    </div>
                </div>
                
            <?php     } ?>
                

      </div>
            
            
    

          <?php include "includes/sidebar.php";?>      

        </div>
        <!-- /.row -->
        

        <hr>

        <!-- Footer -->
        
        <?php include "includes/footer.php";?>
        