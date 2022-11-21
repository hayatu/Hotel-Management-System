<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require_once("common/db_func.php");
	$conn = db_connect();			
	 $query1 = sprintf("select * from tbl_about_info where deleteflag = 0 order by title");
	$n = db_select_query($conn, $query1, $rs_about);
	db_close($conn);
	//header("Location: register-sucess.php");
?>
<div class="container  mt-5 pt-5">
	<!-- ======= Intro Single ======= -->
    <section class=" mt-5 pt-5">
      
        <div class="row">
          <div class="col-md-12 col-lg-12">
            <div class="title-single-box">
              <h4><?php echo $rs_about[0]["title"]; ?></h4>
              <p class="text-justify"><?php echo $rs_about[0]["about"]; ?></p>
            </div>
          </div>
        </div>
    
    </section><!-- End Intro Single-->
<!-- //banner-bottom -->
 </div>
	  
	  