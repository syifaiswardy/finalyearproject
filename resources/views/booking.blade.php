<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    
    
    <title>Vidivox Studios</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    @include("customer.css")

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    @include("customer.navbar")
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div id="bannerbooking">
            <div class="container">
            <div class="col-lg-6 align-self-center">
                    <div class="text-center">
                        <div class="section-heading"> 
                            <h2>Book with us now!</h2>
                        </div>
                      
                    </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->
    <!-- ***** Backline Instrument Starts ***** -->

    <!-- ***** Backline Instrument End ***** -->
    <!-- ***** Calendar Area Starts ***** -->
    <section class="section" id = "menu">
        <div class = "container">
            <div id="calendar"></div>      
        </div>
      
    </section>
    <!-- ***** Calendar Area Ends ***** -->
    
    <!-- ***** Footer Start ***** -->
    @include("customer.footer")
    <!-- ***** Footer End ***** -->
    <!-- fullCalendar Script 
    error cannot display data from database to calendar-->
    <script>
        $(document).ready(function() {
            var booking = @json($events);
            //console.log(booking)
            $('#calendar').fullCalendar({
                header:{
                    'left':'prev, next today',
                    'center' : 'title',
                    'right': 'month, agendaWeek, agendaDay'
                },
                events : booking
            })
        });
    </script>
    
    @include("customer.js")
  </body>
</html>