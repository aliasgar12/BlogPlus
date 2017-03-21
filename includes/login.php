<?php include"db.php" ?>
<?php session_start();   ?>

<?php

if(isset($_POST['login'])){
    

$username = $_POST['username'];
$password = $_POST['user_password'];

    
$username = mysqli_real_escape_string($connection, $username);
$user_password = mysqli_real_escape_string($connection, $password);

$query = "SELECT * FROM users WHERE username= '{$username}'";
    $login_query = mysqli_query($connection, $query);
    if(!$login_query){
        die("Query Failed" . mysqli_error($connection));
    }
    
    
    while($row = mysqli_fetch_assoc($login_query)){
        
        $db_username = $row['username'];
        $db_user_password= $row['user_password'];
        $db_id= $row['user_id'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_role = $row['user_role'];
                
        if(password_verify($password,$db_user_password )){
            
            $_SESSION['username'] = $db_username;
            $_SESSION['firstname'] = $db_user_firstname;
            $_SESSION['lastname'] = $db_user_lastname;
            $_SESSION['role'] = $db_role;
            $_SESSION['id'] = $db_id;
                
            header("Location: ../admin");
        }else{
            header("Location: ../index.php");
        }
        
    }
    
}




?>