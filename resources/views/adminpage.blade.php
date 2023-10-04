<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Vidivox Studios Admin</title>

  

  @include("admin.css")
  <link rel="stylesheet" href="path-to/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
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
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold" style="font-size:150%;">Welcome {{$username}}</h3>
                  <h6 class="font-weight-normal mb-0">View your dashboard here!</h6>
                </div>
               
              </div>
            </div>
          </div>
          <div class="row">

            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent" >
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4" style="color:white;">Number of Customer Registered</p>
                      <p class="fs-30 mb-2"style="color:white;">{{$totalCustomers}} Customers</p>
                      <br>
                      @foreach($nama->shuffle() as $names)
                      <p class="mb-4" style="color:white;">{{ $names->name }} - {{ $names->bookings_count }} bookings</p>
                      @endforeach
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4" style="color:white;">Total Bookings</p>
                      <p class="fs-30 mb-2" style="color:white;">{{ $totalBookings }}</p>
                      <br>
                      <p class="mb-4" style="color:white;">Total Jamming Bookings</p>
                      <p class="fs-30 mb-2" style="color:white;">{{ $totalJammingBookings }}</p>
                      <br>
                      <p class="mb-4" style="color:white;">Total Recording Bookings</p>
                      <p class="fs-30 mb-2" style="color:white;">{{ $totalRecordingBookings }}</p>
                      <br>
                      <p class="mb-4" style="color:white;">Total Music Class Bookings</p>
                      <p class="fs-30 mb-2" style="color:white;">{{ $totalMusicClassBookings }}</p>
                    </div>
                  </div>
                </div>
                
              </div>
              
            </div>

            <div class="col-md-6 stretch-card grid-margin">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Top 5 Customers</p>
                  <div class="table-responsive">
                    <table class="table table-borderless">
                      <thead>
                        <tr>
                          <th class="pl-0 pb-2 border-bottom">Customer's name</th>
                          <th class="border-bottom pb-2">Total Booking</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($rankings as $ranking)
                          <tr>
                              <td class="pl-0 pb-2 border-bottom">{{ $ranking->name }}</td>
                              <td class="border-bottom pb-2">{{ $ranking->bookings_count }}</td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                  </div>

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
  



  @include("admin.js")
</body>

</html>

