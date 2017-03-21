     
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Response To</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

        <?php

        $query = "SELECT * FROM comments";
        $select_comments = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_comments)){

            $comment_id= $row['comment_id'];
            $comment_post_id= $row['comment_post_id'];
            $comment_email= $row['comment_email'];
            $commment_author= $row['comment_author'];
            $comment_email= $row['comment_email'];
            $comment_status= $row['comment_status'];
            $comment_content= $row['comment_content'];
            $comment_date= $row['comment_date'];
            
            
//            $query = "SELECT cat_title FROM categories where cat_id= $post_category_id";
//            $result= mysqli_query($connection,$query);
//            confirm_query($connection);
//            while($row_inside = mysqli_fetch_assoc($result)){
//                $cat_title= $row_inside['cat_title'];
//                
//            }

            

            echo "<tr>";
            echo "<td>$comment_id</td>";
            echo "<td>$commment_author</td>";
            echo "<td>$comment_content</td>";
            echo "<td>$comment_email</td>";
            echo "<td>$comment_status</td>";
            
            
            $query = "SELECT * FROM posts WHERE post_id= $comment_post_id ";
            $select_post_to_comment = mysqli_query($connection, $query);
            if(!$select_post_to_comment){
                    die("Query Failed! ". mysqli_error($connection));
                }
            
            while($row = mysqli_fetch_assoc($select_post_to_comment)){
                
                $post_name= $row['post_title'];
                
                echo "<td><a href='../post.php?p_id=$comment_post_id'>$post_name</a></td>";
            }
            
            
        
            echo "<td>$comment_date</td>";
            echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
            echo "<td><a href='comments.php?unapprove=$comment_id'>UnApprove</a></td>";
            echo "<td><a href='comments.php?delete_comment=$comment_id'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
                              
                            </tbody>
                        </table>
                        
                   