<?php include('include/header.php') ?>
    <div class="container">
        <h1>Add a Post</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
            </div><!--end of formgroup-->

            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control">
            </div><!--end of formgroup-->

            <div class="form-group">
                <label>body</label>
                <textarea name="body" cols="30" rows="10" class="form-control"></textarea>
            </div><!--end of formgroup-->
            <input type="submit" name="submit" value="Post" class="btn btn-primary post-button">
        </form><!--end of form-->
    </div><!--end of container-->
<?php include('include/footer.php') ?>