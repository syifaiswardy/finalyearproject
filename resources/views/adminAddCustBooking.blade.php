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
      @include("admin.sidebar")
      <!-- partial -->

      <div class="main-panel">
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
                <h1 style="text-align:center;">Book Form
                </h1> 
        </div>
        <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Book Now!</h4>
                  <form class="forms-sample" action = "/recordedAdmin" method="post">
                    @csrf
                    <div class="form-group">
                      <label>Choose Customer</label>
                      <select class="form-control" name="customer" id="cust" required>
                          @foreach($user as $display)
                          @if ($display['usertype']== 0)
                          <option value="{{$display['name']}}" id="cust">{{$display['name']}}</option>
                          @endif
                          @endforeach
                      </select>
                    </div>
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
                      <label>Rent Equipment</label>
                      @foreach($equip as $display)
                        <div class="form-check">
                          <input class="form-check-input" name="equip[]" type="checkbox" value="{{$display['equip_name']}}" id="flexCheckDefault">
                          <label class="form-check-label" for="flexCheckDefault">
                          {{$display['equip_name']}}
                          </label>
                        </div>
                      @endforeach
                    </div>
                    <!-- <div class="form-group">
                      <label>Total Fee</label>
                      <input type="text" class="form-control" id="totalFeeDisplay" placeholder="RM0.00" readonly>
                    </div> -->
                    <!-- <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        Add another date
                      </label>
                    </div> -->
                    <button type="submit" class="btn btn-primary mr-2" style="background-color:#F0CF65;color:black;">Submit</button>
                    <button type="reset" class="btn btn-light">Reset</button>
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
    <!-- <script>
    @if($errors->any())
        alert('{{ $errors->first() }}');
    @endif
    </script> -->

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
            }

            
       }
        
       

         
    </script>
  @include("admin.js")
</body>

</html>

