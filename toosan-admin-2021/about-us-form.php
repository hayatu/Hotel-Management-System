<?php require_once("authenticate.php");?>
<?php include("top-header-main.php"); ?>
<!-- Navigation -->
<?php include("main-top-header.php"); ?>

<?php
	require_once("common/db_func.php");
	$conn = db_connect();
	$query1 = sprintf("select room_type_id, room_type from room_type_info order by room_type ");
	$n1 = db_select_query($conn, $query1, $rs_room_type);
	
	 
	db_close($conn);
?>
<script type="text/javascript" src="js/wysiwyg.min.js"></script> 
<!-- Navbar -->
<?php include("nav-bar.php"); ?>
<!-- /.Navbar -->
<script>
  $(function() {
    $('#reporteditor').mdbWYSIWYG();
    $('#fullreporeditor').mdbWYSIWYG({
      translations: {
        paragraph: 'Paragraph',
        heading: 'Heading',
        preformatted: 'Preformateado',
        bold: 'Negrita',
        italic: 'It\u00e1lica',
        strikethrough: 'Tachado',
        underline: 'Subrayado',
        textcolor: 'Color del texto',
        alignleft: 'Align Left',
        aligncenter: 'Align center',
        alignright: 'Align Right',
        alignjustify: 'Align Justify',
        insertlink: 'Insertar enlace',
        insertpicture: 'Insertar imagen',
        bulletlist: 'Lista de vi\u00f1etas',
        numberedlist: 'Lista numerada',
        enterurl: 'Insertar enlace',
        imageurl: 'Insertar enlace de imagen',
        linkdescription: 'Descripci\u00f3n de la enlace',
        linkname: 'El nombre del enlace',
        showHTML: 'Show HTML code'
      }
    });
    $('#demoCustomPalette').mdbWYSIWYG({
      colorPalette: {
        red: '#d50000',
        green: '#64dd17',
        yellow: '#fff176',
        blue: '#03a9f4',
        purple: '#6a1b9a',
        white: '#fff',
        black: '#000'
      }
    });
  });
</script>
<main class="pl-1 pt-1">
	<div class="container">
		<!--Section: Main panel-->
		<section class="mb-3">
			<!--Card-->
			<div>         
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
		<!--Grid column-->     
		
		 <form name="form1" action="aboutus-insert.php" method="post" enctype="multipart/form-data">
            <p class="h5 text-center mb-0">About Us Form</p>
            <hr class="light-blue lighten-1 title-hr">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->		
				  <div class="col-md-12 mb-4">
                    <div>
                        <i class="fas fa-heading prefix grey-text"></i>  
                        <label for="title" class="active">Title</label>
                        <input name="title" type="text" id="title" class="form-control" placeholder="Title" required>
                    </div>
                </div>
                <!--Grid column-->
			
				 <!--Grid column-->
                <div class="col-md-12 mb-4">
                    <div>
                          <i class="fas fa-audio-description prefix grey-text"></i>  
                        <label for="about" class="active">Content</label>
                        <textarea name="about" type="text" class="form-control md-textarea" id="reporteditor" placeholder="Content Description" required rows="3"></textarea>
                    </div>
                </div>
				
				  <!--Grid column-->		
				  <div class="col-md-12 mb-4">
                    <div>
                        <i class="fas fa-heading prefix grey-text"></i>  
                        <label for="policy_title " class="active">Title</label>
                        <input name="policy_title" type="text" id="policy_title" class="form-control" placeholder="Policy Title" required>
                    </div>
                </div>
                <!--Grid column-->
               
                <!--Grid column-->
                <div class="col-md-12 mb-4">
                    <div>
                          <i class="fas fa-audio-description prefix grey-text"></i>  
                        <label for="policies" class="active">Policy Content</label>
                        <textarea name="policies" type="text" class="md-textarea" id="fullreporeditor" placeholder="Content Description" required rows="3"></textarea>
                    </div>
                </div>				
				  <!--Grid column-->
				  
				  <!--Grid column-->		
				  <div class="col-md-4 mb-4">
                    <div>
                        <i class="fas fa-envelope prefix grey-text"></i>  
                        <label for="email_address" class="active">Email Address</label>
                        <input name="email_address" type="email" id="email_address" class="form-control" placeholder="Email Address" required>
                    </div>
                </div>
                <!--Grid column-->
				<!--Grid column-->		
				  <div class="col-md-4 mb-4">
                    <div>
                        <i class="fas fa-envelope prefix grey-text"></i>  
                        <label for="phone" class="active">Phone Number</label>
                        <input name="phone" type="text" id="phone" class="form-control" placeholder="Phone Number" required>
                    </div>
                </div>
                <!--Grid column-->
				<!--Grid column-->
                <div class="col-md-4 mb-4">
                    <div>
                          <i class="fas fa-audio-description prefix grey-text"></i>  
                        <label for="address" class="active">Address</label>
                        <textarea name="address" type="text" class="form-control md-textarea" id="address" placeholder="Address" required rows="3"></textarea>
                    </div>
                </div>				
				  <!--Grid column-->
            </div>
			
            <!--Grid row-->
            <div class="text-center mt-4">
                
				 <input name="submit" type="submit" value="Submit" id="submit" class="btn btn-primary"/>
            </div>
			
        </form>
		
		
		<!--Grid column-->
	</div>
</main>
<!--Main layout-->

<!-- Footer -->
<?php include("footer.php"); ?>

<!-- Footer -->