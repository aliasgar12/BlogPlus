
<form action="" method="post">
    <div class="form-group"> 
        <label for="cat-title">Update Category</label>

       <?php 

        if(isset($_GET['edit'])){

            $cat_id = $_GET['edit'];

            $query = ("SELECT * FROM categories WHERE cat_id = {$cat_id}");
            $select_category = mysqli_query($connection,$query);          

            while($row = mysqli_fetch_assoc($select_category)){

                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];    

                ?>
                <input type="text" value="<?php 
                if(isset($cat_title)) echo $cat_title; ?> "
                name="cat-title" class="form-control">

                <?php }} ?>


            <?php 

            if(isset($_POST['update'])){

                $cat_update_title = $_POST['cat-title'];
                $query= "UPDATE categories SET cat_title = '{$cat_update_title}' WHERE cat_id = {$cat_id}";

                $update_query= mysqli_query($connection, $query); 
                header("Location: categories.php");

            }

            ?> 



    </div>  
    <div class="form-group">
        <input type="submit" name="update" value="Update" class="btn btn-primary">
    </div>
</form>