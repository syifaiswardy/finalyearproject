<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Vidivox Studios</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    
    
    <!-- Additional CSS Files -->

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    
    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">
    
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    
    <link rel="stylesheet" href="assets/css/lightbox.css">
    
    <style>
        a{
            color:#D8B237; 
        }
        a:hover{
            color:black;
        }
    </style>

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    @include("customer.navbar")
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div id="banner">
            <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <!-- <h6>Contact Us</h6>
                            <h2>Here You Can Make A Reservation Or Just walkin to our cafe</h2> -->
                        </div>
                        <!-- <p>Donec pretium est orci, non vulputate arcu hendrerit a. Fusce a eleifend riqsie, namei sollicitudin urna diam, sed commodo purus porta ut.</p> -->
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- <div class="phone">
                                    <i class="fa fa-phone"></i>
                                    <h4>Phone Numbers</h4>
                                    <span><a href="#">080-090-0990</a><br><a href="#">080-090-0880</a></span>
                                </div> -->
                            </div>
                            <div class="col-lg-6">
                                <!-- <div class="message">
                                    <i class="fa fa-envelope"></i>
                                    <h4>Emails</h4>
                                    <span><a href="#">hello@company.com</a><br><a href="#">info@company.com</a></span>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- <div class="contact-form">
                        <form id="contact" action="" method="post">
                          <div class="row">
                            <div class="col-lg-12">
                                <h4>Table Reservation</h4>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Your Name*" required="">
                              </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <fieldset>
                              <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
                            </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <fieldset>
                                <input name="phone" type="text" id="phone" placeholder="Phone Number*" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <select value="number-guests" name="number-guests" id="number-guests">
                                    <option value="number-guests">Number Of Guests</option>
                                    <option name="1" id="1">1</option>
                                    <option name="2" id="2">2</option>
                                    <option name="3" id="3">3</option>
                                    <option name="4" id="4">4</option>
                                    <option name="5" id="5">5</option>
                                    <option name="6" id="6">6</option>
                                    <option name="7" id="7">7</option>
                                    <option name="8" id="8">8</option>
                                    <option name="9" id="9">9</option>
                                    <option name="10" id="10">10</option>
                                    <option name="11" id="11">11</option>
                                    <option name="12" id="12">12</option>
                                </select>
                              </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <div id="filterDate2">    
                                  <div class="input-group date" data-date-format="dd/mm/yyyy">
                                    <input  name="date" id="date" type="text" class="form-control" placeholder="dd/mm/yyyy">
                                    <div class="input-group-addon" >
                                      <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                  </div>
                                </div>   
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <select value="time" name="time" id="time">
                                    <option value="time">Time</option>
                                    <option name="Breakfast" id="Breakfast">Breakfast</option>
                                    <option name="Lunch" id="Lunch">Lunch</option>
                                    <option name="Dinner" id="Dinner">Dinner</option>
                                </select>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button-icon">Make A Reservation</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->
    <!-- ***** Booking Area Starts ***** -->

     <!-- ***** Jamming Modal Area Starts ***** -->
    <div class="modal fade" id="Jamming" tabindex="-1" role="dialog" aria-labelledby="checkAvailableLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="checkAvailableLabel">Jamming Services</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <label  style="font-weight:bold; font-size:20px;">Jam here with your friends, family or bandmates!</label><br>
                      <div class="row">
                        <div class="col-sm">
                            <img src="assets/images/jamming2.jpg" alt="jamming" style="width: 450px; height: auto;">
                        </div>
                      </div>
                      <br>
                      <div class = "row">
                        <div class="col-sm">
                            <img src="assets/images/jamming3.jpg" alt="jamming" style="width: 450px; height: auto;">
                        </div>
                      </div>
                      <br>

                      <label  style="font-weight:bold; font-size:20px;">Booking Price:</label><br>
                      <label style="color:#;">RM 35/hour</label><br>
                      <a href= "/bookform" type="button" class="btn btn-warning">Book Now!</a>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
     </div>
          <!-- ***** Jamming Modal Area End ***** -->

               <!-- ***** Recording Modal Area Starts ***** -->
    <div class="modal fade" id="Recording" tabindex="-1" role="dialog" aria-labelledby="checkAvailableLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="checkAvailableLabel">Recording Services</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <label  style="font-weight:bold; font-size:20px;">Record your songs or voiceover here!</label><br>
                      <div class="row">
                        <div class="col-sm thumb">
                            <img src="assets/images/recording2.jpg" alt="recording" style="width: 450px; height: auto;">
                        </div>
                      </div>
                      <br>
                      <div class = "row">
                        <div class="col-sm thumb">
                            <img src="assets/images/recording3.jpg" alt="recording" style="width: 450px; height: auto;">
                        </div>
                      </div>
                      <br>

                      <label  style="font-weight:bold; font-size:20px;">Booking Price:</label><br>

                      <label  style="font-weight:bold; font-size:17px;">Full Package</label><br>
                      <label  style="font-size:15px;">Lyrics, arrangements, mixing and mastering are provided</label><br>
                      <label style="color:#;">RM 5000</label><br><br>

                      <label  style="font-weight:bold; font-size:17px;">Half Package</label><br>
                      <label  style="font-size:15px;">Only arrangements, mixing and mastering are provided</label><br>
                      <label style="color:#;">RM 3500</label><br><br>

                      <label  style="font-weight:bold; font-size:17px;">Vocal or Voiceover only</label><br>
                      <label  style="font-size:15px;">Record vocal for singers or any voiceover</label><br>
                      <label style="color:#;">RM 50/hour</label><br><br>

                      <a href= "/bookform" type="button" class="btn btn-warning">Book Now!</a>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
     </div>
          <!-- ***** Recording Modal Area End ***** -->

          <!-- ***** Music Class Modal Area Starts ***** -->
    <div class="modal fade" id="MusicClass" tabindex="-1" role="dialog" aria-labelledby="checkAvailableLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="checkAvailableLabel">Music Class Services</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <label  style="font-weight:bold; font-size:20px;">Register here for music classes!</label><br>
                      <div class="row">
                        <div class="col-sm thumb">
                            <img src="assets/images/music-class2.jpg" alt="music class" style="width: 450px; height: auto;">
                        </div>
                      </div>
                      <br>
                      <div class = "row">
                        <div class="col-sm thumb">
                            <img src="assets/images/music-class3.jpg" alt="music class" style="width: 450px; height: auto;">
                        </div>
                      </div>
                      <br>

                      <label  style="font-weight:bold; font-size:20px;">Booking Price:</label><br>
                      <label style="color:#;">RM 50/hour</label><br>
                      <a href= "/bookform" type="button" class="btn btn-warning">Book Now!</a>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
     </div>
          <!-- ***** Music Class Modal Area End ***** -->

    <section class="section" id="chefs">
        <div class="container">
            <!-- <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Our Chefs</h6>
                        <h2>We offer the best ingredients for you</h2>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="chef-item">
                        <div class="thumb">
                            <div class="overlay"></div>
                            <!-- <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul> -->
                            <img src="assets/images/jamming.jpg" alt="jamming">
                        </div>
                        <div class="down-content">
                            <h4>
                                <a href = "" data-toggle="modal" data-target="#Jamming">Jamming Session</a>
                            </h4>
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="chef-item">
                        <div class="thumb">
                            <div class="overlay"></div>
                            <!-- <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul> -->
                            <!-- <button class="button">Book now</button> -->
                            <img src="assets/images/recording.jpg" alt="recording">
                        </div>
                        <div class="down-content">
                            <h4>
                            <a href = "" data-toggle="modal" data-target="#Recording">Recording Session</a>
                            </h4>
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="chef-item">
                        <div class="thumb">
                            <div class="overlay"></div>
                            <!-- <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                            </ul> -->
                            <img src="assets/images/music-class.jpg" alt="music class">
                        </div>
                        <div class="down-content">
                            <h4>
                            <a href = "" data-toggle="modal" data-target="#MusicClass">Music Class Session</a>
                            </h4>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Booking Area Ends ***** -->
    
    <!-- ***** Booking Area Starts ***** -->
    <!-- <section class="section" id="menu">
    <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>Our Menu</h6>
                        <h2>Our Studio Services</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item-carousel">
            <div class="col-lg-12">
                <div class="owl-menu-item owl-carousel">
                    <div class="item">
                        <div class='card card1'>
                            <div class="price"><h6>$14</h6></div>
                            <div class='info'>
                              <h1 class='title'>Jamming</h1>
                              <p class='description'>A place where to jam with your bandmates or friends!<br><em>Rate: RM35/hour</em></p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="/booking">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class='card card2'>
                            <div class="price"><h6>$22</h6></div>
                            <div class='info'>
                              <h1 class='title'>Recording</h1>
                              <p class='description' style="padding: 30px 40px -8px 30px;">Record your original songs here! <br>
                              Package provided:<br>
                              Full Package: <em>Lyrics, arrangements, mixing and mastering are provided</em> - RM 5000<br>
                              Half Package: 
                            </p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class='card card3'>
                            <div class="price"><h6>$18</h6></div>
                            <div class='info'>
                              <h1 class='title'>Music Class</h1>
                              <p class='description'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedii do eiusmod teme.</p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>

    </div>
    </section> -->
    <!-- ***** Booking display Area Ends ***** -->

    <!-- ***** Offers Area Starts ***** -->
    <section class="section" id="offers">
        <div class="container">
        <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
        <div class="elfsight-app-2bc11edb-3e30-4db4-bf7c-923b3e6f0352"></div>
        
        </div>
    </section>
    <!-- ***** Offers Area Ends ***** --> 

    

    
    <!-- ***** About Area Starts ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="">
                        <div class="section-heading">
                            <h6>About Us</h6>
                            <h2>A Music Studio in Bukit Mahkota, Bangi</h2>
                        </div>
                        <p>Vidivox Studios - exclusive, acoustic and spacious. Special design for professional and amateur band and singers.</p>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15939.073838668859!2d101.7944604!3d2.8830129!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdc8ac345a1b0b%3A0xe2b185fa21844962!2sVidiVox%20Studios!5e0!3m2!1sen!2smy!4v1676486396627!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                                <!-- <img src="assets/images/about-thumb-02.jpg" alt=""> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-content">
                        <div class="thumb">
                            <a rel="nofollow" href="http://youtube.com"><i class="fa fa-play"></i></a>
                            <img src="assets/images/about-video-bg.jpg" alt="">
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->
    
    
    <!-- ***** Footer Start ***** -->
    @include("customer.footer")
    <!-- ***** Footer End ***** -->
    
    <!-- jQuery -->
<script src="assets/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/accordions.js"></script>
<script src="assets/js/datepicker.js"></script>
<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script> 
<script src="assets/js/slick.js"></script> 
<script src="assets/js/lightbox.js"></script> 
<script src="assets/js/isotope.js"></script> 

<!-- Global Init -->
<script src="assets/js/custom.js"></script>
<script>

    $(function() {
        var selectedClass = "";
        $("p").click(function(){
        selectedClass = $(this).attr("data-rel");
        $("#portfolio").fadeTo(50, 0.1);
            $("#portfolio div").not("."+selectedClass).fadeOut();
        setTimeout(function() {
          $("."+selectedClass).fadeIn();
          $("#portfolio").fadeTo(50, 1);
        }, 500);
            
        });
    });

</script>
  </body>
</html>