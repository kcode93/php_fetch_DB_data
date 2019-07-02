<?php
  require('config/config.php');
  require('config/db.php');

   #global varialbes
   $errMsg='';
   $addClass='';

   //check for submit of posts
   if(isset($_POST['delete'])){
       if(filter_has_var(INPUT_POST,'delete')){
           //get form Data 
           $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);       
          $query = "DELETE FROM post WHERE id = {$delete_id}";
               
          if(mysqli_query($conn, $query)){
            header('Location: '.ROOT_URL.'');
          }else{
            $errMsg ='ERROR: '.mysqli_error($conn);
            $addClass ='alert-danger';
          }
       }
   }

  #get id
  $id = mysqli_real_escape_string($conn, $_GET['id']);

  #create query
  $query = 'SELECT * FROM post WHERE id = '.$id;

  #get results
  $result = mysqli_query($conn,$query);

  #fetch Data
  $post = mysqli_fetch_assoc($result);

  #free results
  mysqli_free_result($result);

  #close connection
  mysqli_close($conn);
?>

<?php include('include/header.php') ?>
    <div class="container">
      <a class="btn btn-secondary" href="<?php echo ROOT_URL; ?>">Back</a>
      <h1><?php echo $post['title']; ?></h1>
        <small>Created on <?php echo $post['created']; ?> by <?php echo $post['author']; ?></small>
        <p><?php echo $post['body']; ?></p>
        <hr>
        <a href="<?php echo ROOT_URL;?>editPost.php?id=<?php echo $post['id'];?>" class="btn btn-primary">Edit</a>
        <form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
          <input type="hidden" name="delete_id" value="<?php echo $post['id'];?>">
          <input type="submit" name="delete" value="Delete" class="btn btn-danger"> 
        </form><!--end of form-->
    </div><!--end of container-->
<?php include('include/footer.php') ?>
