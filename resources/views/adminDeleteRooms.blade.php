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
        

        <div>
                <div class = "float-left">
                  <a href ="/room" type="button" class="btn btn-warning btn-icon-text" style="background-color:#D8B237">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>                                                  
                          &nbsp Back
                    </a>
                </div>
                <h1 style="text-align:center;">Delete Rooms
                </h1> 
        </div>
            <div class="card" style = "min-height:50%;">
                <div class="card-body" >
                  <!-- <h4 class="card-title">Book Now!</h4> -->
                  <form class="forms-sample" action = "{{ route('destroyRoom', ['id' => $room->id]) }}" method="post" onsubmit="return confirmDelete()">
                  @csrf
                  @method('DELETE')
                    <div class="form-group">
                      <label>Room ID</label>
                      <input type="text" class="form-control" name= "room_id" value="{{$room->id}}" placeholder="id" readonly>
                    </div>
                    <div class="form-group">
                      <label>Room Name</label>
                      <input type="text" class="form-control" name= "room_name" id="name" value="{{$room->room_name}}" placeholder="Equipment Name" readonly>
                    </div>
                    
                    <button type="submit" class="btn btn-danger mr-2 float-right">Delete</button>
                  </form>

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

