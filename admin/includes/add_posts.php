<?php 

if(isset($_POST['create_post'])){

    $post_author= $_POST['post_author'];
    $post_title= $_POST['post_title'];
    $post_category_id= $_POST['post_category'];
    $post_status= $_POST['post_status'];
    $post_image= $_FILES['post_image']['name'];
    $post_image_temp= $_FILES['post_image']['tmp_name'];
    $post_content= $_POST['post_content'];
    $post_tags= $_POST['post_tags'];
    $post_comment_count=0; 
    $post_date= date('d-m-y');
    
    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags, post_comment_count,post_status) ";
    
    $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_comment_count}', '{$post_status}') ";
    
    $add_post_query = mysqli_query($connection, $query);
    

    confirm_query($add_post_query);
    
    $post_id= mysqli_insert_id($connection);
        
    echo "<p class='bg-success'>Post Updated  <a href='../post.php?p_id={$post_id}'>View Post</a> or <a href='posts.php'>View/Edit Other Posts</a></p>";
    
}



?>
   

<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" name="post_title" class="form-control">    
     </div> 

    <div class="form-group">
        <select name="post_category" id="">
            
            <?php

            $query = ("SELECT * FROM categories");
            $select_category = mysqli_query($connection,$query);          

            while($row = mysqli_fetch_assoc($select_category)){

                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];    
                
                echo "<option value='$cat_id'>$cat_title</option>";
            }
            
            ?>
            
            <option value=""></option>
        </select> 
    </div>

     <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" name="post_author" class="form-control">    
     </div>  
     
     <div class="form-group">
        
        <select class="form-control" name="post_status" id="">
            <option value="draft">Post Status</option>
            <option value="draft">Draft</option>
            <option value="published">Published</option>
        </select>

     </div> 

     <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image" class="form-control">    
     </div> 

     <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>  
     </div> 

     <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" name="post_tags" class="form-control">    
     </div>  
      
      <div class="form-group">
        <input type="submit" name="create_post" class="btn btn-primary" value="Publish Post">    
     </div> 

      
</form>