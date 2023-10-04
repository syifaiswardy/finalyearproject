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

    <!-- ***** Modal Check Availability Starts *****  -->
    
    <div class="modal fade" id="uploadFile" tabindex="-1" role="dialog" aria-labelledby="checkAvailableLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="checkAvailableLabel">Payment Details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                      <form class="forms-sample" action = "/uploadfile" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="row-sm">
                              <label style="font-weight:bold;">Payment can be made by <a style="color:red;">walk-in</a> or by <a style="color:blue;">online banking</a> to this account: </label><br>
                              <label><a href="" data-toggle="modal" data-target="#QrCode"><em>xxxxxxx-xxxx-xxxxxx Maybank</em></a></label><br><br>
                              <h6>After done with your payment, Upload your receipt here</h6>
                            </div>
                            <div class="row-sm">
                                  <div class="form-group">
                                    <input type="file" id="myFile" name="filename">
                                  </div>
                            </div>
                        </div>
                        <div class="modal-footer d-grid gap-2">
                          <button type="submit" class="btn btn-primary" style="background-color:#F0CF65;color:black;">Upload File</button>
                        </div>
                      </form>
                    </div>
                </div>
     </div>

     

                <!-- ***** Modal Check Availability Ends *****  -->
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
                  <h4 class="card-title">Booking History</h4>
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
                          <td>{{$display['start_dateTime']}}</td>
                          <td>{{$display['end_dateTime']}}</td>
                          @if($display['booked_type']=='Recording')
                            <td class="badge badge-danger badge-sm badge-pill">{{$display['booked_type']}}</td>
                          @elseif($display['booked_type']=='Jamming')
                            <td class="badge badge-info badge-sm badge-pill">{{$display['booked_type']}}</td>
                          @else
                            <td class="badge badge-success badge-sm badge-pill">{{$display['booked_type']}}</td>
                          @endif

                          @if(empty($display['booking_package']))
                          <td style="color:#grey;">-</td>
                          @elseif($display['booking_package']=='Full Package')
                            <td style="color:#E79F5D;font-weight:bold;">{{$display['booking_package']}}</td>
                          @elseif($display['booking_package']=='Half Package')
                            <td style="color:#E75D5D;font-weight:bold;">{{$display['booking_package']}}</td>
                          @else
                            <td style="color:#E7C15E;font-weight:bold;">{{$display['booking_package']}}</td>
                          @endif
                          
                          @if(empty($display['booking_notes']))
                          <td><em>No Notes</em></td>
                          @else
                          <td>{{$display['booking_notes']}}</td>
                          @endif

                          @if(empty($display['rentEquip']))
                          <td><em>No Equipment needed</em></td>
                          @else
                          <td>{{$display['rentEquip']}}</td>    
                          @endif
                          <td> RM {{$display['total_payment']}} </td>
                          <td>
                            <a href={{"upload/".$display['id']}} data-toggle="" data-target="">
                              <img src="assets/images/upload-file-icon.png"></img>
                            </a>
                          </td>
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