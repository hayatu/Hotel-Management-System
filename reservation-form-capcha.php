<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require_once("common/db_func.php");
		$conn = db_connect();
		$query3 = sprintf("select email_address,phone,address from tbl_about_info where deleteflag = 0 order by title");
	$n3 = db_select_query($conn, $query3, $rs_about);
      $query1 = sprintf("select ri.room_id,ri.room_type_id, ri.image_name1,ri.room_price,ri.noofBed, ri.maxAdult,ri.maxChild,ri.security_deposit, room_type_info.room_type "
	."from tble_room_info ri "	 
	 ."left join room_type_info on ri.room_type_id = room_type_info.room_type_id "
	."where ri.room_id  = %s and ri.deleteflag = 0   order by room_price",
	GetSQLValueString($_REQUEST["room-id"], "int"));
$n1 = db_select_query($conn, $query1, $rs_booking);
$room_price = $rs_booking[0]["room_price"];
$roomroom_type = $rs_booking[0]["room_type_id"];
$sec_deposit = $rs_booking[0]["security_deposit"];
  
  $query2 = sprintf("select country_id, country_name from tble_countries order by country_name ");
	$n2 = db_select_query($conn, $query2, $rs_country);
	
	$session_value_StartDate = '';
	$session_value_EndDate = '';
	
if(isset($_SESSION['StartDate']) && $_SESSION['EndDate']){
 $session_value_StartDate .=$_SESSION['StartDate']; 
 $session_value_EndDate .=$_SESSION['EndDate']; 
 
}
$booking_number = rand(1000,9999); 
	
 if(isset($_POST['submit'])){
	 	$captcha = $_POST["captcha"];

      $captchaUser = filter_var($_POST["captcha"], FILTER_SANITIZE_STRING);
	  
	   if(empty($captcha)) {
        echo "<div class='container pt-5 mt-5'> 	
			<div class='alert alert-danger' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<strong>There was an error!</strong> while submiting your form. Please try again.
			</div>
		</div>";
	   }
	   else if($_SESSION['CAPTCHA_CODE'] == $captchaUser){
       // insert 
			         echo $query2 = sprintf("insert into tbl_booking_info(room_id,room_type_id, noofnights,checkinDate, checkoutDate, title, first_name, last_name,country_id, phone_code, phone_number,email,s_request,BookingNumber,room_price,security_deposit,status_id) values(%s, %s, %s, %s, %s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)", 
									GetSQLValueString($_REQUEST["room_id"], "int"),
									GetSQLValueString($roomroom_type, "int"),
									GetSQLValueString($_REQUEST["noofnights"], "int"),
									GetSQLValueString($_REQUEST["checkinDate"], "text"),							
									GetSQLValueString($_REQUEST["checkoutDate"], "text"),
									GetSQLValueString($_REQUEST["title"], "text"),
									GetSQLValueString($_REQUEST["first_name"], "text"),
									GetSQLValueString($_REQUEST["last_name"], "text"),								
									GetSQLValueString($_REQUEST["country_id"], "int"), 
                                    GetSQLValueString($_REQUEST["phone_code"], "text"),
									GetSQLValueString($_REQUEST["phone_number"], "int"),
									GetSQLValueString($_REQUEST["email"], "text"),									
									GetSQLValueString($_REQUEST["s_request"], "text"),
									GetSQLValueString($booking_number, "int"),
									$room_price,
									$sec_deposit,
									GetSQLValueString($_REQUEST["status_id"], "int"));
			$n1 = db_other_query($conn, $query2);	 
	
        echo "<div class='container pt-5 mt-5'> 	
			<div class='alert alert-success pt-5 mt-5' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<strong>Your booking has been complated</strong>. Please check your mail box!</strong> Shortly you will receive a confirmation email about your reservation.
			</div>
		</div>";
      }
		else {
         echo "<div class='container pt-5 mt-5'>
              <div class='container pt-4 mt-4'> 		 
			<div class='alert alert-danger' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<strong>Invalid Capcha</strong>.
			</div>
		</div></div>";
       
      }

    } 
		
	
		
