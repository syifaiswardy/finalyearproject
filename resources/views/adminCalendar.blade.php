<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Vidivox Studios Admin</title>

  @include("admin.css")

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

  
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
              <div class="card">
                <div class="card-body">
                  <div class = "float-left">
                    <h4 class="card-title">Calendar</h4>
                    <div id="calendar"></div> 
                  </div>
                  
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
  <!-- container-scroller -->
  <script>
        $(document).ready(function() {
            var bookings = @json($events);
            console.log(bookings);
            $('#calendar').fullCalendar({
                header: {
                    'left': 'prev, next today',
                    'center': 'title',
                    'right': 'month, agendaWeek, agendaDay'
                },
                events: bookings
            });
        });
    </script>
  
    <!-- plugins:js -->
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{url('admin template/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{url('admin template/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{url('admin template/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{url('admin template/js/dataTables.select.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{url('admin template/js/off-canvas.js')}}"></script>
  <script src="{{url('admin template/js/hoverable-collapse.js')}}"></script>
  <script src="{{url('admin template/js/template.js')}}"></script>
  <script src="{{url('admin template/js/settings.js')}}"></script>
  <script src="{{url('admin template/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{url('admin template/js/dashboard.js')}}"></script>
  <script src="{{url('admin template/js/Chart.roundedBarCharts.js')}}"></script>
  <script src="{{url('admin template/js/chart.js')}}"></script>
</body>

</html>

