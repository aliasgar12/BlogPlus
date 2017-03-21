
<?php 

if(isset($_GET['p_id'])){
    
    $post_id= $_GET['p_id'];

    
     $query = "SELECT * from posts WHERE post_id= $post_id";
     $edit_post_query = mysqli_query($connection, $query);
    
    confirm_query($edit_post_query);

    while($row = mysqli_fetch_assoc($edit_post_query)){

//        $post_id= $row['post_id'];
        $post_author= $row['post_author'];
        $post_title= $row['post_title'];
        $post_category_id= $row['post_category_id'];
        $post_status= $row['post_status'];
        $post_image= $row['post_image'];
        $post_content=$row['post_content'];
        $post_tags= $row['post_tags'];   
}}
?>   

<?php 

if(isset($_POST['update_post'])){
        
        $post_author= $_POST['post_author'];
        $post_title= $_POST['post_title'];
        $post_category_id= $_POST['post_category'];
        $post_status= $_POST['post_status'];
        $post_image= $_FILES['post_image']['name'];
        $post_image_temp= $_FILES['post_image']['tmp_name'];
        $post_content= $_POST['post_content'];
        $post_tags= $_POST['post_tags'];
        $post_date= date('d-m-y');
    
   if(!empty($post_image))
       move_uploaded_file($post_image_temp, "../images/$post_image");
    
    
        $query= "UPDATE posts ";
        $query.= "SET post_author='{$post_author}', ";     
        $query.= "post_title='{$post_title}', ";
        $query.= "post_category_id={$post_category_id}, ";
        $query.= "post_status='{$post_status}', ";
        $query.= "post_content='{$post_content}', ";
        if(!empty($post_image))
            $query.= "post_image='{$post_image}', ";
        $query.= "post_tags='{$post_tags}', ";
        $query.= "post_date= now() ";
        
        $query.= "WHERE post_id= {$post_id}";
    
    $update_query = mysqli_query($connection, $query);
    
    confirm_query($update_query);
    
    echo "<p class='bg-success'>Post Updated  <a href='../post.php?p_id={$post_id}'>View Post</a> or <a href='posts.php'>View/Edit Other Posts</a></p>";
    
}




?>
   
   
   
   
   
   
   
<form action="" method="post" enctype="multipart/form-data">
    
    
     <div class="form-group">
        <label for="post_title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" name="post_title" class="form-control">    
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
        <input value="<?php echo $post_author; ?>" type="text" name="post_author" class="form-control">    
     </div>  
     
     <div class="form-group">
         <select name="post_status" id="">
             
             <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
             
             <?php
             
             if($post_status == 'draft'){
                 
                 echo "<option value='published'>Publish</option>";   
                 
             }else{
                echo "<option value='draft'>Draft</option>";
             }
             
             
             
             
             ?>
             
             
         </select>
     </div>
     
<!--
     <div class="form-group">
        <label for="post_status">Post Status</label>
        <input value="<?php echo $post_status; ?>" type="text" name="post_status" class="form-control">    
     </div> 
-->

     <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image" class="form-control">    
     </div> 

     <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?></textarea>  
     </div> 

     <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" name="post_tags" class="form-control">    
     </div>  
      
      <div class="form-group">
        <input type="submit" name="update_post" class="btn btn-primary" value="Update Post">    
     </div> 

      
</form>