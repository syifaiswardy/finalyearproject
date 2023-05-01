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

    <!--fullcalendar cdn-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>


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
    <div id="bannerbooking">
            <div class="container">
            <div class="col-lg-6 align-self-center">
                    <div class="text-center">
                        <div class="section-heading"> 
                            <h2>Book with us now!</h2>
                        </div>
                      
                    </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->
    <!-- ***** Backline Instrument Starts ***** -->

    <!-- ***** Backline Instrument End ***** -->
    <!-- ***** Calendar Area Starts ***** -->
    <section class="section" id = "menu">
      
        <div class = "container">
            <div id="calendar"></div>      
        </div>
      
    </section>
    <!-- ***** Calendar Area Ends ***** -->
    <!-- ***** Modal Area Starts *****  -->
  <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Booking title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <label for="startDate">Start Date</label>
        <input type="text" class="form-control" id="startDate" name="startDate" readonly>
        <label for="endDate">End Date</label>
        <input type="text" class="form-control" id="endDate" name="endDate" readonly>


            <label for="exampleInputUsername1">Start Time</label>
            <input type="time" class="form-control" id="startTime" placeholder="StartTime">
          <span id="titleError" class="text-danger"></span>
            <label for="exampleInputUsername1">End Time</label>
            <input type="time" class="form-control" id="endDate" placeholder="EndTime">

            <div class="form-group">
                      <label for="exampleInputEmail1">Choose Booking Type </label>
                        <select class="form-control" name = "pageSelector" id="selectId" onchange="togglePackagesSection();">
                          <option value="">Select option</option>
                          <option value="0">Jamming</option>
                          <option value="1">Recording</option>
                          <option value="2">Music Class</option>
                        </select>

                    </div>
                    <div class="form-group" id="recording">
                          <label class="form-check-label">Choose Packages</label>
                          <div class="form-check">
                            <label class="form-check-label" >
                              <input type="radio" class="form-check-input" name="package" value="fullpackage">
                              Full Package
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label" >
                              <input type="radio" class="form-check-input" name="package" value="halfpackage">
                              Half Package
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="package" value="vocal">
                              Vocal or Voice Recorder Only
                            </label>
                          </div>
                      </div>

            
            <label for="exampleInputEmail1">Choose Room </label>
                      <select class="form-control" name="bookingRoom" id="exampleSelectGender">
                          <option value="">Studio 1</option>
                          <option value="">Studio 2</option>
                          <option value="">Studio 3</option>
                        </select>

                        <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Total Fee</label>
                      <input type="text" class="form-control" id="exampleInputConfirmPassword1" placeholder="RM0.00" readonly>
                    </div>
                    <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        Add another date
                      </label>
                    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="saveBtn" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>
    <!-- ***** Modal Area Ends *****  -->

    <!-- ***** Footer Start ***** -->
    @include("customer.footer")
    <!-- ***** Footer End ***** -->

    <!-- fullCalendar Script 
    error cannot display data from database to calendar-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var booking = @json($events);
            //console.log(booking)
            $('#calendar').fullCalendar({
                header:{
                    'left':'prev, next today',
                    'center' : 'title',
                    'right': 'month, agendaWeek, agendaDay'
                },
                events : booking,
                selectable: true,
                selectHelper: true,
                select: function (start, end, allDays){
                    $('#startDate').val(start.format('DD-MM-YYYY'));
                    $('#endDate').val(end.format('DD-MM-YYYY'));
                    $('#bookingModal').modal('toggle');
                }        
                
            })
        });
    </script>

    <!-- Recording packages javascript and style -->
      <style>
        #recording {
            display: none;
          
        }
    </style>
    <script>
      function togglePackagesSection() {
          var selectElement = document.getElementById("selectId");
          var packagesSection = document.getElementById("recording");
      
            if (selectElement.value === "1") { // if "Recording" is selected
                packagesSection.style.display = "block"; // show the "Choose Packages" section
            }
            else if(selectElement.value === ""){
              alert("Please select an option");
            } 
            else {
                packagesSection.style.display = "none"; // hide the "Choose Packages" section
            }
        }
    </script>
    @include("customer.js")
  </body>
</html>