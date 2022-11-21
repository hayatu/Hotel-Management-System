<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require_once("common/db_func.php");
	$conn = db_connect();
    $query1 = sprintf("select ri.room_id, ri.image_name1,ri.image_name2,ri.image_name3,ri.roomDesc,ri.room_price,ri.noofBed, ri.maxAdult,ri.maxChild, room_type_info.room_type "
	."from tble_room_info ri "	 
	 ."left join room_type_info on ri.room_type_id = room_type_info.room_type_id "
	."where ri.deleteflag = 0 and ri.room_status = 'available' order by room_price");
$n1 = db_select_query($conn, $query1, $rs_image);
	db_close($conn);
	//header("Location: register-sucess.php");
?>
   
	<?php include("main-header.php"); ?>
<!-- Main Header Ends -->

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <!-- End Property Search Section -->

  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
     <?php include("hr-menu.php"); ?>
  </nav><!-- End Header/Navbar -->
 <!-- Rooms Section Begin -->
    <section class="room-section spad">
        <div class="container p-5">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
	<script>
		function getPDF(){

		var HTML_Width = $(".canvas_div_pdf").width();
		var HTML_Height = $(".canvas_div_pdf").height();
		var top_left_margin = 15;
		var PDF_Width = HTML_Width+(top_left_margin*2);
		var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
		var canvas_image_width = HTML_Width;
		var canvas_image_height = HTML_Height;
		
		var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;

		html2canvas($(".canvas_div_pdf")[0],{allowTaint:true}).then(function(canvas) {
			canvas.getContext('2d');
			
			console.log(canvas.height+"  "+canvas.width);
			
			var imgData = canvas.toDataURL("image/jpeg", 1.0);
			var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
		    pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);
			
			for (var i = 1; i <= totalPDFPages; i++) { 
				pdf.addPage(PDF_Width, PDF_Height);
				pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
			}
			
		    pdf.save("HTML-Document.pdf");
        });
	};
	</script>
<style>
	.card {
    margin-bottom: 1.5rem
}

.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #c8ced3;
    border-radius: .25rem
}

.card-header:first-child {
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0
}

.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: #f0f3f5;
    border-bottom: 1px solid #c8ced3
}
	</style>

<div class="container canvas_div_pdf">
    <div id="ui-view" data-select2-id="ui-view">
        <div>
            <div class="card">
                <div class="card-header">Invoice
                    <strong>#BBB-10010110101938</strong>
                    <a class="btn btn-sm btn-success float-right mr-1 d-print-none" href="#" onclick="javascript:window.print();" data-abc="true">
                        <i class="fa fa-print"></i> Print</a>
						 <a class="btn btn-sm btn-success float-right mr-1 d-print-none" href="#" onclick="getPDF()" id="downloadbtn"  data-abc="true">
                        <i class="fa fa-print"></i> Download</a>			
                  
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-4">
                            <h6 class="mb-3">From:</h6>
                            <div>
                                <strong>BBBootstrap.com</strong>
                            </div>
                            <div>42, Awesome Enclave</div>
                            <div>New York City, New york, 10394</div>
                            <div>Email: admin@bbbootstrap.com</div>
                            <div>Phone: +48 123 456 789</div>
                        </div>
                        <div class="col-sm-4">
                            <h6 class="mb-3">To:</h6>
                            <div>
                                <strong>BBBootstrap.com</strong>
                            </div>
                            <div>42, Awesome Enclave</div>
                            <div>New York City, New york, 10394</div>
                            <div>Email: admin@bbbootstrap.com</div>
                            <div>Phone: +48 123 456 789</div>
                        </div>
                        <div class="col-sm-4">
                            <h6 class="mb-3">Details:</h6>
                            <div>Invoice
                                <strong>#BBB-10010110101938</strong>
                            </div>
                            <div>April 30, 2019</div>
                            <div>VAT: NYC09090390</div>
                            <div>Account Name: BBBootstrap Inc</div>
                            <div>
                                <strong>SWIFT code: 99 8888 7777 6666 5555</strong>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th class="center">Quantity</th>
                                    <th class="right">Unit Cost</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="center">1</td>
                                    <td class="left">Iphone 10</td>
                                    <td class="left">Apple iphoe 10 with extended warranty</td>
                                    <td class="center">16</td>
                                    <td class="right">$999,00</td>
                                    <td class="right">$999,00</td>
                                </tr>
                                <tr>
                                    <td class="center">2</td>
                                    <td class="left">Samsung S6</td>
                                    <td class="left">Samsung S6 with extended warranty</td>
                                    <td class="center">20</td>
                                    <td class="right">$150,00</td>
                                    <td class="right">$3.000,00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</div>
                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="left">
                                            <strong>Subtotal</strong>
                                        </td>
                                        <td class="right">$8.497,00</td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>Discount (20%)</strong>
                                        </td>
                                        <td class="right">$1,699,40</td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>VAT (10%)</strong>
                                        </td>
                                        <td class="right">$679,76</td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>Total</strong>
                                        </td>
                                        <td class="right">
                                            <strong>$7.477,36</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
							
                            <!--<a class="btn btn-success" href="#" data-abc="true">
                                <i class="fa fa-usd"></i> Proceed to Payment</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </section>
    <!-- Rooms Section End -->
	 <!-- ======= Footer ======= -->
  <section class="section-footer contact">
     <?php include("footer.php"); ?>  
  </section>
  <footer>
     <?php include("sub-footer.php"); ?>  
  </footer><!-- End  Footer -->
  