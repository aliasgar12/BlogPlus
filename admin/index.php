
<?php include "includes/admin_header.php" ?>        

    <div id="wrapper">
        

        
<?php        if($connection) echo "connected";?>

        <!-- Navigation -->
   
<?php include "includes/admin_navigation.php" ?>        
     

        <div id="page-wrapper">

            <div class="container-fluid">

                
                <!-- Page Heading -->
                
                <div class="row">
                   
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small><?php echo $_SESSION['firstname'];?></small>
                        </h1>
                        
                               
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    <?php 
                        $query= "SELECT * FROM posts";
                        $count_post_query = mysqli_query($connection, $query);
                        $post_count = mysqli_num_rows($count_post_query);
                        echo "<div class='huge'>$post_count</div>";

                    ?>                    
                       
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    <?php 
                        $query= "SELECT * FROM comments";
                        $count_comment_query = mysqli_query($connection, $query);
                        $comment_count = mysqli_num_rows($count_comment_query);
                        echo "<div class='huge'>$comment_count</div>";
                    ?>
                     
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    <?php 
                        $query= "SELECT * FROM users";
                        $count_users_query = mysqli_query($connection, $query);
                        $users_count = mysqli_num_rows($count_users_query);
                        echo "<div class='huge'>$users_count</div>";
                    ?>
                       
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                       
                    <?php 
                        $query= "SELECT * FROM categories";
                        $count_categories_query = mysqli_query($connection, $query);
                        $categories_count = mysqli_num_rows($count_categories_query);
                        echo "<div class='huge'>$categories_count</div>";
                    ?>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
                       
                       
                       
<?php 

$query= "SELECT * FROM posts WHERE post_status='published'";
$count_published_query = mysqli_query($connection, $query); 
$published_count = mysqli_num_rows($count_published_query);
                        
$query= "SELECT * FROM posts WHERE post_status='draft'";
$count_draft_query = mysqli_query($connection, $query); 
$draft_count = mysqli_num_rows($count_draft_query);
                        
$query= "SELECT * FROM comments WHERE comment_status='unapproved'";
$count_unapproved_query = mysqli_query($connection, $query); 
$unapproved_count = mysqli_num_rows($count_unapproved_query);
                        
$query= "SELECT * FROM users WHERE user_role='subscriber'";
$count_sub_query = mysqli_query($connection, $query); 
$subscriber_count = mysqli_num_rows($count_sub_query);

                        
                        
                        
?>                       

                        
<div class="row">
                
 <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            
            <?php 

            $element_text = ['Active Posts','Published Post','Draft Count','Comments','Unapproved Comments','Users','Subscribers','Catgories'];
            $element_count = [$post_count,$published_count,$draft_count,$comment_count,$unapproved_count,$users_count,$subscriber_count,$categories_count];

            for($i=0; $i<count($element_count); $i++){

                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";


            }
            ?>
        
//          ['2014', 1000],
          
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
      }
    </script>
                 
            <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                   
</div>  

              
              
              </div>
                
                </div>
                
                <!-- /.row --> 

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    
    
<?php include "includes/admin_footer.php" ?>