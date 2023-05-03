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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>



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
    <!-- ***** Modal Check Availability Starts *****  -->
    <script>
      function checkAvailability() {
        // Retrieve the values of the start date, end date, and studio inputs
        var startDate = new Date(document.getElementById("startDateTime").value);
        var endDate = new Date(document.getElementById("endDateTime").value);
        var studio = document.getElementById("studio").value;


        // Set the text of the corresponding labels in the modal to display these values
        document.getElementById("startDateLabel").innerHTML = startDate.toLocaleString('en-IN', {dateStyle: 'short', timeStyle: 'short'});
        document.getElementById("endDateLabel").innerHTML = endDate.toLocaleString('en-IN', {dateStyle: 'short', timeStyle: 'short'});
        document.getElementById("studioLabel").innerHTML = studio;


        // Get references to the label elements in the modal body
        const startDateLabel = document.querySelector('#startDateLabel');
        const endDateLabel = document.querySelector('#endDateLabel');
        const studioLabel = document.querySelector('#studioLabel');


        // Add an event listener to the "Check Availability" button
        const checkAvailabilityButton = document.querySelector('#checkAvailable button.btn-primary');
        checkAvailabilityButton.addEventListener('click', () => {
          // Get the values of the start date, end date, and studio from the form
          const startDateTime = new Date(document.querySelector('#startDateTime').value);
          const endDateTime = new Date(document.querySelector('#endDateTime').value);
          const studio = document.querySelector('#studio').value;

          // Set the values as the text content of the corresponding label elements in the modal body
          startDateLabel.textContent = `${startDateTime.toLocaleString('en-IN', {dateStyle: 'short', timeStyle: 'short'})}`;
          endDateLabel.textContent = `${endDateTime.toLocaleString('en-IN', {dateStyle: 'short', timeStyle: 'short'})}`;
          studioLabel.textContent = `${studio}`;

        });

      }

    </script>
    <div class="modal fade" id="checkAvailable" tabindex="-1" role="dialog" aria-labelledby="checkAvailableLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="checkAvailableLabel">Booking Availability</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-sm">
                          <label id="startDateLabel"></label>
                          <label id="endDateLabel"></label>
                        </div>
                        <div class="col-sm">
                          <label style="color:#2C8334;">Available</label>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-sm">
                          <label id="studioLabel"></label>
                        </div>
                        <div class="col-sm">
                          <label style="color:#2C8334;">Available</label>
                        </div>
                      </div>
                      <div>
                        <h5 class="modal-title" id="checkAvailableLabel">Other Booking Details</h5>
                        <br>
                          <label  style="font-weight:bold;">Booking Type</label><br>
                          <label id="bookingType"></label><br><br>
                          <label style="font-weight:bold;">Booking Packages</label><br>
                          <label id="package"></label><br><br>
                          <label style="font-weight:bold;">Total Fee</label><br>
                          <label id="totalfeeLabel"></label><br><br>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" style="background-color:#F0CF65;color:black;">Book</button>
                    </div>
                  </div>
                </div>
     </div>

                <!-- ***** Modal Check Availability Ends *****  -->
    
    <!-- ***** Calendar Area Starts ***** -->
    <section class="section" id = "menu">
      
        <div class = "container">
        <!-- form -->
        <div>
                <h1 style="text-align:center;">Book Form
                </h1> 
        </div>
        <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Book Now!</h4>
                  <form class="forms-sample" action = "" method="">
                    <div class="form-group">
                      <label>Start Date and Time</label>
                      <input type="datetime-local" class="form-control" id="startDateTime" placeholder="StartDate" required>
                    </div>
                    <div class="form-group">
                      <label>End Date and Time</label>
                      <input type="datetime-local" class="form-control" id="endDateTime" placeholder="EndDate" required>
                    </div>
                    <div class="form-group">
                      <label>Choose Booking Type </label>
                        <select class="form-control" name = "BookingType" id="selectId" onchange="togglePackagesSection();" required>
                          <option value="">Select option</option>
                          <option value="Jamming" id="selectId">Jamming</option>
                          <option value="Recording" id="selectId">Recording</option>
                          <option value="Music Class" id="selectId">Music Class</option>
                        </select>

                    </div>
                    <div class="form-group" id="recording">
                          <label class="form-check-label">Choose Packages</label>
                          <div class="form-check">
                            <label class="form-check-label" >
                              <input type="radio" class="form-check-input" name="package" value="Full Package">
                              Full Package
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label" >
                              <input type="radio" class="form-check-input" name="package" value="Half Package">
                              Half Package
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="package" value="Vocal or Voice Recorder Only">
                              Vocal or Voice Recorder Only
                            </label>
                          </div>
                        

                    </div>
                    <div class="form-group">
                    <label>Choose Room </label>
                      <select class="form-control" name="bookingRoom" id="studio" required>
                          <option value="Studio 1" id="studio">Studio 1</option>
                          <option value="Studio 2" id="studio">Studio 2</option>
                          <option value="Studio 3" id="studio">Studio 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Total Fee</label>
                      <input type="text" class="form-control" id="totalfee" placeholder="RM0.00" readonly>
                    </div>
                    <!-- <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        Add another date
                      </label>
                    </div> -->
                    <button type="button" class="btn btn-primary mr-2" style="background-color:#F0CF65;color:black;" data-toggle="modal" data-target="#checkAvailable" onclick="checkAvailability(),togglePackagesSection()">Check Availability</button>
                    <button type="reset" class="btn btn-light">Reset</button>
                  </form>
                </div>
              </div>
              <div>
                <br/><br/>
                <h1>Calendar
                </h1> 
                </div>

               
              <!-- fullcalendar -->
            <div id="calendar"></div> 
            
            
        </div>
        
    </section>
    <!-- ***** Calendar Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    @include("customer.footer")
    <!-- ***** Footer End ***** -->

    <!-- fullCalendar Script 
    error cannot display data from database to calendar-->
    <script>
        $(document).ready(function() {
            var test = @json($events);
            console.log(test)
            $('#calendar').fullCalendar({
                header:{
                    'left':'prev, next today',
                    'center' : 'title',
                    'right': 'month, agendaWeek, agendaDay'
                },
                // events : test,
                // selectable: true,
                // selectHelper: true,
                // select: function (start, end, allDays){
                //     // $('#startDate').val(start.format('DD-MM-YYYY'));
                //     // $('#endDate').val(end.format('DD-MM-YYYY'));
                //     $('#bookingModal').modal('toggle');
                // },       
                
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
      
            if (selectElement.value === "Recording") { // if "Recording" is selected
                packagesSection.style.display = "block"; // show the "Choose Packages" section
            }
            else if(selectElement.value === ""){
              alert("Please select an option");
            } 
            else {
                packagesSection.style.display = "none"; // hide the "Choose Packages" section
            }

            // Get the selected booking type
          var bookingType = document.getElementById("selectId").value;
          
          // Get the selected package
          var package = "";
          if (bookingType == "Recording") {
            var packageRadios = document.getElementsByName("package");
            for (var i = 0; i < packageRadios.length; i++) {
              if (packageRadios[i].checked) {
                package = packageRadios[i].value;
                break;
              }
            }
          }
          else{
            package = "<em>No package</em>";
          }
          
          // Set the values in the modal
          document.getElementById("bookingType").innerHTML = bookingType;
          document.getElementById("package").innerHTML = package;
       }
        
        
              
    </script>
    @include("customer.js")
  </body>
</html>