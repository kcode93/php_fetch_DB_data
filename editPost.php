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
            $update_id = mysqli_real_escape_string($conn, $_POST['update_id']); 
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $author = mysqli_real_escape_string($conn, $_POST['author']);
            $body = mysqli_real_escape_string($conn, $_POST['body']);

            if(!empty($title) && !empty($author) && !empty(body)){
                $query = "UPDATE post SET
                    title = '$title',
                    author ='$title',
                    body = '$body'
                WHERE id = {$update_id}";

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
        <h1>Add a Post</h1>
        <?php if($errMsg != ''): ?>
            <div class="alert <?php echo $addClass; ?>">
                <?php echo $errMsg; ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" placeholder="Required" 
                value="<?php echo $post['title'];?>">
            </div><!--end of form group-->

            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control" placeholder="Required"
                value="<?php echo $post['author'];?>">
            </div><!--end of form group-->

            <div class="form-group">
                <label>body</label>
                <textarea name="body" cols="30" rows="10" class="form-control" placeholder="Required">
                <?php echo $post['body'];?>
                </textarea>
            </div><!--end of form group-->
            <input type="hidden" name="update_id" value="<?php echo $post['id'];?>">
            <input type="submit" name="submit" value="Post" class="btn btn-primary post-button">
        </form><!--end of form-->
    </div><!--end of container-->
<?php include('include/footer.php') ?>