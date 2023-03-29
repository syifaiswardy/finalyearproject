<header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/" class="logo">
                            <img src="assets/images/vidivox-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="">
                                <a href="{{url('/booking')}}">Bookings</a>
                                <!-- <ul>
                                    <li><a href="#">Jamming</a></li>
                                    <li><a href="#">Recording</a></li>
                                    <li><a href="#">Music Class</a></li>
                                </ul> -->
                            </li>
                            <li class="scroll-to-section"><a href="#menu">Testimonial</a></li>
                            <li class="scroll-to-section"><a href="#about">About Us</a></li>
                           	
                        <li>
                        @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                @auth
                                    <li>
                                        <x-app-layout class="scroll-to-section"></x-app-layout>
                                    </li>
                                @else
                                <li><a href="{{ route('login') }}" class="scroll-to-section">Log in</a></li>

                                    @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}" class="scroll-to-section">Register</a></li>
                                    @endif
                                @endauth
                            </div>
                        @endif
                        </li>
                        </ul>        
                        <a class='menu-trigger'>
                            
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>