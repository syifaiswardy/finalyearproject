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
                  <a href ="/bookingtype" type="button" class="btn btn-warning btn-icon-text" style="background-color:#D8B237">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>                                                  
                          &nbsp Back
                    </a>
                </div>
                <h1 style="text-align:center;">Add New Types of Booking
                </h1> 
        </div>
        <div class="card">
                <div class="card-body">
                  <form class="forms-sample" action = "/recordedBookTypes" method="post">
                    @csrf

                    <div class="form-group">
                      <label>Booking Name</label>
                      <input type="text" class="form-control" name= "booktype_name" placeholder="Booking Name" required>
                    </div>
                    <div class="form-group">
                      <label>Booking Description</label>
                      <input type="text" class="form-control" name= "booktype_desc" placeholder="Booking Description" required>
                    </div>
                    <div class="form-group">
                      <label>Packages</label>
                      <input type="text" class="form-control" name= "packages" id="name" value="" placeholder="Packages" >
                    </div>
                    <div class="form-group">
                        <label>Packages Description</label>
                        <input type="text" class="form-control" name= "packages_desc" id="name" value="" placeholder="Packages Description" >

                    </div>
                    <div class="form-group">
                        <label>Price</label> 
                        <input type="text" class="form-control" name= "price" id="name" placeholder="eg: 0.00" >

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

    
  @include("admin.js")
</body>

</html>

