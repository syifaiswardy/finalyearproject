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
    @include("customer.css")
    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <!-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>   -->
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    @include("customer.navbar")
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    
    <!-- ***** Main Banner Area End ***** -->
    <!-- ***** Calendar Area Starts ***** -->
    <section class="section" id="menu">
        <div class="container">
            <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <h1>Hello, {{$user_name}}!</h1>
                <div>&nbsp</div>
            @if($list->isEmpty())
                        <a>&nbsp</a><br><br>
                        <a>&nbsp</a><br><br>
                        <a>&nbsp</a><br><br>
                        <a>&nbsp</a><br><br>
                        <h6 style="text-align:center;">There's no booking recorded</h6>
                        <div class="d-grid gap-2 col-6 mx-auto text-center">
                        <a href="/bookform" class="btn btn-primary" style="background-color:#F0CF65;color:black;" type="button">Click here to book!</a>
                        </div>
                        <a>&nbsp</a><br><br>
                        <a>&nbsp</a><br><br>
                        <a>&nbsp</a><br><br>
                        <a>&nbsp</a><br><br>
                        @else
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Booking Details</h4>
                  <div class="table-responsive">
                    
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Start DateTime</th>
                          <th>End DateTime</th>
                          <th>Booking Type</th>
                          <th>Booking Packages</th>
                          <th>Booking Notes</th>
                          <th>Equipment Rented</th>
                          <th>Total Fee</th>
                          <th>Payment</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($list as $display)
                        <tr>
                          <td>{{$display['start_datetime']}}</td>
                          <td>{{$display['end_datetime']}}</td>
                          <td>{{$display['booked_type']}}</td>
                          @if($display['booking_package']==null)
                          <td>No package</td>
                          @else
                          <td>{{$display['booking_package']}}</td>
                          @endif
                          <td>{{$display['booking_notes']}}</td>
                          <td>{{$display['rentEquip']}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            </div>
        </div>
    </section>
    <!-- ***** Calendar Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    @include("customer.footer")
    <!-- ***** Footer End ***** -->

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


  </body>
</html>