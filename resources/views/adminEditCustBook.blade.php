<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Vidivox Studios Admin</title>

  @include("admin.css")
  
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include("admin.navbar")
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      @include("admin.setting")
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      
      <!-- partial -->

      <div class="main-panel" style="width: calc(100% - 2px);">
        <div class="content-wrapper">
          <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
                
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
                <div class = "float-left">
                  <a href ="/custbook" type="button" class="btn btn-warning btn-icon-text" style="background-color:#D8B237">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>                                                  
                          &nbsp Back
                    </a>
                </div>
                <h1 style="text-align:center;">Update Booking Form
                </h1> 
        </div>
        <div class="card">
                <div class="card-body">
                  <!-- <h4 class="card-title">Book Now!</h4> -->
                  <form class="forms-sample" action = "/update" method="post">
                    @csrf
                    <div class="form-group">
                      <label>Booking ID</label>
                      <input type="text" class="form-control" name= "booking_id" id="name" value="{{$bookings->id}}" placeholder="id" readonly>
                    </div>
                    <div class="form-group">
                      <label>Customer ID</label>
                      <input type="text" class="form-control" name= "user_id" id="name" value="{{$bookings->user_id}}" placeholder="id" readonly>
                    </div>
                    <div class="form-group">
                      <label>Customer Name</label>
                      <input type="text" class="form-control" name= "name"  value="{{$username->user_name}}" placeholder="Name" readonly>
                    </div>
                    <div class="form-group">
                      <label>Start Date and Time</label>
                      <input type="datetime-local" class="form-control" name= "startDateTime" value="{{$bookings->start_dateTime}}" id="startDateTime" placeholder="StartDate" required>
                    </div>
                    <div class="form-group">
                      <label>End Date and Time</label>
                      <input type="datetime-local" class="form-control" name= "endDateTime" id="endDateTime" value="{{$bookings->end_dateTime}}" placeholder="EndDate" required>
                    </div>
                    <div class="form-group">
                        <label>Choose Booking Type</label>
                        <select class="form-control" name="BookingType" id="selectId" onchange="togglePackagesSection();" required>
                            <!-- <option value="{{ $bookings->booked_type }}" selected></option> -->
                            <option value="Jamming" id="selectId" @if($bookings->booked_type == 'Jamming') selected @endif>Jamming</option>
                            <option value="Recording" id="selectId" @if($bookings->booked_type == 'Recording') selected @endif>Recording</option>
                            <option value="Music Class" id="selectId" @if($bookings->booked_type == 'Music Class') selected @endif>Music Class</option>
                        </select>
                    </div>

                    <div class="form-group" id="recording" @if($bookings->booked_type == 'Recording') style="display: block;" @else style="display: none;" @endif>
                        <label class="form-check-label">Choose Packages</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="package" value="Full Package" @if($bookings->booking_package == 'Full Package') checked @endif >
                                Full Package
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="package" value="Half Package" @if($bookings->booking_package == 'Half Package') checked @endif>
                                Half Package
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="package" value="Vocal or Voice Recorder Only" @if($bookings->booking_package == 'Vocal or Voice Recorder Only') checked @endif>
                                Vocal or Voice Recorder Only
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                    <label>Choose Room</label>
                        <select class="form-control" name="bookingRoom" id="studio" required>
                        @foreach($room as $display)
                            <option value="{{ $display->room_name }}" id="studio" @if($display->room_name == $bookings['booked_room']) selected @endif>{{ $display->room_name }}</option>
                        @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                      <label>Booking Notes</label>
                      <input type="text" class="form-control" name="notes" value="{{$bookings['booking_notes']}}" placeholder="Write your notes here"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Rent Equipment</label>
                      @php
                          $selectedEquip = explode(',', $bookings->rentEquip); // Split the string into an array
                      @endphp
                      @foreach($equip as $display)
                      <div class="form-check">
                          <input class="form-check-input" name="equip[]" type="checkbox" value="{{$display->equip_name}}" data-rent-price="{{$display->rent_price}}" id="flexCheckDefault" @if(in_array($display->equip_name, $selectedEquip)) checked @endif>
                          <label class="form-check-label" for="flexCheckDefault">
                              {{$display->equip_name}}
                          </label>
                      </div>
                      @endforeach
                    </div>


                    <label>File upload (PNG, JPG, JPEG, PDF only)</label>    
                                    <div class="form-group" x-data="{ fileName: '' }">
                                        <div class="input-group shadow">
                                        <span class="input-group-text px-3 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                                            <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                            <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"/>
                                            </svg>
                                        </span>
                                        <!-- <input type="file" x-ref="file" @change="fileName = $refs.file.files[0].name" name="file_path" accept=".png, .jpg, .jpeg, .pdf" class="d-none" x-init="fileName = '{{ session('fileName') ?? '' }}'" value="{{$bookings->name_file ?? ''}}"> -->
                                        <input type="text" class="form-control form-control-lg"  value="{{$bookings['file_path']}}" readonly>

                                        <button class="browse btn btn-warning px-4" type="button" x-on:click.prevent="$refs.file.click()">Browse</button>
                                        </div>
                                    </div>

                                    <br>
                    <button type="button" class="btn btn-dark" onclick="calculateTotalFee()">Calculate Total Fee</button>
                    <div class="form-group">
                            <label>Booking Fee</label>
                            <input type="text" class="form-control" id="bookingFeeDisplay" name = "bookingfee" value="" placeholder="RM0.00" readonly>
                    </div>
                    <div class="form-group">
                            <label>Total Fee (with Equipment)</label>
                            <input type="text" class="form-control" id="totalFeeDisplay" name = "totalfee" placeholder="RM0.00" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" style="background-color:#F0CF65;color:black;">Submit</button>
                    <!-- <button type="reset" class="btn btn-light">Reset</button> -->
                  </form>
                  
                </div>
              </div>
              <div>
        </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
        @include("admin.footer")
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
    <!-- Recording packages javascript and style -->
    <style>
        #recording {
            display: none;
          
        }
    </style>
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

          // Import the moment.js library
          // (Make sure you include the script tag for moment.js in your HTML file)
          const moment = window.moment;
          const totalFeeDisplay = document.getElementById("totalFeeDisplay");
          // Calculate the total fee
          var duration = moment.duration(endDateTime.diff(startDateTime));
          var hours = duration.asHours();
          var rate = 0;

          if (bookingType === "Jamming") {
            rate = 35;
          } else if (bookingType === "Recording") {
            rate = 0;
          } else if (bookingType === "Music Class") {
            rate = 100;
          }

          if (package === "Full Package") {
            rate += 5000/hours;
          } else if (package === "Half Package") {
            rate += 3500/hours;
          } else if (package === "Vocal or Voice Recorder Only") {
            rate += 50;
          }

          var total = rate * hours;

          // Set the value of the total fee label in the modal
          document.getElementById("totalfee").innerHTML = "RM" + total.toFixed(2);
          document.getElementById("totalFeeDisplay").textContent = "RM" + total.toFixed(2);
          // CalculateTotalFee(startDateTime, endDateTime, bookingType, package) 
          // console.log(total = rate * hours);
          
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
                // Reset the package selection to "-"
                var packageOptions = document.getElementsByName("package");
                for (var i = 0; i < packageOptions.length; i++) {
                    packageOptions[i].checked = false;
                }
            }

            
       }
        
       

         
    </script>
  @include("admin.js")
</body>

</html>

