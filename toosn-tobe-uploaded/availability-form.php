<div class="container p-4 my-4  border" style="background-color: #f3f3f3;">
   <!-- Availability form -->
				 
	<form name="form1" action="available-rooms.php" method="POST" enctype="multipart/form-data" id="booking">
	    
		

	 <!--Grid row-->
            <div class="row">
				  <!--Grid column-->
				<div class="col-md-3 pt-3">
						 <div class="input-group date">
                    <input name="StartDate" type="text" class="form-control" id="check_in_date" placeholder="Select Check In Date" required> 
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
				
				</div>	
              <!--Grid column-->	
			 
				<div class="col-md-3 pt-3">
				
						 <div class="input-group date">
                   <input name="EndDate" type="text" class="form-control" id="check_out_date" placeholder="Select Check Out Date"  required> 
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
				
				</div>	
              <!--Grid column-->	
			  
				<!--Grid column-->
					<div class="col-md-4 pt-3">
						<div class="form-group">
						<span class="form-label">Guests</span>
					  <select name="maxAdult" type="text" class="p-1"> 
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>						
						</select>
						<span class="select-arrow">Children</span>
					    <select name ="maxChild" type="text" class="p-1">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>					
						</select>
						<span class="select-arrow"></span>
						</div>
					</div>	
				<!--Grid column-->	
			  
				<div class="col-md-2">
		<button class="btn btn-success btn-md p-4" type="submit">Check Availability</button>
		</div>
		</div>
		<!--Grid row-->
	</form>
	
	<!-- Availability form -->
        </div>
	      
    <script language="javascript">
        $(document).ready(function () {
            $("#check_in_date").datepicker({
                minDate: 0
            });
        });
    </script>
	<script language="javascript">
        $(document).ready(function () {
            $("#check_out_date").datepicker({
                minDate: 0
				
            });
        });
    </script>
	


