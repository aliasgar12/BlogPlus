<?php 

if(isset($_POST['checkBoxArray'])){
    
    foreach($_POST['checkBoxArray'] as $checkBoxIdValue){
        
        $bulk_Options = $_POST['bulkOptions'];
        
        switch($bulk_Options){
            case 'published':
                
                $query = "UPDATE posts SET post_status = '{$bulk_Options}' WHERE post_id={$checkBoxIdValue}";
                $update_bulk_publish = mysqli_query($connection, $query);
                confirm_Query($update_bulk_publish);
                
                break;
                
            case 'draft':
                
                $query = "UPDATE posts SET post_status = '{$bulk_Options}' WHERE post_id={$checkBoxIdValue}";
                $update_bulk_draft = mysqli_query($connection, $query);
                confirm_Query($update_bulk_draft);
                
                break;
                
            case 'delete':
                
                $query = "DELETE FROM posts WHERE post_id={$checkBoxIdValue}";
                $update_bulk_delete = mysqli_query($connection, $query);
                confirm_Query($update_bulk_delete);
                
                break;
                
            case 'clone':
                
                $query = "SELECT * FROM posts WHERE post_id={$checkBoxIdValue}";
                $bulk_clone = mysqli_query($connection, $query);
                confirm_Query($bulk_clone);             
                $row = mysqli_fetch_array($bulk_clone);
                              
                //fetching values from database.
                $post_author= $row['post_author'];
                $post_title= $row['post_title'];
                $post_category_id= $row['post_category_id'];
                $post_status= $row['post_status'];
                $post_image= $row['post_image'];
                $post_content= $row['post_content'];
                $post_tags= $row['post_tags'];
                $post_comment_count=0; 
                
                $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags, post_comment_count,post_status) ";

                $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_comment_count}', '{$post_status}') ";
                
                $clone_query= mysqli_query($connection, $query);
                confirm_query($clone_query);
                
                break;
        }
    }
    
    
    
}

?>
                      

<form action="" method="post">     
                       
                       
                       
                        <table class="table table-hover table-bordered">
                           
                           <div id="bulkIdContainer" class="col-xs-4">
                               
                               
                               <select name="bulkOptions" id="" class="form-control">
                                   
                                   <option value="">Select Options</option>
                                   <option value="published">Publish</option>
                                   <option value="draft">Draft</option>
                                   <option value="delete">Delete</option> 
                                   <option value="clone">Clone</option>    
                                   
                               </select>
                               
                            </div>
                               
                            <div class="col-xs-4">
                            
                             <input type="submit" name="submit" class="btn btn-success" value="Apply">
                              <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a> 
                               
                               
                           </div>
                           
                            <thead>
                                <tr>
                                    <th><input id="selectAllBoxes" type="checkbox"></th>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>


        <?php

        $query = "SELECT * from posts ORDER BY post_id DESC";
        $select_posts = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_posts)){

            $post_id= $row['post_id'];
            $post_author= $row['post_author'];
            $post_title= $row['post_title'];
            $post_category_id= $row['post_category_id'];
            $post_status= $row['post_status'];
            $post_image= $row['post_image'];
            $post_tags= $row['post_tags'];
            $post_comment_count= $row['post_comment_count'];
            $post_date= $row['post_date'];
            $post_views= $row['post_views_count'];
            
            $query = "SELECT cat_title FROM categories where cat_id= $post_category_id";
            $result= mysqli_query($connection,$query);
            confirm_query($connection);
            while($row_inside = mysqli_fetch_assoc($result)){
                $cat_title= $row_inside['cat_title'];
                
            }

            

            echo "<tr>";
            ?>
            
            <td><input class='checkBoxes' type='checkbox' name="checkBoxArray[]" value="<?php echo $post_id?>"></td>
           
           <?php
            echo "<td>$post_id</td>";
            echo "<td>$post_author</td>";
            echo "<td>$post_title</td>";
            echo "<td>$cat_title</td>";
            echo "<td>$post_status</td>";
            echo "<td><img width='100' src='../images/$post_image'></td>";
            echo "<td>$post_tags</td>";
            
            $query= "SELECT * FROM comments WHERE comment_post_id = {$post_id}";
            $count_comment_query = mysqli_query($connection, $query);
            $count_comment= mysqli_num_rows($count_comment_query);
            
            echo "<td>$count_comment</td>";
            echo "<td>$post_date</td>";
            echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
            echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
            echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
            echo "<td><a href=''>$post_views</a></td>";
            echo "</tr>";
        }
        ?>
                              
                            </tbody>
                        </table>
                        
</form>                
                   