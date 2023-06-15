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
    
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
 -->

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
            <div class="col align-self-center">
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
    
    <div class="modal fade" id="checkTotalFee" tabindex="-1" role="dialog" aria-labelledby="checkAvailableLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="checkAvailableLabel">Total Fee</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-sm">
                          <div class="form-group">
                            <label>Total Fee</label>
                            <input type="text" class="form-control" id="totalFee" placeholder="RM0.00" readonly>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
     </div>

                <!-- ***** Modal Check Availability Ends *****  -->
    
    <!-- ***** Calendar Area Starts ***** -->
    <section class="section" id = "menu">
      
        <div class = "container">
        <!-- form -->
        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @elseif (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    
        
        <div>

                <h1 style="text-align:center;">Book Form
                </h1> 
        </div>
        <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Book Now!</h4>
                  <form class="forms-sample" action = "/recorded" method="post">
                    @csrf
                    <div class="form-group">
                      <label>Start Date and Time</label>
                      <input type="datetime-local" class="form-control" name= "startDateTime" id="startDateTime" placeholder="StartDate" required>
                    </div>
                    <div class="form-group">
                      <label>End Date and Time</label>
                      <input type="datetime-local" class="form-control" name= "endDateTime" id="endDateTime" placeholder="EndDate" required>
                    </div>
                    <div class="form-group">
                      <label>Choose Booking Type </label>
                        <select class="form-control" name = "BookingType" id="selectId" onchange="togglePackagesSection();" required>
                          <option value="">Select option</option>
                          <option value="Jamming" >Jamming</option>
                          <option value="Recording">Recording</option>
                          <option value="Music Class">Music Class</option>
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
                          @foreach($value as $display)
                          <option value="{{$display['room_name']}}" id="studio">{{$display['room_name']}}</option>
                          @endforeach
                          <!-- <option value="Studio 2" id="studio">Studio 2</option>
                          <option value="Studio 3" id="studio">Studio 3</option> -->
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Booking Notes</label>
                      <textarea class="form-control" name="notes" placeholder="Write your notes here"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Rent Equipment (per hour)</label>
                      @foreach($equip as $display)
                        <div class="form-check">
                        <input class="form-check-input" name="equip[]" type="checkbox" value="{{$display->equip_name}}" data-rent-price="{{$display->rent_price}}" id="flexCheckDefault">
                          <label class="form-check-label" for="flexCheckDefault">
                            {{$display->equip_name}} - RM{{ $display->rent_price ? $display->rent_price : '0.00 (FREE)' }}
                          </label>
                        </div>
                      @endforeach
                    </div>

                    <br>
                    <button type="button" class="btn btn-dark" onclick="calculateTotalFee()">Calculate Total Fee</button>
                    <div class="form-group">
                            <label>Service Fee</label>
                            <input type="text" class="form-control" id="bookingFeeDisplay" name = "bookingfee" value="" placeholder="RM0.00" required>
                    </div>
                    <div class="form-group">
                            <label>Total Fee (with Equipment)</label>
                            <input type="text" class="form-control" id="totalFeeDisplay" name = "totalfee" placeholder="RM0.00" required>
                    </div>
                    <!-- <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        Add another date
                      </label>
                    </div> -->
                    <button type="submit" class="btn btn-primary mr-2" style="background-color:#F0CF65;color:black;">Submit</button>
                    <!-- <button type="button" class="btn btn-light" style="background-color:#F0CF65;color:black;" data-toggle="modal" data-target="#checkAvailable" onclick="checkAvailability()">Check Availability</button> -->
                    <button type="reset" class="btn btn-light">Reset</button>
                  </form>
                  
                </div>
              </div>
              <div>
        </div>
        <br>
        <div class="card">
          <div class="card-body">
            <h4 class="card-title" style="text-align:center;">List of Equipments provided</h4>
              <div class = "row">
                      <img src="assets/images/equipment.png" alt="equipment" style="width: 700px; height: auto; display: block; margin: 0 auto;">
               </div>
          </div>
        </div>
        
    </section>
    <!-- ***** Calendar Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    @include("customer.footer")
    <!-- ***** Footer End ***** -->

    <!-- fullCalendar Script 
    error cannot display data from database to calendar-->
    

    <!-- Recording packages javascript and style -->
      <style>
        #recording {
            display: none;
          
        }
    </style>
    <!-- <script>
    @if($errors->any())
        alert('{{ $errors->first() }}');
    @endif
    </script> -->

    <script>
      function calculateTotalFee() {
        var startDateTimeInput = document.getElementById("startDateTime");
        var endDateTimeInput = document.getElementById("endDateTime");

        var startDateTime = new Date(startDateTimeInput.value);
        var endDateTime = new Date(endDateTimeInput.value);

        var hours = Math.abs(endDateTime - startDateTime) / 36e5;

        var bookingType = document.getElementById("selectId").value;
        var package = document.querySelector('input[name="package"]:checked');
        var equipment = document.querySelectorAll('input[name="equip[]"]:checked');


        var rate = 0;

        // Calculate the rate based on the booking type
        if (bookingType == "Jamming") {
          rate = 35;
        } else if (bookingType == "Recording") {
          rate = 0;

          // Calculate the rate based on the package
          if (package) {
            package = package.value;
            if (package == "Full Package") {
              rate += 5000 / hours;
            } else if (package == "Half Package") {
              rate += 3500 / hours;
            } else if (package == "Vocal or Voice Recorder Only") {
              rate += 50;
            }
          }
        } else if (bookingType == "Music Class") {
          rate = 100;
        }

        

        var bookingFee = rate * hours;
        console.log("Total Fee: RM", bookingFee);
        var bookingFeeDisplay = document.getElementById("bookingFeeDisplay");
        bookingFeeDisplay.setAttribute('value', 'RM' + bookingFee.toFixed(2));

        var totalFee = bookingFee; // Assign the bookingFee value to totalFee

        // Calculate the rate based on the selected equipment
        if (equipment.length > 0) {
          equipment.forEach(function(item) {
            var equipmentPrice = item.dataset.rentPrice;
            if (equipmentPrice) {
              equipmentPrice = parseFloat(equipmentPrice);
            } else {
              equipmentPrice = 0;
            }
            totalFee += equipmentPrice; // Add the equipmentPrice to totalFee
          });
        }

        console.log("Total Fee: RM", totalFee);
        var totalFeeDisplay = document.getElementById("totalFeeDisplay");
        totalFeeDisplay.setAttribute('value', 'RM' + totalFee.toFixed(2));
        



      }
    </script>
        
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
          // Send an AJAX request to check availability
          const xhr = new XMLHttpRequest();
          xhr.open('GET', `/check-availability?startDateTime=${startDateTime.toISOString()}&endDateTime=${endDateTime.toISOString()}&studio=${studio}`);
          xhr.onload = () => {
            if (xhr.status === 200) {
              const response = JSON.parse(xhr.responseText);
              if (response.available) {
                availabilityLabel.textContent = 'Available';
                availabilityLabel.style.color = '#2C8334';
              } else {
                availabilityLabel.textContent = 'Not Available';
                availabilityLabel.style.color = '#FF0000';
              }
            } else {
              availabilityLabel.textContent = 'Error';
              availabilityLabel.style.color = '#FF0000';
            }
          }
          
      });
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

          // // Import the moment.js library
          // // (Make sure you include the script tag for moment.js in your HTML file)
          // const moment = window.moment;
          // const totalFeeDisplay = document.getElementById("totalFeeDisplay");
          // // Calculate the total fee
          // var duration = moment.duration(endDateTime.diff(startDateTime));
          // var hours = duration.asHours();
          // var rate = 0;

          // if (bookingType === "Jamming") {
          //   rate = 35;
          // } else if (bookingType === "Recording") {
          //   rate = 0;
          // } else if (bookingType === "Music Class") {
          //   rate = 100;
          // }

          // if (package === "Full Package") {
          //   rate += 5000/hours;
          // } else if (package === "Half Package") {
          //   rate += 3500/hours;
          // } else if (package === "Vocal or Voice Recorder Only") {
          //   rate += 50;
          // }

          // var total = rate * hours;

          // // Set the value of the total fee label in the modal
          // document.getElementById("totalfee").innerHTML = "RM" + total.toFixed(2);
          // document.getElementById("totalFeeDisplay").textContent = "RM" + total.toFixed(2);
          // // CalculateTotalFee(startDateTime, endDateTime, bookingType, package) 
          // // console.log(total = rate * hours);
          
      }
    

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

            
       }
        
       

        // Call calculateTotalFee() when startDateTime or endDateTime inputs change
        document.getElementById("startDateTime").addEventListener("input", calculateTotalFee);
        document.getElementById("endDateTime").addEventListener("input", calculateTotalFee);
    </script>
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