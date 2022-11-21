<div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <!--<div class="title-box">
                <h2 class="title-a">Gallery</h2>
              </div>-->
              <div class="title-link">
                <a href="#">Gallery
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
 <script>
 $(document).ready(function(){
  $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
    
    $(".zoom").hover(function(){
		
		$(this).addClass('transition');
	}, function(){
        
		$(this).removeClass('transition');
	});
});
  </script>
    <!-- Page Content -->
   <div class="container page-top">
        <div class="row">
	<?php
	require_once("common/db_func.php");
	$conn = db_connect();	
	$query = sprintf("SELECT * FROM tble_image_gallery");
	$images = db_select_query($conn, $query, $rs_images);
	for($image=0; $image<$images; $image++){
	?>	
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">			
                <a href="gallery/<?php echo $rs_images[$image]["image"]; ?>" class="fancybox" rel="ligthbox">
				<img src="gallery/<?php echo $rs_images[$image]["image"]; ?>" class="zoom img-fluid " alt="" />
               </a>
				<figcaption class="figure-caption"><?php echo $rs_images[$image]["title"]; ?> </figcaption>
            </div>
                  
          <?php } ?>           
       </div>     
    </div>
  </div>