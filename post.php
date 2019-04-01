<?php
  require('config/config.php');
  require('config/db.php');

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
    </div><!--end of container-->
<?php include('include/footer.php') ?>
