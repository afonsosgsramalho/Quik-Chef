<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>QuikChef</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/953a4737fa.js" crossorigin="anonymous"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Questrial|Ubuntu&display=swap" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body id="page-top">  

  <!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="#page-top">QuikChef</a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#home">home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#about">about</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#service">services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" id="signup" data-toggle="modal" data-target="#signupModal">sign up</a>

            <!-- Modal -->
            <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalTitle"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="signupModalLongTitle">Sign Up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="register.php" method="POST">
                      <div id="sendmessage">You are now signed up.</div>
                      <div id="errormessage"></div>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <div class="form-group">
                            <p>Username</p>
                            <input type="text" name="username" class="form-control" id="name" placeholder="Username"
                              data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <div class="form-group">
                            <p>Password</p>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                              data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <div class="form-group">
                            <p>First Name</p>
                            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Your first name"
                              data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <div class="form-group">
                            <p>Last Name</p>
                            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Your last name"
                              data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <p>E-mail</p>
                          <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                              data-rule="email" data-msg="Please enter a valid email" required>
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <p>Genre</p>
                            <input type="text" name="sexo" class="form-control" id="name" placeholder="Male(M), Female(F), Non Specified(N)"
                              data-rule="maxlen:1" data-msg="Please enter just 1 char" required>
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <p>Date</p>
                            <input type="text" name="birth" class="form-control" id="name" placeholder="year/month/date"
                              data-rule="maxlen:1" data-msg="Please enter just 1 char"required>
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <div class="form-group">
                            <p>Country</p>
                            <input type="text" name="country" class="form-control" id="country" placeholder="Your Country"
                              data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <div class="form-group">
                            <p>District</p>
                            <input type="text" name="district" class="form-control" id="district" placeholder="Your District"
                              data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <div class="form-group">
                            <p>County</p>
                            <input type="text" name="county" class="form-control" id="country" placeholder="Your County"
                              data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <p>Address</p>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Your address"
                              data-rule="email" data-msg="Please enter a valid email" required>
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <div class="form-group">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="vendor" id="vendor" value="vendor">
                              <label class="form-check-label" for="inlineRadio2">Vendor</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <div class="form-group">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="consumer" id="consumer" value="consumer">
                              <label class="form-check-label" for="inlineRadio2">Consumer</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="signup_button" class="btn button-a">Sign Up</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" id="signin" data-toggle="modal" data-target="#signinModal">sign in</a>

            <!-- Modal -->
            <div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="signinModalTitle"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="signinModalLongTitle">Sign In</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="login.php" method="POST">
                      <div id="sendmessage">You are now signed in.</div>
                      <div id="errormessage"></div>
                      <div class="row">
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <p>Username</p>
                            <input type="text" name="username" class="form-control" id="name" placeholder="Username" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <p>Password</p>
                            <input type="password" class="form-control" name="password" id="subject" placeholder="Password" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                            <div class="validation"></div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="signin_button" class="btn button-a">Sign In</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link js-scroll" href="sell.php">sell and publish</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="buy.php">buy</a>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->

  <!--/ Intro Skew Star /-->
  <div id="home" class="intro route bg-image">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <h1 class="intro-title mb-4">QuikChef</h1>
          <p class="intro-subtitle"><span class="text-slider-items">Order,Sell,Deliver,Eat it!</span><strong
              class="text-slider"></strong></p>
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->

  <!--/ Section Services Star /-->
  <section id="service" class="services-mf route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <h3 class="title-a">
              Services
            </h3>
            <p class="subtitle-a">
              Our services to you. Enjoy!
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="service-box">
            <div class="service-ico">
              <span class="ico-circle"><i class="fas fa-mobile"></i></span>
            </div>
            <div class="service-content">
              <h2 class="s-title">Order</h2>
              <p class="s-description text-center">
                Order online or through our app your favorite homemade food.
                <br>
                It's Quik and Simple.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-box">
            <div class="service-ico">
              <span class="ico-circle"><i class="fas fa-dollar-sign"></i></span>
            </div>
            <div class="service-content">
              <h2 class="s-title">Sell</h2>
              <p class="s-description text-center">
                You also can sell the meals that you cook, so you can make your own money.
                <br>
                Quik Money.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-box">
            <div class="service-ico">
              <span class="ico-circle"><i class="fas fa-motorcycle"></i></span>
            </div>
            <div class="service-content">
              <h2 class="s-title">Deliver</h2>
              <p class="s-description text-center">
                Our excellence delivery service guarantees that all your food is deliver on time.
                <br>
                The Quikest way.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Section Services End /-->

  <div class="section-counter paralax-mf bg-image" style="background-image: url(img/counters-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-checkmark-round"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">10894</p>
              <span class="counter-text">DELIVERS COMPLETED</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-ios-calendar-outline"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">10</p>
              <span class="counter-text">YEARS OF EXPERIENCE</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-ios-people"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">8012</p>
              <span class="counter-text">TOTAL CLIENTS</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-ribbon-a"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">67</p>
              <span class="counter-text">AWARD WON</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!--/ Intro Skew End /-->

    <section id="about" class="about-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              About us
            </h3>
            <p class="subtitle-a">
              Our History, Our Mission, Our Brand.
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="box-shadow-full">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-sm-6 col-md-5">
                  </div>
                </div>
                <div class="skill-mf">
                  <p class="title-s">Customer's Satisfation</p>
                  <span>Overall</span> <span class="pull-right">85%</span>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span>Customer Support</span> <span class="pull-right">75%</span>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                      aria-valuemax="100"></div>
                  </div>
                  <span>Tax Fee</span> <span class="pull-right">50%</span>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                      aria-valuemax="100"></div>
                  </div>
                  <span>Delivery Time</span> <span class="pull-right">90%</span>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0"
                      aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="about-me pt-4 pt-md-0">
                  <p class="title-s"></p>
                  <br>
                  <p class="lead">
                    Our brand cares for bringing the best possible service to our customers, trying everyday to improve
                    our services, focusing on increasing the quality of them and reducing the costs to the customer.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--/ Section Testimonials Star /-->
  <div class="testimonials paralax-mf bg-image" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="testimonial-mf" class="owl-carousel owl-theme">
            <div class="testimonial-box">
              <div class="author-test">
                <img src="img/testimonial-2.jpg" alt="" class="rounded-circle b-shadow-a">
                <span class="author">Xavi Alonso</span>
              </div>
              <div class="content-test">
                <p class="description lead">
                  Um dos melhores serviços de entrega, nunca comida caseira soube tão bem!
                </p>
                <span class="comit"><i class="fa fa-quote-right"></i></span>
              </div>
            </div>
            <div class="testimonial-box">
              <div class="author-test">
                <img src="img/testimonial-4.jpg" alt="" class="rounded-circle b-shadow-a">
                <span class="author">Marta Socrate</span>
              </div>
              <div class="content-test">
                <p class="description lead">
                  Simplesmente incrível, adorei a rapidez e a eficácia. 5 estrelas!
                </p>
                <span class="comit"><i class="fa fa-quote-right"></i></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--/ Section Blog Star /-->
  <section id="blog" class="blog-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Blog
            </h3>
            <p class="subtitle-a">
              Some blog posts about our services, favourite foods and many more!
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card card-blog">
            <div class="card-img">
              <a href="blog-single.html"><img src="img/post-1.jpg" alt="" class="img-fluid"></a>
            </div>
            <div class="card-body">
              <div class="card-category-box">
                <div class="card-category">
                  <h6 class="category">Travel</h6>
                </div>
              </div>
              <h3 class="card-title"><a href="blog-single.html">See more ideas about Travel</a></h3>
              <p class="card-description">
                Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis
                a pellentesque nec,
                egestas non nisi.
              </p>
            </div>
            <div class="card-footer">
              <div class="post-author">
                <a href="#">
                  <img src="img/testimonial-2.jpg" alt="" class="avatar rounded-circle">
                  <span class="author">Jorge Mendes</span>
                </a>
              </div>
              <div class="post-date">
                <span class="ion-ios-clock-outline"></span> 10 min
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-blog">
            <div class="card-img">
              <a href="blog-single.html"><img src="img/post-2.jpg" alt="" class="img-fluid"></a>
            </div>
            <div class="card-body">
              <div class="card-category-box">
                <div class="card-category">
                  <h6 class="category">Web Design</h6>
                </div>
              </div>
              <h3 class="card-title"><a href="blog-single.html">See more ideas about Travel</a></h3>
              <p class="card-description">
                Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis
                a pellentesque nec,
                egestas non nisi.
              </p>
            </div>
            <div class="card-footer">
              <div class="post-author">
                <a href="#">
                  <img src="img/testimonial-2.jpg" alt="" class="avatar rounded-circle">
                  <span class="author">Ricardo Fazeres</span>
                </a>
              </div>
              <div class="post-date">
                <span class="ion-ios-clock-outline"></span> 1 week
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-blog">
            <div class="card-img">
              <a href="blog-single.html"><img src="img/post-3.jpg" alt="" class="img-fluid"></a>
            </div>
            <div class="card-body">
              <div class="card-category-box">
                <div class="card-category">
                  <h6 class="category">Web Design</h6>
                </div>
              </div>
              <h3 class="card-title"><a href="blog-single.html">See more ideas about Travel</a></h3>
              <p class="card-description">
                Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis
                a pellentesque nec,
                egestas non nisi.
              </p>
            </div>
            <div class="card-footer">
              <div class="post-author">
                <a href="#">
                  <img src="img/testimonial-2.jpg" alt="" class="avatar rounded-circle">
                  <span class="author">Rafael Augusto</span>
                </a>
              </div>
              <div class="post-date">
                <span class="ion-ios-clock-outline"></span> 1 month
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Section Blog End /-->

  <!--/ Section Contact-Footer Star /-->
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="contact-mf">
            <div id="contact" class="box-shadow-full">
              <div class="row">
                <div class="col-md-6">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      Send Message To Us
                    </h5>
                  </div>
                  <div>
                    <form action="" method="post" role="form" class="contactForm">
                      <div id="sendmessage">Your message has been sent. Thank you!</div>
                      <div id="errormessage"></div>
                      <div class="row">
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                              data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                              data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                              data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required"
                              data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <button type="submit" class="button button-a button-big button-rouded">Send Message</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="title-box-2 pt-4 pt-md-0">
                    <h5 class="title-left">
                      Get in Touch
                    </h5>
                  </div>
                  <div class="more-info">
                    <p class="lead">
                      Queres te juntar à nossa equipa de desenvolvimento e contribuir para melhorar os nossos serviços?
                      Dá-nos um toque através dos contactos aqui em baixo ou então dá um salto na nossa sede!
                    </p>
                    <ul class="list-ico">
                      <li><span class="ion-ios-location"></span> 1250 Princípe Real, Lisboa</li>
                      <li><span class="ion-ios-telephone"></span> (+351) 993-557-0089</li>
                      <li><span class="ion-email"></span> contact@example.com</li>
                    </ul>
                  </div>
                  <div class="socials">
                    <ul>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-facebook"></i></span></a></li>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-instagram"></i></span></a></li>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-twitter"></i></span></a></li>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-pinterest"></i></span></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="copyright-box">
              <p class="copyright">&copy; Copyright <strong>DevFolio</strong>. All Rights Reserved</p>
              <div class="credits">
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=DevFolio
                -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </section>
  <!--/ Section Contact-footer End /-->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/counterup/jquery.waypoints.min.js"></script>
  <script src="lib/counterup/jquery.counterup.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/typed/typed.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>

</html>
