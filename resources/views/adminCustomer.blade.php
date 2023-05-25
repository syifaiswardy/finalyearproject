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
              <div class="card">
                <div class="card-body">
                  <div class = "float-left">
                    <h4 class="card-title">User Details</h4>
                  </div>
                  <!-- <p class="card-description">
                  </p> -->
                  <!-- <div class = "float-right">
                  <button type="button" class="btn btn-warning btn-icon-text" style="background-color:#D8B237">
                          <i class="ti-plus btn-icon-prepend"></i>                                                    
                          Add New
                  </button>
                  </div> -->
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Full Name</th>
                          <th>Email</th>
                          <th>User Type</th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($cust as $display)
                        <tr>
                          <td>{{$display->id}}</td>
                          <td>{{$display->name}}</td>
                          <td>{{$display->email}}</td>
                          <td>
                          @if ($display->usertype == '0')
                          <label class="badge badge-danger badge-lg" style="padding:10px 20px;font-size;100%;">Customer</label>
                          @elseif ($display->usertype == '1')
                          <label class="badge badge-success badge-lg" style="padding:10px 27px;font-size;100%;">Admin</label>
                          @endif
                          </td>
                          <td>
                            <a href="{{"editUser/".$display->id}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m21.7 13.35l-1 1l-2.05-2.05l1-1c.21-.22.56-.22.77 0l1.28 1.28c.22.21.22.56 0 .77M12 18.94l6.07-6.06l2.05 2.05L14.06 21H12v-2.06M4 2h14a2 2 0 0 1 2 2v4.17L16.17 12H12v4.17L10.17 18H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2m0 4v4h6V6H4m8 0v4h6V6h-6m-8 6v4h6v-4H4Z"/></svg>
                            </a>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
                          
    
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

            <!-- <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Advanced Table</p>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="example" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th>Quote#</th>
                              <th>Product</th>
                              <th>Business type</th>
                              <th>Policy holder</th>
                              <th>Premium</th>
                              <th>Status</th>
                              <th>Updated at</th>
                              <th></th>
                            </tr>
                          </thead>
                      </table>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div> -->
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

