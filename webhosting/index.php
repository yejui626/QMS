<?php
include 'dbconnect.php';

$sql="  SELECT * FROM tb_feedback
        LEFT JOIN tb_service ON tb_feedback.f_serviceID = tb_service.s_serviceID
        LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
        WHERE f_rating ='5' OR f_rating ='4'";


$result=mysqli_query($con,$sql);
?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>POWEREC</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo1.jpg" rel="icon">
  <link href="assets/img/logo1.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/indexstyle.css" rel="stylesheet">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center  header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.php">POWEREC</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul class="nav">
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#testimonials">Testimonials</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li>
          <li><a href="signin/signin.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-end align-items-center" style="padding-top:0px;">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <img src="assets/img/logo1.jpg" class="img-fluid animated" width="250px" height="50px">
          <h2 class="animate__animated animate__fadeInDown">WELCOME TO <span>POWEREC</span></h2>
          <p class="animate__animated fanimate__adeInUp">POWER • EXTRAORDINARY • COMMITTED</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <img src="assets/img/slide2.jpg" class="img-fluid animated" width="250" height="50">
          <h2 class="animate__animated animate__fadeInDown">KEM KDSI</h2>
          <p class="animate__animated fanimate__adeInUp">Lawatan tapak kerja-kerja menaiktaraf sistem chiller dan freezer (cold room) dan lain-lain kerja berkaitan di Wisma Seri Bayu, Kem KDSI, Tg Pengelih, Pengerang, Kota Tinggi, Johor.
          Kod bidang : CIDB G1 ME M01</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <img src="assets/img/slide3.jpg" class="img-fluid animated" width="250" height="50">
          <h2 class="animate__animated animate__fadeInDown">Jabatan Pendidikan Negeri Johor</h2>
          <p class="animate__animated fanimate__adeInUp">Kod bidang : CIDB G1 ME M01 M02. Lawatan tapak kerja-kerja penyelenggaraan dan pembaikan penghawa dingin di Jabatan Pendidikan Negeri Johor.</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div>

      <!-- Slide 4 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <img src="assets/img/slide4.jpg" class="img-fluid animated" width="250" height="50">
          <h2 class="animate__animated animate__fadeInDown">JKR Cawangan Kejuruteraan Mekanikal Negeri Johor</h2>
          <p class="animate__animated fanimate__adeInUp">Kod bidang : CIDB G1 ME M22. Taklimat lawatan tapak kerja-kerja naiktaraf sistem pam (submersible) di air terjun Taman Bunga Istana Bukit Serene, Johor Bahru, Johor.</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      </a>

    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>About</h2>
          <p>Who we are</p>
        </div>

        <div class="row content" data-aos="fade-up">
          <div class="col-lg-6">
            <p>
              POWEREC provide various services provision such as:
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Electrical & Electronic Repair</li>
              <li><i class="ri-check-double-line"></i> Air conditioning and refrigeration supply & repair</li>
              <li><i class="ri-check-double-line"></i> Power supply & telecommunications cabling works</li>
              <li><i class="ri-check-double-line"></i> Fire fighting & fire alarm system</li>
              <li><i class="ri-check-double-line"></i> Fogging maintenance work</li>
              <li><i class="ri-check-double-line"></i> Sewage maintenance work</li>
              <li><i class="ri-check-double-line"></i> Cleaning of buildings & cleaning area services</li>
              <li><i class="ri-check-double-line"></i> Sanitary maintenance work</li>
            </ul>
            <?php
              $dt=date("l");
              if($dt == "Saturday" )
              {
                echo "<p style='color:red;'>Closed Today</p>";
              } 
              else
              {
                echo "<p>Open today until 5:00 PM</p>";
              }
            ?>

          </div>

          <div class="col-lg-6">
            <p>
                <img src="assets/img/shop1.jpg" class="img-fluid animated" width="600px" style="padding-top: 10px">

            </p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

  
    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="row" data-aos="zoom-out">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Call To Action</h3>
            <p> Log in to our system now OR click call now to look for a quote.</p>

          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="tel:+60-7-386-3448" data-tracking-element-type="3" jslog="56037; track:impression,click" itemprop="telephone" dir="ltr">Call now</a>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Services</h2>
          <p>What we do offer</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <a href="signin/signin.php" style="color: black;">
              <div class="icon-box" data-aos="zoom-in-left">
                <div class="icon"><i class="bi bi-lightning-charge" style="color: yellow;"></i></div>
                <h4 class="title" padding-top="10%">Electrical & Electronic</h4>
                <p class="description"> Maintain and repair factory equipment and other industrial machinery, such as conveying systems, production machinery, and packaging equipment.</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
            <a href="signin/signin.php" style="color: black;">
              <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="100">
                <div class="icon"><i class="bi bi-snow" style="color: deepskyblue;"></i></div>
                <h4 class="title">Air conditioning</h4>
                <p class="description">Work on heating, ventilation, cooling, and refrigeration systems that control the temperature and air quality in buildings.</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6 mt-5 mt-lg-0 ">
            <a href="signin/signin.php" style="color: black;">
              <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="200">
                <div class="icon"><i class="bi bi-bug-fill" style="color: #3fcdc7;"></i></div>
                <h4 class="title">Pest Control</h4>
                <p class="description">Commercial Pest Control to kill Termites, Rodents, Ants, and Cockroach Control Service For Your Company</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6 mt-5">
            <a href="signin/signin.php" style="color: black;">
              <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="300">
                <div class="icon"><i class="ri ri-fire-fill" style="color:#FF0000;"></i></div>
                <h4 class="title">Fire fighting & fire alarm system</h4>
                <p class="description">Powerec Fire Suppression Systems offer a range of advanced solutions for assets protection.</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6 mt-5">
            <a href="signin/signin.php" style="color: black;">
              <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="400">
                <div class="icon"><i class="bi bi-paragraph" style="color: #d6ff22;"></i></div>
                <h4 class="title">Pump</h4>
                <p class="description">
                  Install pumps in buildings
                </p>
              </div>
            </a>
          </div>


          <div class="col-lg-4 col-md-6 mt-5">
            <a href="signin/signin.php" style="color: black;">
              <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="500">
                <div class="icon"><i class="bi bi-droplet-fill" style="color: #4680ff;"></i></div>
                <h4 class="title">Sewage</h4>
                <p class="description">Remove obstructions and sewers cleaning including sewer appurtenances and repair works</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6 mt-5">
            <a href="signin/signin.php" style="color: black;">
              <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="600">
                <div class="icon"><i class="bi bi-bucket-fill" style="color: cadetblue;"></i></div>
                <h4 class="title">Cleaning and Sanitary</h4>
                <p class="description">Cleaning of buildings & cleaning area services</p>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6 mt-5">
            <a href="signin/signin.php" style="color: black;">
              <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="700">
                <div class="icon"><i class="bi bi-tools" style="color: lightslategray;"></i></div>
                <h4 class="title">Civil</h4>
                <p class="description">
                  Design, construction, and maintenance of the buildings
                </p>
              </div>
            </a>
          </div>

        </div> <!--end of row-->

      </div>  <!--end of container-->
    </section><!-- End Services Section -->


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Testimonials</h2>
          <p>What they are saying about us</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

