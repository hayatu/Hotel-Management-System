<?php include_once("main-top-header.php"); ?>
<!-- Navigation -->
<?php include("top-header-main.php"); ?>
<!-- Main layout -->
<!-- Navbar -->
<?php include("nav-bar.php"); ?>
<link rel="stylesheet" href="gallery/gallery.bootstrap.min.css">
    <!-- Latest compiled and minified CSS -->   
    <link rel="stylesheet" href="gallery/jquery.fancybox.min.css" media="screen">
    <script src="gallery/jquery.min.js"></script>
    <script src="gallery/jquery.fancybox.min.js"></script>
    <style type="text/css">
    .gallery
    {
        display: inline-block;
        margin-top: 20px;
    }
	.img-responsive {
		height:100px;
		}
	
    .close-icon{
    border-radius: 50%;
        position: absolute;
        right: 5px;
        top: -10px;
        padding: 5px 8px;
    }
        .form-image-upload{
            background: #e8e8e8 none repeat scroll 0 0;
            padding: 15px;
        }
    </style>

<div class="container pt-5">
    <h3>Toosan Homnes Image Gallery</h3>
    <form action="imageUpload.php" class="form-image-upload" method="POST" enctype="multipart/form-data">

        <?php if(!empty($_SESSION['error'])){ ?>
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    <li><?php echo $_SESSION['error']; ?></li>
                </ul>
            </div>
        <?php unset($_SESSION['error']); } ?>


        <?php if(!empty($_SESSION['success'])){ ?>
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?php echo $_SESSION['success']; ?></strong>
        </div>
        <?php unset($_SESSION['success']); } ?>


        <div class="row">
            <div class="col-md-5">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Title" required>
            </div>
            <div class="col-md-5">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="col-md-2">
                <br/>
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
        </div>


    </form> 
    <div class="row">
    <div class='list-group gallery'>


            <?php
            require_once("common/db_func.php");
	      $conn = db_connect();	

//Upcoming events
	 $query = sprintf("SELECT * FROM tble_image_gallery" );
	$images = db_select_query($conn, $query, $rs_images);	 
	
            //$sql = "SELECT * FROM image_gallery";
            //$images = $mysqli->query($sql,$conn);


            //while($image = $images->fetch_assoc()){

for($image=0; $image<$images; $image++){
            ?>
			<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure To delete?');
}
</script>
                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="../gallery/<?php echo $rs_images[$image]["image"]; ?>">
                        <img class="img-responsive" alt="" src="../gallery/<?php echo $rs_images[$image]["image"]; ?>" />
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $rs_images[$image]["title"]; ?></small>
                        </div> <!-- text-center / end -->
                    </a>					
					<a onclick="return checkDelete()" href="imageDelete.php?image-id=<?php echo $rs_images[$image]["id"]; ?>"                    
                      <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                   </div> <!-- col-6 / end -->
            <?php } ?>


        </div> <!-- list-group / end -->
    </div> <!-- row / end -->
</div> <!-- container / end -->


</body>


<script type="text/javascript">
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
</html>