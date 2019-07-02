<?php
  require('config/config.php');
  require('config/db.php');

  #create query
  $query = 'SELECT * FROM post ORDER BY created DESC';

  #get results
  $result = mysqli_query($conn,$query);

  #fetch Data
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

  #free results
  mysqli_free_result($result);

  #close connection
  mysqli_close($conn);
?>

<?php include('include/header.php') ?>
  <div class="container">
    <h1>Posts</h1>
    <?php foreach($posts as $post): ?>
    <div class="well">
      <h3><?php echo $post['title']; ?></h3>
      <small>Created on <?php echo $post['created']; ?> by <?php echo $post['author']; ?></small>
      <p><?php echo $post['body']; ?></p>
      <a class="btn btn-primary" href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['id']; ?>">Read More</a>
      </div><!--end of section-->
    <?php endforeach; ?>
  </div><!--end of container-->
<?php include('include/footer.php') ?>
