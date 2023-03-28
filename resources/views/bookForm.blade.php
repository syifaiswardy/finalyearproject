<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Vidivox Studios</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
  <!-- plugins:css -->
  <link rel="stylesheet" href="public/admin template/vendors/feather/feather.css">
  <link rel="stylesheet" href="public/admin template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="public/admin template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="public/admin template/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="public/admin template/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="public/admin template/css/vertical-layout-light/style.css">
  <!-- endinject -->

  <script>
    // jQuery(document).ready(function() {
    //     jQuery("#selectId").change(function() {
    //         if (jQuery(this).val() === 'recording'){ 
    //             jQuery('input[name=other_input]').show();   
    //         } else {
    //             jQuery('input[name=other_input]').hide(); 
    //         }
    //     });
    // });
  </script>
  
</head>

<body>
  <div class="container-scroller">
 
    <div class="container-fluid page-body-wrapper">
      
      <!-- partial -->
      <div class="main-panel">  
      <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Book Now</h4>
                  <form class="forms-sample" action = "" method="">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Start Date and Time</label>
                      <input type="datetime-local" class="form-control" id="exampleInputUsername1" placeholder="StartDate">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">End Date and Time</label>
                      <input type="datetime-local" class="form-control" id="exampleInputUsername1" placeholder="EndDate">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Choose Booking Type </label>
                      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <select class="form-control" name = "pageSelector" id="selectId">
                          <option value="jamming">Jamming</option>
                          <option value="recording">Recording</option>
                          <option value="music_class">Music Class</option>
                        </select>

                        <div class="col-md-6">
                          <input type="text" name="other_input" style="display:none" />
                          <label class="form-check-label" name="other_input" style="display:none">Choose Packages</label>
                          <div class="form-check">
                            <label class="form-check-label" name="other_input" style="display:none">
                              <input type="radio" class="form-check-input" value="">
                              Full Package
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label" name="other_input" style="display:none">
                              <input type="radio" class="form-check-input" value="option2">
                              Half Package
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label" name="other_input" style="display:none">
                              <input type="radio" class="form-check-input" value="option3">
                              Vocal or Voice Recorder Only
                            </label>
                          </div>
                        </div>
                        
                        
                          
                        
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Choose Room </label>
                      <select class="form-control" name="bookingRoom" id="exampleSelectGender">
                          <option value="">Studio 1</option>
                          <option value="">Studio 2</option>
                          <option value="">Studio 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Total Fee</label>
                      <input type="text" class="form-control" id="exampleInputConfirmPassword1" placeholder="RM0.00" readonly>
                    </div>
                    <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        Add another date
                      </label>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Book</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
        </div>      
        <div class="content-wrapper">
        
        <!-- content-wrapper ends -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
  <!-- plugins:js -->
  <script src="public/admin template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="public/admin template/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="public/admin template/vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="public/admin template/js/off-canvas.js"></script>
  <script src="public/admin template/js/hoverable-collapse.js"></script>
  <script src="public/admin template/js/template.js"></script>
  <script src="public/admin template/js/settings.js"></script>
  <script src="public/admin template/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="public/admin template/js/file-upload.js"></script>
  <script src="public/admin template/js/typeahead.js"></script>
  <script src="public/admin template/js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
