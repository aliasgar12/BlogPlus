     
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>

        <?php

        $query = "SELECT * from users";
        $select_users = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_users)){
            
            $user_id= $row['user_id'];
            $username= $row['username'];
            $user_firstname= $row['user_firstname'];
            $user_lastname= $row['user_lastname'];
            $user_email= $row['user_email'];
            $user_role= $row['user_role'];
//            
//            $query = "SELECT cat_title FROM categories where cat_id= $post_category_id";
//            $result= mysqli_query($connection,$query);
//            confirm_query($connection);
//            while($row_inside = mysqli_fetch_assoc($result)){
//                $cat_title= $row_inside['cat_title'];
//                
//            }

            

            echo "<tr>";
            echo "<td>$user_id</td>";
            echo "<td>$username</td>";
            echo "<td>$user_firstname</td>";
            echo "<td>$user_lastname</td>";
            echo "<td>$user_email</td>";
            echo "<td>$user_role</td>";
            echo "<td><a href='users.php?admin=$user_id'>admin</a></td>";
            echo "<td><a href='users.php?subscriber=$user_id'>subscriber</a></td>";
            echo "<td><a onClick= \"javascript:return confirm('Are you sure you want to delete this?');\" href='users.php?delete={$user_id}'>Delete</a></td>";
            echo "<td><a href='users.php?source=edit_user&p_id={$user_id}'>Edit</a></td>";
            echo "</tr>";
        }
        ?>
                              
                            </tbody>
                        </table>
                        
                   