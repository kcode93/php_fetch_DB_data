<?php
    require('config/config.php');
    require('config/db.php');
    
    #global varialbes
    $errMsg='';
    $addClass='';

    //check for submit of posts
    if(isset($_POST['submit'])){
        if(filter_has_var(INPUT_POST,'submit')){
            //get form Data 
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $author = mysqli_real_escape_string($conn, $_POST['author']);
            $body = mysqli_real_escape_string($conn, $_POST['body']);

            if(!empty($title) && !empty($author) && !empty(body)){
                $query = "INSERT INTO post(title, author, body) VALUES('$title', '$author', '$body')";

                if(mysqli_query($conn, $query)){
                    header('Location: '.ROOT_URL.'');
                }else{
                    $errMsg ='ERROR: '.mysqli_error($conn);
                    $addClass ='alert-danger';
                }
            }else{
                $errMsg = 'Please fill in all Requiered fields';
                $addClass ='alert-danger';
            }
        }
    }
?>

<?php include('include/header.php') ?>
    <div class="container">
        <h1>Add a Post</h1>
        <?php if($errMsg != ''): ?>
            <div class="alert <?php echo $addClass; ?>">
                <?php echo $errMsg; ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" placeholder="Required">
            </div><!--end of formgroup-->

            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control" placeholder="Required">
            </div><!--end of formgroup-->

            <div class="form-group">
                <label>body</label>
                <textarea name="body" cols="30" rows="10" class="form-control" placeholder="Required"></textarea>
            </div><!--end of formgroup-->
            <input type="submit" name="submit" value="Post" class="btn btn-primary post-button">
        </form><!--end of form-->
    </div><!--end of container-->
<?php include('include/footer.php') ?>