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
                  <a href ="/room" type="button" class="btn btn-warning btn-icon-text" style="background-color:#D8B237">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>                                                  
                          &nbsp Back
                    </a>
                </div>
                <h1 style="text-align:center;">Add New Room
                </h1> 
        </div>
        <div class="card" style = "min-height:50%;">
                <div class="card-body">
                  <form class="forms-sample" action = "/recordedRoom" method="post">
                    @csrf

                    <div class="form-group">
                      <label>Room Name</label>
                      <input type="text" class="form-control" name= "room_name" placeholder="Room Name" required>
                    </div>
                    
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

    
  @include("admin.js")
</body>

</html>

