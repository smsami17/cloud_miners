<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cloud Miners</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo_final.png" rel="icon">
  <link href="assets/img/logo_final.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


  <link href="assets/css/main.css" rel="stylesheet">

  <style>
    .hero .icon-box {
      padding: 60px 30px;
      position: relative;
      overflow: hidden;
      background: rgb(253, 151, 1);
      box-shadow: 0 0 29px 0 rgba(0, 0, 0, 0.08);
      transition: all 0.3s ease-in-out;
      border-radius: 8px;
      z-index: 1;
      height: 100%;
      width: 100%;
      text-align: center;
    }

    .contact .info-item {
      width: 100%;
      background-color: rgb(253, 151, 1);
      margin-bottom: 20px;
      padding: 20px;
      border-radius: 10px;
      color: #fff;
    }

    .btn-success {
      background-color: rgb(253, 151, 1);
      font-weight: bolder;
      box-shadow: 0px 0px 4px 4px #000;
    }

    .hero .btn-get-started {
      background-color: rgb(253, 151, 1);
      font-weight: bolder;
      box-shadow: 0px 0px 4px 4px rgb(253, 151, 1);
      font-size: large;

    }

    .about {
      background-color: rgb(27, 29, 41);
      color: white;
    }

    .faq {
      background-color: rgb(27, 29, 41);
      color: white;
    }

    .faq .accordion-button {
      background-color: black;
      color: white;
    }

    .faq .accordion-button:not(.collapsed) {
      color: white;
    }

    .faq .accordion-body {
      background-color: black;
      color: white;
    }

    .faq .accordion-button .num {
      color: white;
    }

    .contact {
      background-color: rgb(27, 29, 41);
      color: white;
    }

    .contact .php-email-form {
      background-color: rgb(253, 151, 1);
    }

    .services {
      color: white;
    }

    .services .service-item {
      background-color: rgb(253, 151, 1);
    }

    .services .service-item h3 {
      color: white;
    }

    .services .service-item .icon:before {
      background-color: rgb(27, 29, 41);
    }

    .services .service-item .icon i {
      color: white;
    }

    .footer {
      background-color: black;
    }

    .section-header p {
      color: white;
    }

    @media(max-width:768px) {
      .navbar>.btn-success {
        margin-bottom: 20px;
      }

      .main-img {
        padding-left: 0px !important;
        padding-right: 0px !important;
      }

      .sticked-header-offset {
        margin-top: 0px;
      }

      .mtm {
        margin-top: 10px !important;
        margin-left: 5px;
        margin-right: 5px;
      }

      .mtr {
        margin-left: 5px;
        margin-right: 5px;
      }
    }
  </style>
</head>