<?php
          while ($row = mysqli_fetch_array($result)){
          echo"
            <div class='swiper-slide'>
              <div class='testimonial-item' style=' min-height: 200px;'>
                <p>
                  <i class='bx bxs-quote-alt-left quote-icon-left'></i>
                      ".$row['f_details']."
                  <i class='bx bxs-quote-alt-right quote-icon-right'></i>
                </p>
                <span class='text-muted'>".$row['f_rating'].".0</span>
                ".str_repeat('<i class="fa fa-star" aria-hidden="true" style=" color: #fbc634;"></i>', $row['f_rating']) ."
                <br><br><h3>".$row['c_customerName']."</h3>
              </div>
            </div><!-- End testimonial item -->";
}
?>        
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>
        <div class="row mt-5">

          
          <div class="col-lg-4" data-aos="fade-right">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.4666128239915!2d103.8682865!3d1.4914706000000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da6b47890b1edf%3A0x7525f5d4731821f3!2sPowerec%20Technology%20Service!5e0!3m2!1sen!2smy!4v1641302425620!5m2!1sen!2smy" width="600" height="450" style="margin-left:60px; border:0;" allowfullscreen="" loading="lazy"></iframe>
                <p>60, Jalan Sena 1, Taman Rinting, 81750 Masai, Johor</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>07-386 3448</p>
              </div>

            <div class="phone">
                <i class="bi bi-briefcase"></i>
                <h4>Business Hour:</h4>            
                <table>
                    <tr>
                      <td><p style="padding-left:20px;"> Mon </p></td>
                      <td><p style="padding-left:10px;"> : </p></td>
                      <td><p style="padding-left:10px;"> 8:00 AM – 5:00 PM </p></td>
                    </tr>
                    <tr>
                      <td><p style="padding-left:20px;"> Tue </p></td>
                      <td><p style="padding-left:10px;"> : </p></td>
                      <td><p style="padding-left:10px;"> 8:00 AM – 5:00 PM </p></td>
                    </tr>
                    <tr>
                      <td><p style="padding-left:20px;"> Wed </p></td>
                      <td><p style="padding-left:10px;"> : </p></td>
                      <td><p style="padding-left:10px;"> 8:00 AM – 5:00 PM </p></td>
                    </tr>
                    <tr>
                      <td><p style="padding-left:20px;"> Thu </p></td>
                      <td><p style="padding-left:10px;"> : </p></td>
                      <td><p style="padding-left:10px;"> 8:00 AM – 5:00 PM </p></td>
                    </tr>
                    <tr>
                      <td><p style="padding-left:20px;"> Fri </p></td>
                      <td><p style="padding-left:10px;"> : </p></td>
                      <td><p style="padding-left:10px;"> 8:00 AM – 5:00 PM </p></td>
                    </tr>
                    <tr>                      
                      <td><p style="padding-left:20px;"> Sat </p></td>
                      <td><p style="padding-left:10px;"> : </p></td>
                      <td><p style="color: red; padding-left:10px;"> Closed </p></td>
                    </tr>
                    <tr>
                      <td><p style="padding-left:20px;"> Sun </p></td>
                      <td><p style="padding-left:10px;"> : </p></td>
                      <td><p style="padding-left:10px;"> 8:00 AM – 5:00 PM </p></td>
                    </tr>
                  </table>
                
              </div>

            </div>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>POWEREC</h3>
      <p>Updated @2022 </p>
      <div class="social-links">
        <a href="https://www.facebook.com/powerecjb/" class="facebook"><i class="bx bxl-facebook"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>