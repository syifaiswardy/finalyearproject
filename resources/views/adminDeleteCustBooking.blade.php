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
                <h1 style="text-align:center;">Delete Booking Form
                </h1> 
        </div>
        <div class="card">
                <div class="card-body">
                  <!-- <h4 class="card-title">Book Now!</h4> -->
                  <form class="forms-sample" action = "{{ route('destroyCustBook', ['id' => $bookings->id]) }}" method="post" onsubmit="return confirmDelete()">
                  @csrf
                  @method('DELETE')
                    <div class="form-group">
                      <label>Booking ID</label>
                      <input type="text" class="form-control" name= "booking_id" id="name" value="{{$bookings->id}}" placeholder="id" readonly>
                    </div>
                    <div class="form-group">
                      <label>Customer ID</label>
                      <input type="text" class="form-control" name= "user_id" id="name" value="{{$bookings->user_id}}" placeholder="id" readonly>
                    </div>
                    <!-- <div class="form-group">
                      <label>Customer Name</label>
                      <input type="text" class="form-control" name= "name" id="name" value="{{$username->user_name}}" placeholder="Name" readonly>
                    </div> -->
                    <div class="form-group">
                      <label>Start Date and Time</label>
                      <input type="datetime-local" class="form-control" name= "startDateTime" value="{{$bookings->start_datetime}}" id="startDateTime" placeholder="StartDate" readonly>
                    </div>
                    <div class="form-group">
                      <label>End Date and Time</label>
                      <input type="datetime-local" class="form-control" name= "endDateTime" id="endDateTime" value="{{$bookings->end_datetime}}" placeholder="EndDate" readonly>
                    </div>
                    <div class="form-group">
                        <label>Choose Booking Type</label>
                        <select class="form-control" name="BookingType" id="selectId" onchange="togglePackagesSection();" readonly>
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
                                <input type="radio" class="form-check-input" name="package" value="Full Package" disabled @if($bookings->booking_package == 'Full Package') checked @endif >
                                Full Package
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="package" value="Half Package" disabled @if($bookings->booking_package == 'Half Package') checked @endif>
                                Half Package
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="package" value="Vocal or Voice Recorder Only" disabled @if($bookings->booking_package == 'Vocal or Voice Recorder Only') checked @endif>
                                Vocal or Voice Recorder Only
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                    <label>Choose Room</label>
                        <select class="form-control" name="bookingRoom" id="studio" readonly>
                        @foreach($room as $display)
                            <option value="{{ $display->room_name }}" id="studio" @if($display->room_name == $bookings['booked_room']) selected @endif>{{ $display->room_name }}</option>
                        @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                      <label>Booking Notes</label>
                      <input type="text" class="form-control" name="notes" value="{{$bookings['booking_notes']}}" placeholder="Write your notes here" readonly></textarea>
                    </div>
                    <div class="form-group">
                      <label>Rent Equipment</label>
                      @php
                          $selectedEquip = explode(',', $bookings->rentEquip); // Split the string into an array
                      @endphp
                      @foreach($equip as $display)
                      <div class="form-check">
                          <input class="form-check-input" name="equip[]" type="checkbox" value="{{$display->equip_name}}" disabled id="flexCheckDefault" @if(in_array($display->equip_name, $selectedEquip)) checked @endif>
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
                    <button type="submit" class="btn btn-danger mr-2 float-right">Delete</button>
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
  <script>
    function confirmDelete() {
      if (confirm("Are you sure you want to delete?")) {
        return true; // Proceed with form submission
      } else {
        return false; // Cancel form submission
      }
    }
  </script>
  @include("admin.js")
</body>

</html>

