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
    <div class="modal fade" id="QrCode" tabindex="-1" role="dialog" aria-labelledby="checkAvailableLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="checkAvailableLabel">Maybank QR Code</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="row-sm">
                          <label><em>xxxxxxx-xxxx-xxxxxx Maybank</em></label>
                          <img class ="rounded ms-auto d-block" src="{{url('assets/images/maybank-qr.jpeg')}}" alt ="Maybank QR Code"></img>
                        </div>
                    </div>
                    
                  </div>
                </div>
     </div>

    <section class="section" id="menu">
            <div class="container">
            @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @elseif (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                <div class="col-lg-12 grid-margin stretch-card">
                <div class = "float-left">
                  <a href ="/profile" type="button" class="btn btn-warning btn-icon-text" style="background-color:#D8B237">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>                                                  
                          &nbsp Back
                    </a>
                </div>
                

                    <div>
                        <h1 style="text-align:center;">Upload File
                        </h1> 
                    </div>
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title">Upload your payment receipt here</h4>
                        <form class="forms-sample" action="{{url('/update/'.$bookings->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                            <label style="font-weight:bold;">Payment can be made by <a style="color:red;">walk-in</a> or by <a style="color:blue;">online banking</a> to this account: </label><br>
                              <label><a href="" data-toggle="modal" data-target="#QrCode"><em>xxxxxxx-xxxx-xxxxxx Maybank</em></a></label><br><br>
                              <h6>After done with your payment, Upload your receipt here</h6>
                                <label>File upload (PNG, JPG, JPEG, PDF only)</label>    
                                    <div class="form-group" x-data="{ fileName: '' }">
                                        <div class="input-group shadow">
                                        <span class="input-group-text px-3 text-muted">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                                            <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                            <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"/>
                                            </svg>
                                        </span>
                                        <input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="file_path" accept=".png, .jpg, .jpeg, .pdf" class="d-none" x-init="fileName = '{{ session('fileName') ?? '' }}'" value="{{$bookings->name_file ?? ''}}">
                                        <input type="text" class="form-control form-control-lg" placeholder="Upload File" x-model="fileName" value="{{$bookings->name_file ?? ''}}" readonly>

                                        <button class="browse btn btn-warning px-4" type="button" x-on:click.prevent="$refs.file.click()">Browse</button>
                                        </div>
                                    </div>
                            </div>
                            @if(session('filePath'))
                                <div>
                                    <h3>Uploaded File:</h3>
                                    <a href="{{ session('$bookings->file_path') }}" target="_blank">Download File</a>
                                </div>
                            @endif
                            <br>
                            <h4 class="card-title">Booking details</h4>
                            <div class="form-group">
                            <label>Start Date and Time</label>
                            <input type="datetime-local" class="form-control" name= "startDateTime" id="startDateTime" value="{{$bookings->start_datetime}}" readonly>
                            </div>
                            <div class="form-group">
                            <label>End Date and Time</label>
                            <input type="datetime-local" class="form-control" name= "endDateTime" id="endDateTime" value="{{$bookings->end_datetime}}" readonly>
                            </div>
                            <div class="form-group">
                            <label>Booking Type </label>
                            <input type="text" class="form-control" name= "booktype" value="{{$bookings->booked_type}}" readonly>
                            </div>
                            <div class="form-group">
                            <label>Booking Package </label>
                            <input type="text" class="form-control" name= "bookpackage" value="{{$bookings->booking_package}}" readonly>
                            </div>                           
                            <div class="form-group">
                            <label>Room </label>
                            <input type="text" class="form-control" name= "bookroom" value="{{$bookings->booked_room}}" readonly>
                            </div>
                            <div class="form-group">
                            <label>Booking Notes</label>
                            <input type="text" class="form-control" name="notes" value="{{$bookings->booking_notes}}" readonly></input>
                            </div>
                            <div class="form-group">
                            <div class="form-group">
                            <label>Total Fee</label>
                            <input type="text" class="form-control" value="RM {{$bookings->total_payment}}" placeholder="RM0.00" readonly>
                            </div>
                            
                            <!-- <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Add another date
                            </label>
                            </div> -->
                            <button type="submit" class="btn btn-primary mr-2" style="background-color:#F0CF65;color:black;">Upload File</button>
                            <button type="reset" class="btn btn-light">Delete file</button>
                        </form>
                        
                        </div>
                    </div>
                    <div>
                    </div>

                </div>
                </div>
                </div>
        </section>
    

    <!-- ***** Footer Start ***** -->
    @include("customer.footer")
    <!-- ***** Footer End ***** -->

    <script src="{{url('assets/js/jquery-2.1.0.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{url('assets/js/popper.js')}}"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>

<!-- Plugins -->
<script src="{{url('assets/js/owl-carousel.js')}}"></script>
<script src="{{url('assets/js/accordions.js')}}"></script>
<script src="{{url('assets/js/datepicker.js')}}"></script>
<script src="{{url('assets/js/scrollreveal.min.js')}}"></script>
<script src="{{url('assets/js/waypoints.min.js')}}"></script>
<script src="{{url('assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{url('assets/js/imgfix.min.js')}}"></script> 
<script src="{{url('assets/js/slick.js')}}"></script> 
<script src="{{url('assets/js/lightbox.js')}}"></script> 
<script src="{{url('assets/js/isotope.js')}}"></script> 

<!-- Global Init -->
<script src="{{url('assets/js/custom.js')}}"></script>


  </body>
</html>