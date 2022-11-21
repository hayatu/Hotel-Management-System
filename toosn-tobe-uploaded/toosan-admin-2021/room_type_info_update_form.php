<?php include("top-header-main.php"); ?>
<!-- Navigation -->
<?php include("main-top-header.php"); ?>
<!-- Main layout -->
<!-- Navbar -->
<?php include("nav-bar.php"); ?>
<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require_once("authenticate.php");
	require_once("common/db_func.php");
	$conn = db_connect();

	  $query = sprintf("select * from room_type_info where room_type_id = %s", GetSQLValueString($_REQUEST["room-type-id"], "int") );
	$n = db_select_query($conn, $query, $rs_roomtype);
	db_close($conn);
?>

<main class="pl-1 pt-1">
    <div class="container">
        <!--Section: Main panel-->
        <section class="mb-3">
            <!--Card-->
            <div class="card card-cascade narrower">
                <!--Section: Table-->
                <section class="text-dark">
                    <!--Top Table UI-->
                    <div class="table-ui p-0 mb-0 mx-0 mb-0">
                        <!--Grid row-->
                        <h6 class="font-weight-bold pl-2 pt-1">Admin Dashboard</h6>
                        <hr class="light-blue lighten-1 title-hr">
                        <!--Grid row-->
                    </div>
                    <!--Top Table UI-->
                </section>
                <!--Section: Table-->
            </div>
            <!--/.Card-->
        </section>
        <!--Section: Main panel-->   
    
        <!-- Register form -->
        <form name="form1" action="room_type_update.php" method="post" enctype="multipart/form-data">
		<input name="room-type-id" type="hidden" id="room-type-id" value="<?php echo $rs_roomtype[0]["room_type_id"]; ?>">
            <p class="h5 text-center mb-0">Room Type Update Form</p>
            <hr class="light-blue lighten-1 title-hr">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-md-12 mb-4">
                    <div>
                        <i class="fas fa-home prefix grey-text"></i>  
                        <label for="room_type" class="active">Room Type</label>
                        <input name="room_type" type="text" id="room_type" class="form-control" value="<?php echo  $rs_roomtype[0]["room_type"]; ?>">
                    </div>
                </div>
                <!--Grid column-->
               			
								
            </div>
            <!--Grid row-->
            <div class="text-center mt-4">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
        <!-- Register form -->
   
        <!--Grid column-->
    </div>
</main>
<!--Main layout-->



<!-- Footer -->
<?php include("footer.php"); ?>

<!-- Footer -->

