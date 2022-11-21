<!-- Main Header Start -->
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

  <!-- ======= Intro Section ======= -->
  <div class="intro intro-carousel swiper-container position-relative">
   <?php include("main-slider.php"); ?>  
    <div class="swiper-pagination"></div>
  </div><!-- End Intro Section -->

  <main id="main">

 <section class="section-services">
      <?php include("availability-form.php"); ?>  
    </section><!-- End Services Section -->
    <!-- ======= Services Section ======= -->
    <section class="section-services pt-2">
      <?php include("services.php"); ?>  
    </section><!-- End Services Section -->

    <!-- ======= Latest Properties Section ======= -->
    <section class="section-property pt-5">
      <?php include("rooms.php"); ?>  
    </section><!-- End Latest Properties Section -->
    
    <!-- ======= Latest News Section ======= -->
    <section class="section-news pt-5">
       <?php include("gallery.php"); ?>  
    </section><!-- End Latest News Section -->
    <section class="section-news pt-5">
       <?php include("video.php"); ?>  
    </section><!-- End Latest News Section -->
    <!-- ======= Testimonials Section ======= -->
   <!-- End Testimonials Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <section class="section-footer contact">
     <?php include("footer.php"); ?>  
  </section>
  <footer>
     <?php include("sub-footer.php"); ?>  
  </footer><!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>