<body>



  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center navbar-brand">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo_final.png" alt="" style="height: 90px;width: 150px;">
        <!-- <h1>Cloud Miners</h1> -->
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <!-- <li><a href="#portfolio">Portfolio</a></li> -->
          <li><a href="#contact">Contact</a></li>
          <li><a href="register.php" style="color:white" class="btn btn-success mtr p-2">Register</a></li>
          <li><a href="login.php" style="color:white" class="btn btn-success mtm p-2">Login</a></li>


        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>Welcome to <span>Cloud Miners</span></h2>
          <p>"Your journey to financial freedom begins with a simple registration. Join us today and start earning!"
          </p>
          <div class="d-flex justify-content-around justify-content-lg-start">
            <a href="./register.php" class="btn-get-started">Register</a>
            <a href="./login.php" class="btn-get-started">Login</a>
          </div>
        </div>
        <div class="col-lg-6 main-img order-1 order-lg-2">
          <img src="assets/img/download-pKohjZsAg-transformed (1).jpeg" class="img w-100" alt="" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div>

    <div class="icon-boxes position-relative">
      <div class="container position-relative">
        <div class="row gy-4 mt-5">

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon">
                <img src="./assets/img/cd.png" style="width: 100%;height:200px" alt="">
              </div>

            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <img src="./assets/img/bt.png" style="width: 100%;height:200px" alt="">
              <!-- <h4 class="title"><a href="" class="stretched-link">Bitcoin</a></h4> -->
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <img src="./assets/img/bt2.webp" style="width: 100%;height:200px" alt="">

            </div>
          </div><!--End Icon Box -->

          <!-- <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-cash-coin"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Earn</a></h4>
            </div>
          </div> -->
          <!--End Icon Box -->

        </div>
      </div>
    </div>

    </div>
  </section>
  <!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>About Us</h2>
          <p>At Cloud Miners, we are dedicated to revolutionizing the way individuals and businesses participate in
            cryptocurrency mining. Our commitment to transparency, efficiency, and innovation sets us apart in the
            dynamic world of cloud mining.</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-6">
            <h3>Why Choose Cloud Miners?</h3>
            <img src="assets/img/1032.jpg" class="img-fluid rounded-4 mb-4" alt="">
            <p>We believe in transparency at every step. Our users have real-time access to their mining activities,
              earnings, and contract details through our user-friendly interface.</p>
            <p>Powered by state-of-the-art mining hardware, our data centers are designed for optimal efficiency and
              performance. We continuously invest in technology to ensure our users benefit from the latest advancements
              in the industry..</p>
          </div>
          <div class="col-lg-6">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                Your success is our success. Our dedicated customer support team is here to assist you with any
                inquiries or concerns. We are committed to providing exceptional service to our community.
              </p>
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> Choose from a variety of mining contracts tailored to meet
                  your specific needs. Whether you are a seasoned miner or a newcomer, we have options that suit all
                  levels of expertise and investment.
                </li>
                <li><i class="bi bi-check-circle-fill"></i> The security of your investments is our top priority. Our
                  robust security measures safeguard your data and funds, providing you with peace of mind.
                </li>

              </ul>
              <p>
                As we navigate the ever-evolving landscape of cryptocurrency, we envision a future where mining is not
                just a technical endeavor but an accessible opportunity for individuals worldwide. At Cloud Miners, we
                strive to lead this change by fostering a community built on trust, transparency, and financial
                empowerment.
              </p>

              <div class="position-relative mt-4">
                <img src="assets/img/30495.jpg" class="img-fluid rounded-4" alt="">

              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->


    <!-- ======= Our Services Section ======= -->
    <section id="services" class="services sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Services</h2>

        </div>

        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-4 col-md-6">
            <div class="service-item  position-relative">
              <div class="icon">
                <i class="bi bi-pc-display"></i>
              </div>
              <h3>Cutting-Edge Mining Technology</h3>
              <p>Harness the power of the latest mining hardware in our state-of-the-art data centers. Our cutting-edge technology ensures optimal efficiency, maximizing your mining potential.</p>

            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-stopwatch"></i>
              </div>
              <h3>Real-Time Monitoring</h3>
              <p>Stay informed with our user-friendly interface that provides real-time monitoring of your mining activities. Track hash power, earnings, and contract details effortlessly.</p>

            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-lock"></i>
              </div>
              <h3>Secure and Reliable</h3>
              <p>Your security is our priority. Our data centers are equipped with robust security measures to safeguard your data and funds. Count on us for a reliable and secure mining experience.</p>

            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-headphones"></i>
              </div>
              <h3>Customer Support</h3>
              <p>Experience unparalleled customer support with our dedicated team ready to assist you. Whether you have inquiries about contracts, payouts, or general questions, we're here to help.</p>

            </div>
          </div><!-- End Service Item -->


        </div>

      </div>
    </section><!-- End Our Services Section -->

    <!-- ======= Testimonials Section ======= -->



    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="content px-xl-5">
              <h3>Frequently Asked <strong>Questions</strong></h3>

            </div>
          </div>

          <div class="col-lg-8">

            <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                    <span class="num">1.</span>
                    What is cloud mining?
                  </button>
                </h3>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Cloud mining allows you to mine cryptocurrencies without the need for physical hardware. Instead,
                    users purchase or rent hashing power from a remote data center to participate in the mining process.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                    <span class="num">2.</span>
                    How does cloud mining work?
                  </button>
                </h3>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Users buy mining contracts, which represent a share of the total hash power of the remote data
                    center. The mining rewards are distributed proportionally among users based on their purchased hash
                    power.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                    <span class="num">3.</span>
                    Which cryptocurrencies can I mine with your service?
                  </button>
                </h3>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Our platform supports mining for various cryptocurrencies, including Bitcoin, Ethereum, Litecoin,
                    and more. Check our available contracts for the latest options.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                    <span class="num">4.</span>
                    What is the minimum investment required for cloud mining?
                  </button>
                </h3>
                <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    The minimum investment varies based on the type of mining contract. Explore our contract options to find one that suits your budget.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                    <span class="num">5.</span>
                    Is your platform secure?
                  </button>
                </h3>
                <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Yes, we prioritize the security of our platform. Our data centers are equipped with advanced security measures, and we employ industry best practices to protect user data and funds.
                  </div>
                </div>
              </div><!-- # Faq item-->

            </div>

          </div>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Recent Blog Posts Section ======= -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact</h2>
          <p>


            "Need assistance or have questions? Our dedicated support team is here for you. Contact us anytime, and let us guide you on your journey. Your success is our priority."</p>
        </div>

        <div class="row gx-lg-0 gy-4">

          <div class="col-lg-4">

            <div class="info-container d-flex flex-column align-items-center justify-content-center">
              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>Location:</h4>
                  <p>A108 Adam Street, Singapore, SY 238858</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4>Email:</h4>
                  <p>no-reply@cloudminers.online</p>
                </div>
              </div><!-- End Info Item -->

            
        
            </div>

          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="7" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <span>Cloud Miners</span>
          </a>

          <div class="social-links d-flex mt-4">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="terms.php">Terms of service</a></li>
            <li><a href="privacy.php">Privacy policy</a></li>
          </ul>
        </div>



        <div class="col-lg-3 col-6 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>
            A108 Adam Street <br>
            Singapore, SY 238858<br>
            Singapore <br>
           
            <strong>Email:</strong> no-reply@cloudminers.online<br>
          </p>

        </div>

      </div>
    </div>

    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Cloud Miners</span></strong>. All Rights Reserved
      </div>
      <div class="credits">

      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div> 

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>