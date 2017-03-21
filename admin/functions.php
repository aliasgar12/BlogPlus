<?php 


function users_online(){
    
    global $connection;
    $session = session_id();
    $time = time();
    $time_out= 60;
    $time_expire = $time - $time_out;

    $query = "SELECT * FROM users_online WHERE session= '{$session}'";
    $get_session_detail = mysqli_query($connection , $query);
    $count = mysqli_num_rows($get_session_detail);

        if($count == NULL){

            $insert_user_session = mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session',$time)");
        }else{

            $update_user_session = mysqli_query($connection, "UPDATE users_online SET time = $time WHERE session= '$session'");
        }


    $users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time>$time_expire");
    return mysqli_num_rows($users_online_query);
    
}


function confirm_query($result){
    
    global $connection;
    if(!$result){
        
        die("Query Failed!!". mysqli_error($connection));
    }
    
    
}

function insert_categories(){
    global $connection;
    
    if(isset($_POST['submit'])){

        $cat_title = $_POST['cat-title'];


        if($cat_title=="" || empty($cat_title)){

            echo "<h2>This field should not be empty.</h2>";
            }else{
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('{$cat_title}') ";

            $create_category = mysqli_query($connection , $query);

            if(!$create_category){
            die("Query Failed" . mysqli_error($connection));
            }

        }
    } 

}


function showAllCategories(){
    global $connection;
    
    $query = ("SELECT * FROM categories");
    $select_category = mysqli_query($connection,$query);          
    ?> 

    <?php

    while($row = mysqli_fetch_assoc($select_category)){

        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";

        echo "</tr>";

}
}

function deleteCategories(){
    
    global $connection;
    
    if(isset($_GET['delete'])){

    $cat_id_delete = $_GET['delete'];
    $query= "DELETE FROM categories WHERE cat_id = '{$cat_id_delete}'";

    $delete_query= mysqli_query($connection, $query);
    header("Location: categories.php");
}
}

?>