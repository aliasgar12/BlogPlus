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
                if(isset($_GET['page'])){
                    
                    $page_num= $_GET['page'];
                    $post_num = ($page_num-1)*5;
                    
                }else{
                    $page_num=1;
                    $post_num = 0;
                }
                
                
                $query= "SELECT * from posts WHERE post_status= 'published'";
                $count_post = mysqli_query($connection, $query);
                $count = mysqli_num_rows($count_post);
                
                $count = ceil($count/5);
                
                
                
                $query = "SELECT * from posts WHERE post_status= 'published' LIMIT $post_num,5";
                $select_all_post = mysqli_query($connection, $query);
                if(!mysqli_num_rows($select_all_post)){
                    echo "<h1 class='text-center'>SORRY NO POST PUBLISHED</h1>";
                }else{
                while($row = mysqli_fetch_assoc($select_all_post)){
                    
                    $post_id= $row['post_id'];
                    $post_title= $row['post_title'];
                    $post_author= $row['post_author'];
                    $post_date= $row['post_date'];
                    $post_image= $row['post_image'];
                    $post_content= substr($row['post_content'],0,250);
                    

                    ?>
                    
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title?></a>
                </h2>
                <p class="lead">
                    by <a href="author_post.php?post_author=<?php echo $post_author ?>&p_id=<?php echo $post_id ?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>"><img class="img-responsive" src="images/<?php echo $post_image?>" alt=""></a>
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                
            <?php 
                } } 
                ?>
                
            </div>


          <?php include "includes/sidebar.php";?>      

        </div>
        <!-- /.row -->

        <hr>
        
        <div class="pager">
            
            <ul>
               
               <?php 
                
                for($i=1 ; $i<=$count; $i++){
                    if($i==$page_num)
                        echo "<li ><a class='active_link'  href='index.php?page={$i}'>{$i}</a></li>";
                    else
                        echo "<li ><a href='index.php?page={$i}'>{$i}</a></li>";
                }
                
                ?>
                

                
            </ul>
        </div>
        
        <!-- Footer -->
        
        <?php include "includes/footer.php";?>
        