db_close($conn);
	  ?>
<!--<script src="https://www.google.com/recaptcha/api.js" async defer></script>-->


  <script src="js/jquery.min.js"></script>
<!-- ======= Contact Single ======= -->
    <section class="contact">
      <div class="container  pt-5 mt-3">
        <div class="row">
          
          <div class="col-sm-12">
            <div class="row">
              
              <div class="col-md-4 section-md-t3 pt-5 mt-5">
                <div class="icon-box section-b2">
                  <div class="icon-box-icon">
                    <span class="bi bi-envelope"></span>
                  </div>
                  <div class="icon-box-content table-cell ">
                    <div class="icon-box-title ">
                      <h4 class="icon-title">Booking Details</h4>
                    </div>
					 <div class="icon-box-title">
					<span class="color-a">
				<?php // Declare two dates

				$start_date  = new DateTime("$session_value_StartDate");
				echo $start_date->format('F d , Y')." - ";
				$end_date = new DateTime("$session_value_EndDate");
				echo $end_date->format('F d , Y')." ";
				$start_date = strtotime("$session_value_StartDate");
				$end_date = strtotime("$session_value_EndDate"); 
				
				?>

</span></div>
	<div class="icon-box-title pt-2">
		<span class="color-a">
		<?php 
			$total_nights = $end_date - $start_date;
			$totalnights = $end_date - $start_date;
			($totalnights)/60/60/24;
			echo  ($total_nights)/60/60/24; ?> Nights
		</span>
	</div>

	<div class="icon-box-title pt-2">
	
		 <span class="color-a">
			 TOTAL Fees:
			<?php 
			$total_nights = $end_date - $start_date;
			echo  ($total_nights)/60/60/24 * $room_price; 
			?> USD
		</span>
		<a href="#" data-toggle="tooltip" title="For total price/fees details please contact Email: toosanhomes@gmail.com or Phone: +905465766145"><img src="image/question.png" alt="Girl in a jacket" width="20" height="20"> </a>
	</div>
	
	<div class="icon-box-title pt-2">
		<span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Refundable at the end of your stay, as long as no damage is discovered during inspection."></span>
		<span class="color-a">
		Security deposit:
		<?php 

		echo  $sec_deposit; 
		?> USD
		<a href="#" data-toggle="tooltip" title="Refundable at the end of your stay, as long as no damage is discovered during inspection."><img src="image/question.png" alt="Girl in a jacket" width="20" height="20"> </a>
		</span>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</div>                    <div class="icon-box-content">
                      <p class="mb-1">Email.
                        <span class="color-a"><?php echo $rs_about[0]["email_address"]; ?> </span>
                      </p>
                      <p class="mb-1">Phone.
                        <span class="color-a"><?php echo $rs_about[0]["phone"]; ?></span>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="icon-box section-b2">
                  <div class="icon-box-icon">
                    <span class="bi bi-geo-alt"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">Find us in</h4>
                    </div>
                    <div class="icon-box-content">
                      <div class="col-sm-12">
					  <p class="mb-1">
                       <?php echo $rs_about[0]["address"]; ?>
                      </p>
            <div class="contact-map box">
              <div id="map" class="contact-map">
                <iframe src="https://maps.google.com/maps?q=Yenibosna%20Merkez,%201.%20Asena%20Sk.%20No:15%20,%2034197%20Bahcelievler%20/%20Istanbul&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
          </div>
                    </div>
                  </div>
                </div>
                <div class="icon-box">
                  <div class="icon-box-icon">
                    <span class="bi bi-share"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">Social networks</h4>
                    </div>
                    <div class="icon-box-content">
                      <div class="socials-footer">
                        <ul class="list-inline">
                          <li class="list-inline-item">
                            <a href="#" class="link-one">
                              <i class="bi bi-facebook" aria-hidden="true"></i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a href="#" class="link-one">
                              <i class="bi bi-youtube" aria-hidden="true"></i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a href="#" class="link-one">
                              <i class="bi bi-instagram" aria-hidden="true"></i>
                            </a>
                          </li>                         
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
			<!-- ======= Start Reservation Form ======= -->				
					
			  <div class="col-md-8">
                <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?room-id='
               . $_REQUEST["room-id"]; ?>" role="form">
				<input name="room_id" type="hidden" id="room_id" value="<?php echo $rs_booking[0]["room_id"]; ?>"/>
				<input name="status_id" type="hidden" id="status_id" value="3"/>
                  <div class="row">
				  <?php if(isset($success_message)) { ?>
                    <?php echo $success_message; ?>
                    <?php } ?>
				  <div class="icon-box-content table-cell pt-5 mt-5">
						<div class="icon-box-title">
							<h4 class="icon-title text-center">Your details</h4>
						</div>
					</div>
					<div class="col-md-4" style ="visibility: hidden;">
				 <label>Total Nights</label>
                      <div class="form-group">
                        <input type="text" name="noofnights" value="<?php echo ($total_nights)/60/60/24; ?>" class="form-control form-control-lg form-control-a">
                      </div>
                    </div>
				  <div class="col-md-6" style ="visibility: hidden;">
				 <label>Checkin Date</label>
                      <div class="form-group">
                        <input type="text" name="checkinDate" value="<?php echo $session_value_StartDate; ?>" class="form-control form-control-lg form-control-a">
                      </div>
                    </div>
					
					<div class="col-md-6" style ="visibility: hidden;">
					<label>Checkout Date</label>
                      <div class="form-group">
                        <input type="text" name="checkoutDate" value="<?php echo $session_value_EndDate; ?>" class="form-control form-control-lg form-control-a">
                      </div>
                    </div>
										
                    <div class="col-md-4 mb-3 pt-1">
                      <div class="form-group">
						<select name="title" type="text" class="p-2 form-control form-select form-control-a" required> 
						<option value="">Select Title</option>
							<option value="MR">Mr.</option>
							<option value="MS">Ms.</option>
							<option value="DOC">Dr.</option>
							<option value="PRO">Prof.</option>
							<option value="MRS">Mrs</option>					
						</select>
						</div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input type="text" name="first_name" class="form-control form-control-lg form-control-a" placeholder="First  Name" required>
                      </div>
                    </div>
					<div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input type="text" name="last_name" class="form-control form-control-lg form-control-a" placeholder="Last  Name" required>
                      </div>
                    </div>
					<div class="col-md-6 mb-3 pt-1">
                      <div class="form-group">
						<select name="country_id" type="text" class="p-2 form-control form-select form-control-a" required> 
							<option value="">Select Country or region</option>
								<?php 
									for($i=0; $i<$n2; $i++){
									?>
									
									<option value="<?php echo $rs_country[$i]["country_id"]; ?>"><?php echo $rs_country[$i]["country_name"]; ?></option>
									<?php 
									} 
								?>				
						</select>
						</div>
                    </div>
					
                    <div class="col-md-4 mb-3 pt-1">
                      <div class="form-group">
						<select name="phone_code" type="text" class="p-2 form-control form-select form-control-a" required> 
							<option value="">Country Code</option>
							<option value="1"> +1</option>
							<option value="7">+7</option>
							<option value="20"> +20 </option>
							<option value="27"> +27</option>
							<option value="30"> +30</option>
							<option value="31"> +31</option>
							<option value="32">+32</option>
							<option value="33">+33</option>
							<option value="34">+34</option>
							<option value="36">+36</option>
							<option value="39">+39</option>
							<option value="40">+40</option>
							<option value="41">+41</option>
							<option value="43"> +43</option>
							<option value="44">+44</option>
							<option value="45">+45</option>
							<option value="46">+46</option>
							<option value="47">+47</option>
							<option value="48">+48</option>
							<option value="49">+49</option>
							<option value="51">+51</option>
							<option value="52">+52</option>
							<option value="53">+53</option>
							<option value="54">+54</option>
							<option value="55">+55</option>
							<option value="56">+56</option>
							<option value="57">+57</option>
							<option value="58">+58</option>
							<option value="60">+60</option>
							<option value="61">+61</option>
							<option value="62">+62</option>
							<option value="63">+63</option>
							<option value="64">+64</option>
							<option value="65">+65</option>
							<option value="66">+66</option>
							<option value="81">+81</option>
							<option value="82">+82</option>
							<option value="84">+84</option>
							<option value="86">+86</option>
							<option value="90">+90</option>
							<option value="91">+91</option>
							<option value="92">+92</option>
							<option value="93">+93</option>
							<option value="94">+94</option>
							<option value="95">+95</option>
							<option value="98">+98</option>
							<option value="211">+211</option>
							<option value="212">+212</option>
							<option value="213">+213</option>
							<option value="216">+216</option>
							<option value="218">+218</option>
							<option value="220">+220</option>
							<option value="221">+221</option>
							<option value="222">+222</option>
							<option value="223">+223</option>
							<option value="224">+224</option>
							<option value="225">+225</option>
							<option value="226">+226</option>
							<option value="227">+227</option>
							<option value="228">+228</option>
							<option value="229">+229</option>
							<option value="230">+230</option>
							<option value="231">+231</option>
							<option value="232">+232</option>
							<option value="233">+233</option>
							<option value="234">+234</option>
							<option value="235">+235</option>
							<option value="236">+236</option>
							<option value="237">+237</option>
							<option value="238">+238</option>
							<option value="239">+239</option>
							<option value="240">+240</option>
							<option value="241">+241</option>
							<option value="242">+242</option>
							<option value="243">+243</option>
							<option value="244">+244</option>
							<option value="245">+245</option>
							<option value="246">+246</option>
							<option value="248">+248</option>
							<option value="249">+249</option>
							<option value="250">+250</option>
							<option value="251">+251</option>
							<option value="252">+252</option>
							<option value="253">+253</option>
							<option value="254">+254</option>
							<option value="255">+255</option>
							<option value="256">+256</option>
							<option value="257">+257</option>
							<option value="258">+258</option>
							<option value="260">+260</option>
							<option value="261">+261</option>
							<option value="262">+262</option>
							<option value="263">+263</option>
							<option value="264">+264</option>
							<option value="265">+265</option>
							<option value="266">+266</option>
							<option value="267">+267</option>
							<option value="268">+268</option>
							<option value="269">+269</option>
							<option value="291">+291</option>
							<option value="297">+297</option>
							<option value="298">+298</option>
							<option value="299">+299</option>
							<option value="350">+350</option>
							<option value="351">+351</option>
							<option value="352">+352</option>
							<option value="353">+353</option>
							<option value="354">+354</option>
							<option value="355">+355</option>
							<option value="356">+356</option>
							<option value="357">+357</option>
							<option value="358">+358</option>
							<option value="359">+359</option>
							<option value="370">+370</option>
							<option value="371">+371</option>
							<option value="372">+372</option>
							<option value="373">+373</option>
							<option value="374">+374</option>
							<option value="375">+375</option>
							<option value="376">+376</option>
							<option value="377">+377</option>
							<option value="378">+378</option>
							<option value="379">+379</option>
							<option value="380">+380</option>
							<option value="381">+381</option>
							<option value="382">+382</option>
							<option value="385">+385</option>
							<option value="386">+386</option>
							<option value="387">+387</option>
							<option value="389">+389</option>
							<option value="420">+420</option>
							<option value="421">+421</option>
							<option value="423">+423</option>
							<option value="500">+500</option>
							<option value="501">+501</option>
							<option value="502">+502</option>
							<option value="503">+503</option>
							<option value="504">+504</option>
							<option value="505">+505</option>
							<option value="506">+506</option>
							<option value="507">+507</option>
							<option value="508">+508</option>
							<option value="509">+509</option>
							<option value="534">+534</option>
							<option value="535">+535</option>
							<option value="590">+590</option>
							<option value="591">+591</option>
							<option value="593">+593</option>
							<option value="594">+594</option>
							<option value="595">+595</option>
							<option value="596">+596</option>
							<option value="597">+597</option>
							<option value="598">+598</option>
							<option value="599">+599</option>
							<option value="618">+618</option>
							<option value="670">+670</option>
							<option value="672">+672</option>
							<option value="673">+673</option>
							<option value="674">+674</option>
							<option value="675">+675</option>
							<option value="676">+676</option>
							<option value="677">+677</option>
							<option value="678">+678</option>
							<option value="679">+679</option>
							<option value="680">+680</option>
							<option value="681">+681</option>
							<option value="682">+682</option>
							<option value="683">+683</option>
							<option value="684">+684</option>
							<option value="685">+685</option>
							<option value="686">+686</option>
							<option value="687">+687</option>
							<option value="688">+688</option>
							<option value="689">+689</option>
							<option value="690">+690</option>
							<option value="691">+691</option>
							<option value="692">+692</option>
							<option value="850">+850</option>
							<option value="852">+852</option>
							<option value="853">+853</option>
							<option value="855">+855</option>
							<option value="856">+856</option>
							<option value="880">+880</option>
							<option value="960">+960</option>
							<option value="961">+961</option>
							<option value="962">+962</option>
							<option value="963">+963</option>
							<option value="964">+964</option>
							<option value="965">+965</option>
							<option value="966">+966</option>
							<option value="967">+967</option>
							<option value="968">+968</option>
							<option value="970">+970</option>
							<option value="971">+971</option>
							<option value="972">+972</option>
							<option value="973">+973</option>
							<option value="974">+974</option>
							<option value="975">+975</option>
							<option value="976">+976</option>
							<option value="977">+977</option>
							<option value="992">+992</option>
							<option value="993">+993</option>
							<option value="994">+994</option>
							<option value="995">+995</option>
							<option value="996">+996</option>
							<option value="998">+998</option>
							<option value="1242">+1242</option>
							<option value="1246">+1246</option>
							<option value="1264">+1264</option>
							<option value="1268">+1268</option>
							<option value="1284">+1284</option>
							<option value="1340">+1340</option>
							<option value="1345">+1345</option>
							<option value="1441">+1441</option>
							<option value="1473">+1473</option>
							<option value="1649">+1649</option>
							<option value="1664">+1664</option>
							<option value="1670">+1670</option>
							<option value="1671">+1671</option>
							<option value="1758">+1758</option>
							<option value="1767">+1767</option>
							<option value="1784">+1784</option>
							<option value="1868">+1868</option>
							<option value="1869">+1869</option>
							<option value="1876">+1876</option>
					</select>
						</div>
                    </div>
					<div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input type="text" name="phone_number" class="form-control form-control-lg form-control-a" placeholder="Phone Number" required>
                      </div>
                    </div>
					
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input name="email" type="email" class="form-control form-control-lg form-control-a" placeholder="Your Email" required>
                      </div>
                    </div>
                   
                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea name="s_request" class="form-control" cols="45" rows="8" placeholder="Special Requests"></textarea>
                      </div>
                    </div>
					<div class="col-md-4">
						<div class="form-group">
							Captcha Code: <img src="capcha/captcha.php" >
						</div>
					</div>
						<div class="col-md-8">
							<div class="form-group">			
							<input type="text" class="form-control" name="captcha" id="captcha" placeholder="Enter Captcha Code" required>
							</div>
						</div>
					 <div class="col-md-12 text-center">
                      <button type="submit" name ="submit" class="btn btn-a">Reserve</button>
                    </div>
                  </div>
				  
                </form>
              </div>
			  <!-- ======= End Reservation Form ======= -->
            </div>
          </div>
        </div>
      </div>
	 
    </section><!-- End Contact Single-->
 
  </main><!-- End #main -->
 