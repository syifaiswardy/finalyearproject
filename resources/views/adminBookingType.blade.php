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
        @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
              @endif

              @if(session('error'))
                <div class="alert alert-danger">
                  {{ session('error') }}
                </div>
              @endif
          <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
 

              <div class="card">
                <div class="card-body">
                  <div class = "float-left">
                    <h4 class="card-title">Booking Types</h4>
                  </div>
                  <!-- <p class="card-description">
                  </p> -->
                  <div class = "float-right">
                  <a href = "/addBookTypes" type="button" class="btn btn-warning btn-icon-text" style="background-color:#D8B237">
                          <i class="ti-plus btn-icon-prepend"></i>                                                    
                          Add New
                  </a>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Booking Name</th>
                          <th>Booking Description</th>
                          <th>Packages</th>
                          <th>Packages Description</th>
                          <th>Price</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($list as $display)
                        <tr>
                          <td>{{$display['id']}}</td>
                          <td>{{$display['booking_name']}}</td>
                          <td>{{$display['booking_desc']}}</td>
                          <td>
                          @if ($display['booking_package'] == NULL)
                          <label>NONE</label>
                          @else
                          {{$display['booking_package']}}
                          </td>
                          @endif
                          <td>
                          @if ($display['booking_packageDesc'] == NULL)
                          <label>NONE</label>
                          @else
                          {{$display['booking_packageDesc']}}
                          @endif
                          </td>
                          <td>RM {{$display['booking_price']}}</td>
                          <td>
                            <a href="{{"editBookType/".$display->id}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m21.7 13.35l-1 1l-2.05-2.05l1-1c.21-.22.56-.22.77 0l1.28 1.28c.22.21.22.56 0 .77M12 18.94l6.07-6.06l2.05 2.05L14.06 21H12v-2.06M4 2h14a2 2 0 0 1 2 2v4.17L16.17 12H12v4.17L10.17 18H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2m0 4v4h6V6H4m8 0v4h6V6h-6m-8 6v4h6v-4H4Z"/></svg>
                            </a>
                          </td>
                          <td>
                            <a href="{{"deleteBookType/".$display->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19 4h-3.5l-1-1h-5l-1 1H5v2h14M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6v12Z"/></svg>
                            </a>
                            
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                    <span>
                        {{$list->links()}}
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <p>Are you sure you want to delete this record?</p>
                      </div>
                      <div class="modal-footer">
                      <form id="deleteForm" class="forms-sample" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>

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
  <script>
    $(document).ready(function() {
        $('#confirmDeleteModal').on('show.bs.modal', function(event) {
            var deleteUrl = $(event.relatedTarget).data('delete-url');
            $("#deleteForm").attr("action", deleteUrl);
        });

        $("#deleteForm").submit(function(event) {
            event.preventDefault(); // Prevent form submission

            if (confirm('Are you sure you want to delete this record?')) {
                this.submit(); // Submit the form
            }
        });
    });
  </script>


</body>

</html>

